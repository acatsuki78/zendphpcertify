<?php
class Core_Model_DbTable_QuizRel extends Zend_Db_Table_Abstract
{
	protected $_name = 'quiz_rel';
	
	protected $_primary = 'quizRel_id';
	
	protected $referenceMap = array(
			'FK_quizRel_quiz_id' => array(
					'columns' => array('quiz_id'),
					'refcolumns' => array('quiz_id'),
					'refTableClass' => 'Core_Model_DbTable_Quiz',
					'onDelete' => self::CASCADE,
					'onUpdate' => self::CASCADE
			),
			
			'FK_quizRel_theme_id' => array(
					'columns' => array('theme_id'),
					'refcolumns' => array('theme_id'),
					'refTableClass' => 'Core_Model_DbTable_Themes',
					'onDelete' => self::RESTRICT,
					'onUpdate' => self::CASCADE
			)
	);
}