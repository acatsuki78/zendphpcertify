<?php
class Core_Model_Mapper_Theme extends Core_Model_Mapper_Abstract
{
	protected $_dbTableClass = 'Core_Model_DbTable_Themes';

	const COL_ID = 'theme_id';
	const COL_TITLE = 'theme_title';
	const COL_LANGUAGE = 'theme_language';

	public function rowToObject(Zend_Db_Table_Row_Abstract $row)
	{
		$theme = new Core_Model_Theme();
		$theme->setThemeId($row[self::COL_ID])
			  ->setThemeTitle($row[self::COL_TITLE])
			  ->setLanguage($row[self::COL_LANGUAGE]);
		
		return $theme;
	}
	
	public function objectToArray($theme)
	{
		$data = array();
		$data[self::COL_ID] = $theme->getThemeId();
		$data[self::COL_TITLE] = $theme->getThemeTitle();
		$data[self::COL_LANGUAGE] = $theme->getLanguage();
	
		return $data;
	}
}