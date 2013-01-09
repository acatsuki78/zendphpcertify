<?php
class Core_Model_Mapper_Type extends Core_Model_Mapper_Abstract
{
	protected $_dbTableClass = 'Core_Model_DbTable_Types';
	
	const COL_ID = 'type_id';
	const COL_TITLE = 'type_title';
	
	public function rowToObject(Zend_Db_Table_Row_Abstract $row)
	{
		$type = new Core_Model_Type();
		$type->setTypeId($row[self::COL_ID]);
			  $type->setTypeTitle($row[self::COL_TITLE]);
		
		return $type;
	}
	
	public function objectToArray($type)
	{
		$data = array();
		$data[self::COL_ID] = $type->getTypeId();
		$data[self::COL_TITLE] = $type->getTypeTitle();

		return $data;
	}
}