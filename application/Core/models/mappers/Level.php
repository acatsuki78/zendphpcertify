<?php
class Core_Model_Mapper_Level extends Core_Model_Mapper_Abstract
{
	protected $_dbTableClass = 'Core_Model_DbTable_Levels';
	
	const COL_ID = 'level_id';
	const COL_TITLE = 'level_title';
	
	public function rowToObject(Zend_Db_Table_Row_Abstract $row)
	{
		$level = new Core_Model_Level();
		$level->setLevelId($row[self::COL_ID])
			  ->setLevel($row[self::COL_TITLE]);
		
		return $level;
	}
	
	public function objectToArray($level)
	{
		$data = array();
		$data[self::COL_ID] = $level->getLevelId();
		$data[self::COL_TITLE] = $level->getLevel();
	
		return $data;
	}
}