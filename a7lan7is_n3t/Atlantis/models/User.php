<?php
class User extends Atlantis_Db_BaseModel 
{
    
    protected $_name = 'users';
    
    public function getAllUsers($gname = null, $category = null, $location = null, $limit = null)
    {
        
        $select = $this->select()->from(array('u' => $this->_name), array('user_name'))
                ->setIntegrityCheck(false)
                ->order('u.join_date DESC')
                ->group('u.user_name');
        
        if (!empty($gname) || !empty($category) || !empty($location)) {
            $select->join(array('g' => 'groups'), 'g.name = u.group_name', array());
        }
        
        if (!empty($gname)) {
            $select->where('LOWER(g.name) = ? ', strtolower($gname));
        }
        
        if (!empty($category)) {
            $select->where('LOWER(g.category_name) = ? ', strtolower($category));
        }
        
        if (!empty($location)) {
            $select->where('LOWER(g.location) = ? ', strtolower($location));
        }
        
        if (!empty($limit)) {
            $select->limit($limit);
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
 