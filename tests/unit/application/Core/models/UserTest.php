<?php

class Core_Model_UserTest extends PHPUnit_Framework_TestCase
{
    
    private $userModel;
    
    public function setUp()
    {
        $this->userModel = new Core_Model_User();
    }
    
    public function testGettersAndSettersWorkFine()
    {
        $this->userModel->setId(1)
                        ->setLogin('login')
                        ->setPassword('password')
                        ->setFirstname('firstname')
                        ->setLastname('lastname')
                        ->setEmail('email')
                        ->setRole(new Core_Model_Role);
        
        $this->assertEquals(1, $this->userModel->getId());
        $this->assertEquals('login', $this->userModel->getLogin());
        $this->assertEquals('password', $this->userModel->getPassword());
        $this->assertEquals('firstname', $this->userModel->getFirstname());
        $this->assertEquals('lastname', $this->userModel->getLastname());
        $this->assertEquals('email', $this->userModel->getEmail());
        $this->assertInstanceOf('Core_Model_Role', $this->userModel->getRole());       
    }
    
    public function tearDown()
    {
        $this->userModel = null;
    }
    
}