<?php
/**
 * Mapper pour les utilisateurs
 *
 * Le mapper assure le lien avec la persistence
 * assurée par Core_Model_DbTable_User pour les objets
 * de domaine Core_Model_User
 *
 */

/**
 * Mapper pour les utilisateurs
 *
 * Le mapper assure le lien avec la persistence
 * assurée par Core_Model_DbTable_User pour les objets
 * de domaine Core_Model_User
 *
 * @category MyApp
 * @package Core
 * @subpackage Model
 * @example <br />
 *          Instanciation : <br />
 *          <b>$userMapper = new Core_Model_Mapper_User();</b>
 * @version 0.01
 * @since 2012-08-06
 * @author Moi <moi@monmail.com>
 */
class Core_Model_Mapper_User extends Core_Model_Mapper_Abstract
{
    protected $_dbTableClass = 'Core_Model_DbTable_Users';

    const COL_ID = 'user_id';
    // const COL_ROLE_ID = 'r_id';
    // const COL_LOGIN = 'u_login';
    const COL_PASSWORD = 'user_password';
    const COL_EMAIL = 'user_email';
    const COL_FIRSTNAME = 'user_firstname';
    const COL_LASTNAME = 'user_lastname';

    public function fetchAll()
    {
        $rowSet = $this->getDbTable()->fetchAll();
        if (0 === $rowSet->count()) {
            return false;
        }
        $userCollection = new Core_Model_UserCollection();
        foreach ($rowSet as $row) {
            $userCollection->add($this->rowToObject($row));
        }

        return $userCollection;
    }

    public function rowToObject(Zend_Db_Table_Row_Abstract $row)
    {
        $roleMapper = new Core_Model_Mapper_Role();

        $role = $roleMapper->rowToObject(
            $row->findParentRow('Core_Model_DbTable_Role', 'FK_role')
        );

        $user = new Core_Model_User();
        $user->setId($row[self::COL_ID]);
        // $user->setRole($role);
        // $user->setLogin($row[self::COL_LOGIN]);
        $user->setPassword($row[self::COL_PASSWORD]);
        $user->setEmail($row[self::COL_EMAIL]);
        $user->setFirstname($row[self::COL_FIRSTNAME]);
        $user->setLastname($row[self::COL_LASTNAME]);

        return $user;
    }

    public function objectToArray($user)
    {
        $data[self::COL_ID] = $user->getId();
        // $data[self::COL_ROLE_ID] = $user->getRole()->getId();
        // $data[self::COL_LOGIN] = $user->getLogin();
        $data[self::COL_PASSWORD] = $user->getPassword();
        $data[self::COL_EMAIL] = $user->getEmail();
        $data[self::COL_FIRSTNAME] = $user->getFirstname();
        $data[self::COL_LASTNAME] = $user->getLastname();

        return $data;
    }

    public function verifEmail($email) {
        $query = "SELECT user_email FROM users WHERE user_email = ?";
        $result = $this->getDbTable()->getAdapter()->query($query,array($email))->fetchAll();
        if (count($result) === 0) {
            return true;
        }
        return false;
    }

    public function connexion_user($email,$pwd){
        $query = "SELECT user_password FROM users WHERE user_email = ?";
        $result = $this->getDbTable()->getAdapter()->query($query,array($email))->fetchAll();
        if($result[0]['user_password'] === $pwd){
            return true;
        }
        return false;
    }
}
