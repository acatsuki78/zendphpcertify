<?php
class Core_Model_DbTable_Levels extends Zend_Db_Table_Abstract
{
    /* NOM DE LA TABLE */
    protected $_name = 'levels';

    /* NOM DE LA CLE PRIMAIRE */
    protected $_primary = 'level_id';

    protected $_dependentTables = array(
    	'Core_Model_DbTable_Quiz',
    	'Core_Model_DbTable_Questions'	
   	);
}