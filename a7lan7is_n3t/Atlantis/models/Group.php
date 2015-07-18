<?php 
class Groups extends Atlantis_Db_BaseModel 
{
    
    protected $_name = 'groups';
    
    public function getGroup($name = null, $category = null, $location = null)
    {
        
        $select = $this->select()->from($this->_name);
        
        if (!empty($name)) {
            $select->where('name = ? ', $name);
        }
        
        if (!empty($category)) {
            $select->where('category_name = ? ', $category);
        }
        
        if (!empty($location)) {
            $select->where('location = ? ', $location);
        }
        
        try {
            $gs = $this->fetchAll($select);
        } catch (Exception $e){
        }
        ;
        $groups = array();
        
        if (null == $gs) {
            return $groups;
        }
        foreach ($gs as $g) {
            $groups[$g['name']] = array (
                    'group_link' => $g['group_link'],
                    'category_name' => $g['category_name'],
                    'location' => $g['location']
            );
        }
        
        return $groups;
    }
}