<?php

class Core_Model_RoleTest extends PHPUnit_Framework_TestCase
{
    
    private $roleModel;
    
    public function setUp()
    {
        $this->roleModel = new Core_Model_Role();
    }
    
    public function testGettersAndSettersWorkFine()
    {
        $this->roleModel->setId(1)
                        ->setLabel('label');
        
        $this->assertEquals(1, $this->roleModel->getId());
        $this->assertEquals('label', $this->roleModel->getLabel());       
    }
    
    public function tearDown()
    {
        $this->roleModel = null;
    }
    
}