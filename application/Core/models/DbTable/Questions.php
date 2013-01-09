<?php
class Core_Model_DbTable_Questions extends Zend_Db_Table_Abstract
{
    /* NOM DE LA TABLE */
    protected $_name = 'questions';

    /* NOM DE LA CLE PRIMAIRE */
    protected $_primary = 'question_id';

    /* DECLARATION DES REFERENCES (FK) */
    protected $_referenceMap = array(
        'FK_questions_level_id' => array(
            'columns' => array('level_id'),
            'refcolumns' => array('level_id'),
            'refTableClass' => 'Core_Model_DbTable_Levels',
            'onDelete' => self::RESTRICT,
            'onUpdate' => self::CASCADE
        ),
        'FK_questions_theme_id' => array(
            'columns' => array('theme_id'),
            'refcolumns' => array('theme_id'),
            'refTableClass' => 'Core_Model_DbTable_Themes',
            'onDelete' => self::RESTRICT,
            'onUpdate' => self::CASCADE
        ),
        'FK_questions_type_id' => array(
            'columns' => array('type_id'),
            'refcolumns' => array('type_id'),
            'refTableClass' => 'Core_Model_DbTable_Types',
            'onDelete' => self::RESTRICT,
            'onUpdate' => self::CASCADE
        ),
    );
    
    protected $_dependentTables = array (
    		'Core_Model_DbTable_Reponses',
    		'Core_Model_DbTable_History'	
    );
}
