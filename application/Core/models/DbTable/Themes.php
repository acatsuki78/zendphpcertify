<?php
class Core_Model_DbTable_Themes extends Zend_Db_Table_Abstract
{
    /* NOM DE LA TABLE */
    protected $_name = 'themes';

    /* NOM DE LA CLE PRIMAIRE */
    protected $_primary = 'theme_id';

    protected $_dependentTables = array(
    	'Core_Model_DbTable_Quiz',
    	'Core_Model_DbTable_Questions',
    	'Core_Model_DbTable_StatsThemes'
   	);
}