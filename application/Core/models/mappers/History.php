<?php
class Core_Model_Mapper_History extends Core_Model_Mapper_Abstract
{
	protected $_dbTableClass = 'Core_Model_DbTable_History';
	
	const COL_ID = 'history_id';
	const COL_TEMP_ID = 'history_temp_id';
	const COL_QUIZ_ID = 'quiz_id';
	const COL_QUESTION_ID = 'question_id';
	const COL_USER_ID = 'user_id';
	const COL_HISTORY_RESPONSE_ID = 'history_reponse_id';
	const COL_HISTORY_ORDER_QUESTION = 'history_order_question';
	const COL_HISTORY_STATUS = 'history_status';
	const COL_HISTORY_TIME_START_QUESTION = 'history_time_start_question';
	 
	
	public function rowToObject(Zend_Db_Table_Row_Abstract $row)
	{
		
	}
	
	public function objectToArray($level)
	{
		$data = array();
		$data[self::COL_ID] = '';
		$data[self::COL_TEMP_ID] = '';
		$data[self::COL_QUIZ_ID] = '';
		$data[self::COL_QUESTION_ID] = '';
		$data[self::COL_USER_ID] = '';
		$data[self::COL_HISTORY_RESPONSE_ID] = '';
		$data[self::COL_HISTORY_ORDER_QUESTION] = '';
		$data[self::COL_HISTORY_STATUS] = '';
		$data[self::COL_HISTORY_TIME_START_QUESTION] = '';
	
		return $data;
	}
}