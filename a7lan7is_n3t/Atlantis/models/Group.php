<?php 
class Groups extends Atlantis_Db_BaseModel 
{
    
    protected $_name = 'groups';
    
    public function getGroup($name = null, $category = null, $location = null)
    {
        
        $select = $this->select()->from($this->_name);
        
        if (!empty($name)) {
            $select->where('LOWER(name) = ? ', strtolower($name));
        }
        
        if (!empty($category)) {
            $select->where('LOWER(category_name) = ? ', strtolower($category));
        }
        
        if (!empty($location)) {
            $select->where('LOWER(location) = ? ', strtolower($location));
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
            $groups[strtolower($g['name'])] = array (
                    'group_name' => $g['name'],
                    'group_link' => $g['group_link'],
                    'category_name' => $g['category_name'],
                    'location' => $g['location']
            );
        }
        
        return $groups;
    }
}