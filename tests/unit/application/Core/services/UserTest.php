<?php 

class Core_Service_UserTest extends PHPUnit_Framework_TestCase
{

    public function setUp()
    {

    }

    public function testFindMethodReturnsValidUserEntityOnExistingId()
    {
        // Objet user attendu en résultat final
        $expected = $this->buildUserObject();
        
        // Mock d'un Row user
        $rowMock = $this->buildUserDbTableRow();
        
        // Mock de Rowset destiné à être retourné par DbTable->find()
        $rowSetMock = $this->getMockBuilder('Zend_Db_Table_Rowset_Abstract')
                           ->disableOriginalConstructor()
                           ->getMock();

        $rowSetMock->expects($this->any())
                   ->method('count')
                   ->will($this->returnValue(1));
        $rowSetMock->expects($this->any())
                   ->method('current')
                   ->will($this->returnValue($rowMock));

        // Mock de DbTable destiné à servir de Table Gateway au mapper
        $userDbTableMock = $this->getMock('Zend_Db_Table_Abstract');
        $userDbTableMock->expects($this->any())
                       ->method('find')
                       ->will($this->returnValue($rowSetMock));

        // Injection du mock de DbTable dans le Mapper
        $userService = new Core_Service_User();
        $userService->getUserMapper()->setDbTable($userDbTableMock);

        $actual = $userService->find(1);

        $this->assertEquals($expected, $actual);
    }

    public function testFetchAllMethodReturnsUserCollection()
    {
        // Mock du jeu de résultats au format RowSet
        $rowsetMock = $this->buildUserDbTableRowset(5);
        
        // Résultat attendu
        $expected = $this->buildUserCollection(5);

        // Mock de DbTable destiné à servir de Table Gateway au mapper
        $userDbTableMock = $this->getMock('Zend_Db_Table_Abstract');
        $userDbTableMock->expects($this->any())
        ->method('fetchAll')
        ->will($this->returnValue($rowsetMock));

        // Injection du mock de DbTable dans le Mapper
        $userService = new Core_Service_User();
        $userService->getUserMapper()->setDbTable($userDbTableMock);

        $actual = $userService->fetchAll();

        $this->assertEquals($expected, $actual);
    }

    protected function buildUserObject()
    {
        $role = new Core_Model_Role();
        $role->setId(1)
        ->setLabel('label');
        
        $user = new Core_Model_User;
        $user->setId(1)
        ->setRole($role)
        ->setPassword('password')
        ->setLogin('login')
        ->setEmail('me@mail.com')
        ->setFirstname('firstname')
        ->setLastname('lastname');
        
        return $user;
    }
    
    protected function buildUserDbTableRow()
    {
        $user = $this->buildUserObject();
        $role = $user->getRole();
        $userMapper = new Core_Model_Mapper_User();
        $roleMapper = new Core_Model_Mapper_Role();
        $userData = $userMapper->objectToArray($user);
        $roleData = $roleMapper->objectToArray($role);
        return new My_Db_Table_RowMock($userData, $roleData);
    }
    
    protected function buildUserDbTableRowset($count=2)
    {
        $users = array();
        $userMapper = new Core_Model_Mapper_User();
        $roleMapper = new Core_Model_Mapper_Role();
        
        for($i = 0; $i < $count; $i++ ) {
            $userId = $i+1;
        
            $role = new Core_Model_Role();
            $role->setId($userId)
            ->setLabel("label role $userId");
        
            $user = new Core_Model_User;
            $user->setId($userId)
            ->setRole($role)
            ->setPassword("password user $userId")
            ->setLogin("login user $userId")
            ->setEmail("me$userId@mail.com")
            ->setFirstname("firstname user $userId")
            ->setLastname("lastname user $userId");
            
            $user = $userMapper->objectToArray($user);
            $user['parentRow'] = $roleMapper->objectToArray($role);
            $user['dependentRowset'] = array();
            $users[] = $user;
        }
        $rowset = new My_Db_Table_RowsetMock($users);
        return $rowset;
    }

    protected function buildUserCollection($count=2)
    {
        $userCollection = new Core_Model_UserCollection();

        for($i = 0; $i < $count; $i++ ) {
            $userId = $i+1;

            $role = new Core_Model_Role();
            $role->setId($userId)
            ->setLabel("label role $userId");
    
            $user = new Core_Model_User;
            $user->setId($userId)
            ->setRole($role)
            ->setPassword("password user $userId")
            ->setLogin("login user $userId")
            ->setEmail("me$userId@mail.com")
            ->setFirstname("firstname user $userId")
            ->setLastname("lastname user $userId");
    
            $userCollection->add($user);
        }
        return $userCollection;
    }

    public function tearDown()
    {
    }
}