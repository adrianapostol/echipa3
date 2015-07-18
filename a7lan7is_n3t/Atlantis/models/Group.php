<?php 
class Groups extends Atlantis_Db_BaseModel 
{
    
    protected $_name = 'groups';
    
    public function getGroup($name = null)
    {
        
        $select = $this->select()->from($this->_name);
        
        if (!empty($name)) {
            $select->where('name = ? ', $name);
        }
        
        try {
            $gs = $this->fetchAll($select);
        } catch (Exception $e){
        }
        
        $groups = array();
        
        if (null == $gs) {
            return $groups;
        }
        foreach ($gs as $g) {
            $groups[$g['name']] = $g['group_link'];
        }
        
        return $groups;
    }
}