<?php
class Core_Model_DbTable_Types extends Zend_Db_Table_Abstract
{
    /* NOM DE LA TABLE */
    protected $_name = 'types';

    /* NOM DE LA CLE PRIMAIRE */
    protected $_primary = 'type_id';
    
    protected $_dependentTables = array(
    		'Core_Model_DbTable_Questions'		
    );
}