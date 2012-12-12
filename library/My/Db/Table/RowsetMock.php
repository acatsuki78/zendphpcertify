<?php 

class My_Db_Table_RowsetMock extends Zend_Db_Table_Rowset_Abstract
{
    private static $position = 0;
    
    public function __construct($rowsetData)
    {
        $this->_data = $rowsetData;
        $this->_rowClass = 'My_Db_Table_RowMock';
    }
    
    public function count() 
    {
        $this->_count = count($this->_data);
        return $this->_count;
    }
    
    public function current()
    {
        $row = new $this->_rowClass(
                        $this->_data[self::$position],
                        $this->_data[self::$position]['parentRow'],
                        $this->_data[self::$position]['dependentRowset']
                   );
        ++self::$position;
        return $row;
    }
}