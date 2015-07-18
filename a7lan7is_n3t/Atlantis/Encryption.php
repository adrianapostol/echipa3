<?php
require_once('Zend/Filter/Decrypt.php');
require_once('Zend/Filter/Encrypt.php');
class Talktala_Encryption
{
    /**
     * encryption key
     * @var string
     */
    private $_key = null;
    
    /**
     * encryption algorithm
     * @var string
     */
    private $_algorithm = null;
    
    /**
     * mcrypt mode type
     * @var string
     */
    private $_cipherCombination = null;
    
    /**
     * a flag prepended to encrypted string
     * to know wheter or not the string is encrypted
     * @var string
     */
    private $_encryptedStringFlag = null;
    
    /**
     * part of the encryption private key
     * @var string
     */
    private $_pkPart = 'vmhtKT6Bm8';
    
    /**
     * Initialize the class instance
     * 
     * @param array $options
     */
    public function __construct(array $options = array()) {
        $defaultOptions = array(
                "algorithm" => 'rijndael-256',
                "cipher_combination" => 'cbc',
                "encrypted_string_flag" => '!=!enc!=!');
        $options = array_merge($defaultOptions, $options);
        
        if (! isset($options['key'])) {
        	$options['key'] = $GLOBALS['configuration']['encryptionCode'];
        }
        $this->_key = pack('H*', bin2hex($options['key']));
        $this->_algorithm = $options['algorithm'];
        $this->_cipherCombination = $options['cipher_combination'];
        $this->_encryptedStringFlag = $options['encrypted_string_flag'];
    }
    
    /**
     * Creates an initialization vector (IV) from a random source
     * 
     * @return string on success, boolean false otherwise
     */
    protected function _createIv()
    {
        $iv = mcrypt_create_iv($this->_getIvSize(), MCRYPT_RAND);

        return $iv;
    }
    
    /**
     * Returns the size of the Initialization Vector (IV) in bytes
     *
     * @return integer on success, boolean false otherwise
     */
    protected function _getIvSize()
    {
        $ivSize = mcrypt_get_iv_size($this->_algorithm, $this->_cipherCombination);
    
        return $ivSize;
    }    
    
    /**
     * Verifies whether or not a given string
     * contains the encryption flag
     * 
     * @param string $text
     * @return boolean true if encryption flag is found, false otherwise
     */
    protected function _hasEncryptionFlag($text)
    {
    	$result = false;
    	
    	if (strlen($text) == 0) {    	    
    		return $result;
    	}
    	
    	$flagLength = strlen($this->_encryptedStringFlag);
    	$flag = substr($text, 0, $flagLength);
    	$result = ( $flag == $this->_encryptedStringFlag );
    	
    	return $result;
    }
    
    /**
     * Truncates a certain part from the begining of a given string
     * equal with the length of the defined encryption flag
     * 
     * @param string $text
     * @return string
     */
    protected function _removeEncryptionFlag($text)
    {
    	return substr($text, strlen($this->_encryptedStringFlag));
    }
    
    /**
     * Prepends the defined encryption flag to
     * a given string
     * 
     * @param string $text
     * @return string
     */
    protected function _addEncryptionFlag($text)
    {
    	return $this->_encryptedStringFlag . $text;
    }
    
    /**
     * Creates an encryption/decryption filter
     * 
     * @param string $iv
     * @param string $type
     * 
     * @return Zend_Filter_Encrypt|null
     */
    protected function _createMcryptFilter($iv, $type = 'Encrypt')
    {
        $filter = null;
        $filterClass = 'Zend_Filter_' . $type;
        if(! class_exists($filterClass)) {
        	return $filter;
        }
        
        
        try {
            $filter = new $filterClass(array(
                'adapter' => 'Mcrypt',    
                'key' => $this->_key,
                'vector' => $iv,
                'algorithm' => $this->_algorithm
            ));        	
        } catch (Exception $e) {
        }
        
        return $filter;
    }
    
    /**
     * Encrypts the received text 
     * 
     * @param string $plainText
     * @return string
     */
    public function encrypt($plainText)
    {
        if (strlen($plainText) == 0) {
        	return $plainText;
        }
        
        $cipherText = $plainText;
        $iv = $this->_createIv();
        $filter = $this->_createMcryptFilter($iv, 'Encrypt');
        
        if (! is_null($filter)) {
            $cipherText = $filter->filter($cipherText);
            $cipherText = $iv . $cipherText;
            $cipherText = $this->_addEncryptionFlag($cipherText);
        }
        
        return $cipherText;       
    }
    
    /**
     * Decrypts the received text 
     * 
     * @param string $encryptedText
     * @return string
     */
    public function decrypt($encryptedText)
    {
        if (strlen($encryptedText) == 0) {
            return $encryptedText;
        }
                
        $plainText = $encryptedText;
        
        if ($this->_hasEncryptionFlag($encryptedText)) {
        	$encryptedText = $this->_removeEncryptionFlag($encryptedText);
        }
        else {
        	return $plainText;
        }
        
        $ivSize = $this->_getIvSize();
        // extract IV
        $iv = substr($encryptedText, 0, $ivSize);
        // extract the cipher text
        $encryptedText = substr($encryptedText, $ivSize);
        
        $filter = $this->_createMcryptFilter($iv, 'Decrypt');
        if (! is_null($filter) && !empty($encryptedText)) {
            $plainText = rtrim( $filter->filter($encryptedText) );
        } else {
            //$encryptedText was changed
            $plainText = $encryptedText;
        }
        
        return $plainText;
    }
    
}