<?php 

class My_Db_Table_RowMock extends Zend_Db_Table_Row_Abstract
{
    protected $parentRowData; 
    protected $dependentRowSetData; 
    
    public function __construct($rowData, $parentRowData = null, $dependentRowSetData = null)
    {
        $this->_data = $rowData;
        $this->parentRowData = $parentRowData;
        $this->dependentRowSetData = $dependentRowSetData;
    }
    public function findParentRow()
    {
        return new Zend_Db_Table_Row(array('data' =>$this->parentRowData));
    }
    
    public function findDependentRowset()
    {
        return new Zend_Db_Table_Rowset(array('data' =>$this->dependentRowSetData));
    }
}