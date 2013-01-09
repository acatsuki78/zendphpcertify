<?php
class Core_Model_DbTable_StatsThemes extends Zend_Db_Table_Abstract
{
    /* NOM DE LA TABLE */
    protected $_name = 'stats_themes';

    /* NOM DE LA CLE PRIMAIRE */
    protected $_primary = 'stat_id';

    /* DECLARATION DES REFERENCES (FK) */
    protected $_referenceMap = array(
        'FK_statsThemes_stat_id' => array(
            'columns' => array('stat_id'),
            'refcolumns' => array('stat_id'),
            'refTableClass' => 'Core_Model_DbTable_Stats',
            'onDelete' => self::RESTRICT,
            'onUpdate' => self::CASCADE
        ),
        'FK_statsThemes_theme_id' => array(
            'columns' => array('theme_id'),
            'refcolumns' => array('theme_id'),
            'refTableClass' => 'Core_Model_DbTable_Themes',
            'onDelete' => self::RESTRICT,
            'onUpdate' => self::CASCADE
        ),
    );
}
