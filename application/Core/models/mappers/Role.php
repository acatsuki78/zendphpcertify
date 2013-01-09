<?php
/**
 * Mapper pour les rôles
 *
 * Le mapper assure le lien avec la persistence
 * assurée par Core_Model_DbTable_Role pour les objets de domaine Core_Model_Role
 *
 */

/**
 * Mapper pour les rôles
 *
 * Le mapper assure le lien avec la persistence
 * assurée par Core_Model_DbTable_Role pour les objets de domaine Core_Model_Role
 *
 * @category MyApp
 * @package Core
 * @subpackage Model
 * @example <br />
 *          Instanciation : <br />
 *          <b>$roleMapper = new Core_Model_Mapper_Role();</b>
 * @version 0.01
 * @since 2012-08-06
 * @author Moi <moi@monmail.com>
 */
class Core_Model_Mapper_Role extends Core_Model_Mapper_Abstract
{

    protected $_dbTableClass = 'Core_Model_DbTable_Role';

    const COL_ID = 'r_id';
    const COL_LABEL = 'r_label';

    public function fetchAll()
    {
    	
    	
    	$rowSet = $this->getDbTable()->fetchAll();
    
    	if (0 === $rowSet->count()) {
    		return false;
    	}
    	$rolesCollection = new Core_Model_RoleCollection();
    	foreach ($rowSet as $row) {
    		$rolesCollection->add($this->rowToObject($row));
    	}
    
    	return $rolesCollection;
    }
    
    public function rowToObject(Zend_Db_Table_Row_Abstract $row)
    {

        $role = new Core_Model_Role();
        $role->setId($row[self::COL_ID]);
        $role->setLabel($row[self::COL_LABEL]);

        return $role;
    }

    public function objectToArray($role)
    {
        $data[self::COL_ID] = $role->getId();
        $data[self::COL_LABEL] = $role->getLabel();

        return $data;
    }
}
