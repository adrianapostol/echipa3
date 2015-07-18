class Interests extends Atlantis_Db_BaseModel 
{
    
    protected $_name = 'users';
    
    public function getAllUsers()
    {
        
        $select = $this->select()->from($this->_name);
        try {
            $int = $this->fetchAll($select);
        } catch (Exception $e){
        }
        
        if (null == $int) {
            return array();
        }
        
        
        return $int->toArray();
    }
}