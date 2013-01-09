<?php
class Core_Model_DbTable_Reponses extends Zend_Db_Table_Abstract
{
	protected $_name = 'reponses';
	
	protected $_primary = 'reponse_id';
	
	protected $referenceMap = array(			
			'FK_reponses_question_id' => array(
					'columns' => array('question_id'),
					'refcolumns' => array('question_id'),
					'refTableClass' => 'Core_Model_DbTable_Questions',
					'onDelete' => self::RESTRICT,
					'onUpdate' => self::CASCADE
			)
	);
}