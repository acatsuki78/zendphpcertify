<?php
class Core_Model_Mapper_Questions extends Core_Model_Mapper_Abstract
{
	protected $_dbTableClass = 'Core_Model_DbTable_Questions';
	
	const COL_ID = 'question_id';
	const COL_TITLE = 'question_title';
	const COL_ACTIVE = 'question_active';
	const COL_IMAGE = 'question_image';
	const COL_LEVEL_ID = 'level_id';
	const COL_TYPE_ID = 'type_id';
	const COL_THEME_ID = 'theme_id';
	
	public function rowToObject(Zend_Db_Table_Row_Abstract $row)
	{
		
	}
	
	public function objectToArray($question)
	{
		$data = array();
		$data[self::COL_ID] = '';
		$data[self::COL_TITLE] = '';
		$data[self::COL_ACTIVE] = '';
		$data[self::COL_IMAGE] = '';
		$data[self::COL_LEVEL_ID] = '';
		$data[self::COL_TYPE_ID] = '';
		$data[self::COL_THEME_ID] = '';
	
		return $data;
	}
}