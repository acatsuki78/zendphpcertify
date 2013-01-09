<?php
class Core_Model_Mapper_Levels extends Core_Model_Mapper_Abstract
{
	protected $_dbTableClass = 'Core_Model_DbTable_Levels';
	
	const COL_ID = 'level_id';
	const COL_TITLE = 'level_title';
	
	public function rowToObject(Zend_Db_Table_Row_Abstract $row)
	{
		
	}
	
	public function objectToArray($level)
	{
		$data = array();
		$data[self::COL_ID] = $level->getId();
		$data[self::COL_TITLE] = $level->getId();
	
		return $data;
	}
}