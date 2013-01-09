<?php
class Core_Model_DbTable_History extends Zend_Db_Table_Abstract
{
	protected $_name = 'history';
	
	protected $_primary = 'history_id';
	
	protected $referenceMap = array(
			'FK_history_question_id' => array(
					'columns' => array('question_id'),
					'refcolumns' => array('question_id'),
					'refTableClass' => 'Core_Model_DbTable_Questions',
					'onDelete' => self::RESTRICT,
					'onUpdate' => self::CASCADE
			),
			
			'FK_history_quiz_id' => array(
					'columns' => array('quiz_id'),
					'refcolumns' => array('quiz_id'),
					'refTableClass' => 'Core_Model_DbTable_Quiz',
					'onDelete' => self::RESTRICT,
					'onUpdate' => self::CASCADE
			),
			
			'FK_history_user_id' => array(
					'columns' => array('user_id'),
					'refcolumns' => array('user_id'),
					'refTableClass' => 'Core_Model_DbTable_Users',
					'onDelete' => self::RESTRICT,
					'onUpdate' => self::CASCADE
			)
	);
}