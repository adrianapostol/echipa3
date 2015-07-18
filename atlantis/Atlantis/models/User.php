<?php
class User extends Atlantis_Db_BaseModel 
{
    
    protected $_name = 'users';
    
    public function getAllUsers()
    {
        
        $select = $this->select()->from($this->_name);
        $users = $this->fetchAll($select);
        
        return $users;
    }
}
 