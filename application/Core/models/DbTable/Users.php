<?php
/**
 * DbTable User
 * Représente la table user de la BDD
 */

/**
 * DbTable User
 * Représente la table user de la BDD
 *
 * @category MyApp
 * @package Core
 * @subpackage Model
 * @version 0.01
 * @since 2013-01-07
 * @author Moi <moi@monmail.com>
 */
class Core_Model_DbTable_Users extends Zend_Db_Table_Abstract
{
    /* NOM DE LA TABLE */
    protected $_name = 'users';

    /* NOM DE LA CLE PRIMAIRE */
    protected $_primary = 'user_id';
    
    /* TABLE(S) DEPENDANTE(S) */
    protected $_dependentTables = array(
    		'Core_Model_DbTable_Stats',
    		'Core_Model_DbTable_History'
    );
}
