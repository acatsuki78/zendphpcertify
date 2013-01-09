<?php
class Core_Model_DbTable_Quiz extends Zend_Db_Table_Abstract
{
	protected $_name = 'quiz';
	
	protected $_primary = 'quiz_id';
	
	protected $_referenceMap = array(
			'FK_stats_level_id' => array(
					'columns' => array('level_id'),
					'refcolumns' => array('level_id'),
					'refTableClass' => 'Core_Model_DbTable_Level',
					'onDelete' => self::RESTRICT,
					'onUpdate' => self::CASCADE
			)
	);
	
	protected $_dependentTables = array (
			'Core_Model_DbTable_Stats'		
	);
}