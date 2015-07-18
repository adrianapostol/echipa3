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
        };
        
        $groups = array();
        
        if (null == $gs) {
            return $groups;
        }
        foreach ($gs as $g) {
            $groups[strtolower($g['name'])] = array (
                    'group_name' => $g['name'],
                    'group_link' => $g['group_link'],
                    'category_name' => $g['category_name'],
                    'location' => $g['location'],
                    'created_at' => $g['created_at']
            );
        }
        
        return $groups;
    }
    
    public function createGroup($name , $category , $location , $url)
    {
        
        try {
            $group = $this->getGroup($name);
            if (isset($group[strtolower($name)])) {
                return $group[strtolower($name)];
            }
            $row = $this->createRow(array(
                'name' =>  $name,
                'group_link' =>  $url,
                'category_name' =>  $category,
                'location' =>  $location,
                'created_at' => time()
            ));
            $row->save();
            $row = $row->toArray();
            $row['group_name'] = $row['name'];
            unset($row['name']);
            unset($row['id']);
            
        } catch (Exception $e) {
            $row = null;
        }
        
        return $row;
    }
    
    public function getLocations($category = null)
    {
        try {
            $select = $this->select()->from($this->_name, array('location'))->group('LOWER(location)');
            
            if (!empty($category)) {
                $select->where('LOWER(category_name) = ? ', strtolower($category));
            }
            
            $row = $this->getAdapter()->fetchCol($select);
            
        } catch (Exception $e) {
            $row = array();
        }
        
        return $row;
    }
    
    public function getCategories($location = null) 
    {
        try {
            $select = $this->select()->from($this->_name, array('category_name'))->group('LOWER(category_name)');
            
            if (!empty($location)) {
                $select->where('LOWER(location) = ? ', strtolower($location));
            }
            
            $row = $this->getAdapter()->fetchCol($select);
        
        } catch (Exception $e) {
            $row = array();
        }
        
        return $row;
    }
}