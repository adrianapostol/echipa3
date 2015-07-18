<?php
class Interests extends Atlantis_Db_BaseModel 
{
    
    protected $_name = 'interests';
    
    public function getInterest()
    {
        
        $select = $this->select()->from($this->_name, array());
        try {
            $int = $this->fetchAll($select);
        } catch (Exception $e){
        }
        
        if (null == $int) {
            return array();
        }
        
        
        return $int->toArray();
    }
    
    public function getInterestByName($name)
    {
        $select = $this->select()->from($this->_name)
                ->where ('name = ? ', $name);
        
        try {
            $int = $this->fetchRow($select);
        } catch (Exception $e){
        }
        
        if (null == $int) {
            return null;
        }
        
        
        return $int->toArray();
    }
    
    public function createInterest($name)
    {
       $int = $this->getInterestByName($name);
       
       if (null !== $int) {
           return $int;
       }
       
       $this->createRow(array(
           
       ))
    }
}
 