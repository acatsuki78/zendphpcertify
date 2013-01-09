<?php
class Core_Model_Mapper_Reponses extends Core_Model_Mapper_Abstract
{
	protected $_dbTableClass = 'Core_Model_DbTable_Reponses';
	
	const COL_QUIZ_ID = 'quiz_id';
	const COL_THEME_ID = 'theme_id';
	const COL_QUESTION_BY_THEME = 'question_by_theme';
	
	public function rowToObject(Zend_Db_Table_Row_Abstract $row)
	{
		
	}
	
	public function objectToArray($level)
	{
		$data = array();
		$data[self::COL_QUIZ_ID] = '';
		$data[self::COL_THEME_ID] = '';
		$data[self::COL_QUESTION_BY_THEME] = '';
	
		return $data;
	}
}