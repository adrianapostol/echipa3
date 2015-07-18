<?php
class User extends Atlantis_Db_BaseModel 
{
    
    protected $_name = 'users';
    
    public function getAllUsers($gname = null, $category = null, $location = null)
    {
        
        $select = $this->select()->from(array('u' => $this->_name), array('user_name'))
                ->setIntegrityCheck(false)
                ->join(array('g' => 'groups'), 'g.name = u.group_name', array())
                ->group('u.user_name');
        
        
        if (!empty($gname)) {
            $select->where('LOWER(g.name) = ? ', strtolower($gname));
        }
        
        if (!empty($category)) {
            $select->where('LOWER(g.category_name) = ? ', strtolower($category));
        }
        
        if (!empty($location)) {
            $select->where('LOWER(g.location) = ? ', strtolower($location));
        }
        
        try {
            $users = $this->getAdapter()->fetchCol($select);
            return $users;
        } catch (Exception $e){
        }
        
        return array();
        
        
    }
    
    public function joinGroup($userName, $groupName)
    {
        try {

            $row = $this->createRow(array(
                    'user_name' =>  $userName,
                    'group_name' =>  $groupName,
                    'join_date' => time()
            ));
            $row->save();
            return true;
        
        } catch (Exception $e) {
        }
        
        return false;
        
    }
}
 