<?php

/**
 * Couche service pour les traitements liés
 * à la gestion des utilisateurs
 *
 * Couche service  pour les traitements liés
 * à la gestion des utilisateurs : <br />
 * <ul>
 * <li>Identification</li>
 * <li>Autorisations</li>
 * <li>CRUD de haut niveau sur les utilisateurs</li>
 * </ul>
 *
 */

/**
 * Couche service pour les traitements liés
 * à la gestion des utilisateurs
 *
 * Couche service  pour les traitements liés
 * à la gestion des utilisateurs : <br />
 * <ul>
 * <li>Identification</li>
 * <li>Autorisations</li>
 * <li>CRUD de haut niveau sur les utilisateurs</li>
 * </ul>
 *
 * @category MyApp
 * @package Core
 * @subpackage Service
 * @example <br />
 *          Instanciation : <br />
 *          <b>$userService = new Core_Service_UserApi();</b>
 * @version 0.01
 * @since 2012-08-06
 * @author Moi <moi@monmail.com>
 */
class Core_Service_User extends My_Service_ServiceAbstract
{
    /**
     * Le mapper user assure le lien avec la persistence des données
     * utilisateur en base de données
     *
     * @var Core_Model_Mapper_User
     */
    private $userMapper;
    /**
     * Le mapper role assure le lien avec la persistence des données
     * des rôles (groupes d'utilisateurs) en base de données
     *
     * @var Core_Model_Mapper_Role
     */
	private $roleMapper;
	
    /**
     * Assure l'identification d'un utilisateur pour un identifiant et
     * un mot de passe donné en utilisant Zend_Auth.
     * Assure également
     * l'enregistrement de l'identité dans la session pour la persistence
     * si l'identification a réussi
     *
     * @param string $login
     *            L'identifiant fourni par l'utilisateur
     * @param string $password
     *            Le mot de passe fourni par l'utilisateur
     * @return boolean
     *
     * @todo Ajouter un grain de sel pour renforcer la sécurité
     * @since 2012-08-07
     *
     * @author Un autre dev <dev@dev.com>
     *
     *         @edit 2012-08-08<br />
     *         Encore un autre <dev2@dev.com><br />
     *         Correction du bug #27
     */
    public function authenticate($login, $password)
    {
        $auth = Zend_Auth::getInstance();
        $authAdapter = new Zend_Auth_Adapter_DbTable();
        $authAdapter->setTableName('user')->setIdentityColumn('u_login')->setCredentialColumn('u_password')->setIdentity($login)->setCredential($password)->setCredentialTreatment('SHA1(?)');
        $result = $auth->authenticate($authAdapter);
        if (Zend_Auth_Result::SUCCESS === $result->getCode()) {
            $userRow = $authAdapter->getResultRowObject();
            $userMapper = new Core_Model_Mapper_User();
            $user = $userMapper->find($userRow->u_id);
            $auth->getStorage()->write($user);
            return true;
        }

        return false;
    }

    /**
     * Supprime une identité enregistrée en session par Zend_Auth
     */
    public function clearIdentity()
    {
        Zend_Auth::getInstance()->clearIdentity();
    }
    
    /**
     * Vérifie qu'une identité est enregistrée en session par Zend_Auth
     */
    public function hasIdentity()
    {
        return Zend_Auth::getInstance()->hasIdentity();
    }

    public function getIdentity()
    {
    	return Zend_Auth::getInstance()->getIdentity();
    }
    /**
     * Récupère un compte utilisateur en base de données à partir
     * de son ID
     *
     * @param int $uid
     *            L'id (clé primaire) de l'utilisateur
     * @return Core_Model_User boolean
     */
    public function find($uid)
    {
        return $this->getUserMapper()->find($uid);
    }

    /**
     * Récupère, depuis le cache de données ou la BDD,
     * la liste des utilisateurs sous forme
     * d'un tableau d'objets Core_Model_User
     *
     * @return Core_Model_UserCollection
     */
    public function fetchAll()
    {
        if (! $users = $this->getCache()->load('userservicefetchall')) {
            $users = $this->getUserMapper()->fetchAll();
            $this->getCache()->save($users);
        }

        return $users;
    }

    /**
     * Permet d'enregistrer un objet utilisateur
     * dans la BDD
     *
     * @param  Core_Model_User $user
     * @return boolean
     */
    public function save(Core_Model_User $user)
    {
        $result = (bool) $this->getUserMapper()->save($user);
        if ($result) {
            $this->getCache()->remove('userservicefetchall');
        }
        return $result;
    }

    /**
     * Permet de supprimer un objet utilisateur
     * dans la BDD
     *
     * @param  Core_Model_User $user
     * @return boolean
     */
    public function delete($user)
    {
        $result = (bool) $this->getUserMapper()->delete($user);
        if ($result) {
            $this->getCache()->remove('userservicefetchall');
        }
        return $result;
    }

    /**
     * INJECTED FACTORY
     * Permet d'accéder, en lazy loading, au mapper de données
     * des utilisateurs
     *
     * @return Core_Model_Mapper_User
     */
    public function getUserMapper()
    {
        if (null === $this->userMapper) {
            $this->userMapper = new Core_Model_Mapper_User();
        }

        return $this->userMapper;
    }

    /**
     * Point d'injection pour le mapper de données des utilisateurs
     *
     * @param Core_Model_Mapper_User $mapper
     */
    public function setUserMapper($mapper)
    {
        $this->userMapper = $mapper;
    }
    
    /**
     * INJECTED FACTORY
     * Permet d'accéder, en lazy loading, au mapper de données
     * des rôles
     *
     * @return Core_Model_Mapper_Role
     */
    public function getRoleMapper()
    {
    	if (null === $this->roleMapper) {
    		$this->roleMapper = new Core_Model_Mapper_Role();
    	}
    
    	return $this->roleMapper;
    }
    
    /**
     * Point d'injection pour le mapper de données des rôles
     *
     * @param Core_Model_Mapper_Role $mapper
     */
    public function setRoleMapper($mapper)
    {
    	$this->roleMapper = $mapper;
    }
}
 