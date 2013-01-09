<?php
/**
 * Mapper pour les privileges
 *
 * Le mapper assure le lien avec la persistence
 * assurée par Core_Model_DbTable_Privilege pour les objets
 * de domaine Core_Model_Privilege
 *
 */

/**
 * Mapper pour les privileges
 *
 * Le mapper assure le lien avec la persistence
 * assurée par Core_Model_DbTable_Privilege pour les objets
 * de domaine Core_Model_Privilege
 *
 * @category MyApp
 * @package Core
 * @subpackage Model
 * @version 0.01
 * @since 2012-09-07
 * @author Moi <moi@monmail.com>
 */
class Core_Model_Mapper_Privilege extends Core_Model_Mapper_Abstract
{
    protected $_dbTableClass = 'Core_Model_DbTable_Privilege';

    const COL_RESOURCE_NAME = 'resource_name';
    const COL_ROLE_ID = 'r_id';
    const COL_PRIVILEGES = 'privileges';

    public function rowToObject(Zend_Db_Table_Row_Abstract $row)
    {
        $roleMapper = new Core_Model_Mapper_Role();

        $role = $roleMapper->rowToObject(
            $row->findParentRow('Core_Model_DbTable_Role', 'test_allows_role_FK')
        );
        
        $privileges = new Core_Model_Privilege();
        $privileges->setResourceName($row[self::COL_RESOURCE_NAME]);
        $privileges->setRoleId($role);
        $privileges->setPrivileges($row[self::COL_PRIVILEGES]);

        return $privileges;
    }

    public function objectToArray($privileges)
    {
        $data[self::COL_RESOURCE_NAME] = $privileges->getResourceName();
        $data[self::COL_ROLE_ID] = $privileges->getRoleId();
        $data[self::COL_PRIVILEGES] = $privileges->getPrivileges();

        return $data;
    }
}
