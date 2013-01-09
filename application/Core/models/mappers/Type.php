<?php
class Core_Model_Mapper_Type extends Core_Model_Mapper_Abstract
{
	protected $_dbTableClass = 'Core_Model_DbTable_Types';
	
	const COL_ID = 'type_id';
	const COL_TITLE = 'type_title';
	
	public function rowToObject(Zend_Db_Table_Row_Abstract $row)
	{
		
	}
	
	public function objectToArray($level)
	{
		$data = array();
		$data[self::COL_ID] = '';
		$data[self::COL_TITLE] = '';
	
		return $data;
	}
}