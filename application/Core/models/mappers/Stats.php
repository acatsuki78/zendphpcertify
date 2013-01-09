<?php
class Core_Model_Mapper_Stats extends Core_Model_Mapper_Abstract
{
	protected $_dbTableClass = 'Core_Model_DbTable_Stats';
	
	const COL_ID = 'stat_id';
	const COL_DATE = 'stat_date';
	const COL_RESULT = 'stat_result';
	const COL_ELAPSED_TIME = 'stat_elapsed_time';
	const COL_USER_ID = 'user_id';
	const COL_QUIZ_ID = 'quiz_id';
	
	public function rowToObject(Zend_Db_Table_Row_Abstract $row)
	{
		
	}
	
	public function objectToArray($level)
	{
		$data = array();
		$data[self::COL_ID] = '';
		$data[self::COL_DATE] = '';
		$data[self::COL_RESULT] = '';
		$data[self::COL_ELAPSED_TIME] = '';
		$data[self::COL_USER_ID] = '';
		$data[self::COL_QUIZ_ID] = '';
	
		return $data;
	}
}