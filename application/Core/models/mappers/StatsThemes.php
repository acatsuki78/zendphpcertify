<?php
class Core_Model_Mapper_StatsThemes extends Core_Model_Mapper_Abstract
{
	protected $_dbTableClass = 'Core_Model_DbTable_StatsThemes';
	
	const COL_STAT_THEME_ID = 'stat_theme_id';
	const COL_STAT_ID = 'stat_id';
	const COL_THEME_ID = 'theme_id';
	const COL_THEME_NBR_GOOD_ANSWER = 'theme_nbr_good_answer';

	public function rowToObject(Zend_Db_Table_Row_Abstract $row)
	{
		
	}
	
	public function objectToArray($level)
	{
		$data = array();
		$data[self::COL_STAT_THEME_ID] = '';
		$data[self::COL_STAT_ID] = '';
		$data[self::COL_THEME_ID] = '';
		$data[self::COL_THEME_NBR_GOOD_ANSWER] = '';
		return $data;
	}
}