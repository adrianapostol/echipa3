<?php
class User extends Atlantis_Db_BaseModel 
{
    
    protected $_name = 'users';
    
    public function getAllUsers()
    {
        
        $select = $this->select()->from($this->_name);
        try {
            $users = $this->fetchAll($select);
        } catch (Exception $e){
        }
        
        if (null == $users) {
            return array();
        }
        
        
        return $users->toArray();
    }
}
 