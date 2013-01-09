<?php
class Core_Mapper_DbTable_Stats extends Zend_Db_Table_Abstract
{
	/* Nom de la table */
	protected $_name = 'stats';
	
	/* Clé primaire */
	protected $_primary = 'stats_id';
	
	/* DECLARATION DES REFERENCES (FK) */
	protected $_referenceMap = array(
			'FK_stats_quiz_id' => array(
					'columns' => array('quiz_id'),
					'refcolumns' => array('quiz_id'),
					'refTableClass' => 'Core_Model_DbTable_Quiz',
// 					'onDelete' => self::NONE,
					'onUpdate' => self::CASCADE
			),
			
			'FK_stats_user_id' => array(
					'columns' => array('user_id'),
					'refcolumns' => array('user_id'),
					'refTableClass' => 'Core_Model_DbTable_User',
					'onDelete' => self::RESTRICT,
					'onUpdate' => self::CASCADE
			)
	);
}