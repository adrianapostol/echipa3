<?php
require_once 'Zend/Db/Table/Abstract.php';
require_once 'Zend/Db/Table.php';
require_once 'Zend/Loader.php';
class Atlantis_Db_BaseModel extends Zend_Db_Table_Abstract
{

    /**
     * Name of the table's ID primary key
     *
     * @var string
     */
    protected $_idFieldName = 'id';

    /**
     * Sets the db resource
     *
     * @param  mixed $db Either an Adapter object, or a string naming a Registry key
     * @return Talktala_Db_BaseModel
     */
    public function setAdapter($db)
    {
        return $this->_setAdapter($db);
    }
    
    public function __construct($dbName = 'db'){
        $config = $GLOBALS['configuration'][$dbName];
        $class = "Zend_Db_Adapter_" . ucfirst($config['adapter']);
        Zend_Loader::loadClass($class);
        $db = new $class($config);
        if(empty(Zend_Db_Table::getDefaultAdapter())) {
            Zend_Db_Table::setDefaultAdapter($db);
        }
        
        $this->_setAdapter( $db );

        parent::__construct($config);
    }

    /**
     * Sets the db resource with the default db
     *
     * @return Talktala_Db_BaseModel
     */
    public function setAdapterWithDefaultDatabase()
    {
        return $this->_setAdapter( Zend_Db_Table::getDefaultAdapter() );
    }

    /**
     * Builds a select criteria
     * @param mixed $param
     * @return Zend_Db_Table_Select
     */
    protected function _getFilterSelectCriteria($id) {
        $sel = $this->select();
        if (is_array($id)) {
            foreach ($id as $fieldName => $fieldValue) {
                $comparision = is_array($fieldValue) ? ' IN (?) ' : ' = ?';
                $sel->where($fieldName . $comparision, $fieldValue);
            }
        } else {
            $sel->where($this->_idFieldName . ' = ?', $id);
        }
         
        return $sel;
    }
    /**
     * this will be for all the models
     * @param mixed $id
     * @return Talktala_Db_BaseRowSet
     */
    public function findByFilter($id)
    {
        $sel = $this->_getFilterSelectCriteria($id);

        return $this->fetchAll($sel);
    }
    /**
     * load 1 entry from database table
     * @param $id
     * @return Talktala_Db_BaseRow
     */
    public function findById($id)
    {
        $results = $this->findByFilter(array(
                $this->_idFieldName => $id
        ));
        if ($results->count() > 0) {
            return $results->current();
        }
        return null;
    }
    /**
     * Retrieves one record
     *
     * @param mixed $id
     * @return Talktala_Db_BaseRowSet
     */
    public function findOneByFilter($id)
    {
        $sel = $this
        ->_getFilterSelectCriteria($id)
        ->limit(1);

        return $this->fetchRow($sel);
    }

    public function getTableName() {
         
        return $this->_name;
    }
    /**
     * Sets the table name on which the queries will be applied
     * !!! Should be used only when working with db tables
     * that do not have a model class
     *
     * @param string $tableName
     */
    public function setTableName($tableName) {
        $this->_name = $tableName;

        return $this;
    }

    /**
     * Deletes records based on specified filters
     * @param array $filters (field_name => value(s))
     * @return mixed integer number of affected rows, null if the query failed
     */
    public function deleteByFilters($filters = array())
    {
        $result = null;
        if (count($filters)) {
            $where = array();
            foreach ($filters as $field => $value) {
                $comparision = ' = ';
                $placeholder = ' ? ';
                if (is_array($value)) {
                    $comparision = ' IN ';
                    $placeholder = ' (?) ';
                }
                 
                $where[] = $this->_db->quoteInto($field . $comparision . $placeholder, $value);
            }

            try {
                $result = $this->delete($where);
            } catch (Exception $e) {
            }
        }
         
        return $result;
    }

    /**
     * insert multiple rows in one query
     * @param array $data
     * @param array $cols
     * @return mixed integer number of affected rows, null if the query failed
     */
    public function insertRows($data)
    {
        $result = null;

        if (!empty($data)) {
            $cols = array_keys(current($data));
            $cols = ' (' . implode(',', $cols) . ') ';
            $query = 'INSERT INTO ' . $this->_db->quoteIdentifier($this->_name) . $cols . 'VALUES ';
            $queryVals = array();

            foreach ($data as $row) {
                foreach($row as &$col) {
                    if (!is_null($col)) {
                        $col = $this->_db->quote($col);
                    } else {
                        $col = 'NULL';
                    }
                }
                $queryVals[] = '(' . implode(',', $row) . ')';
            }

            try {
                $result = $this->_db->query($query . implode(',', $queryVals));
            } catch(Exception $e){
            }
        }

        return $result;
    }

    public function getEnumValues($field, $metadata = null) {
        if (is_null($metadata)) {
            $metadata = $this->info(self::METADATA);
        }
        preg_match_all('/\'(?<item>.+?)\'/', $metadata[$field]['DATA_TYPE'], $matches);
        return $matches['item'];
    }
}


