<?php 

class AuthTest extends Zend_Test_PHPUnit_ControllerTestCase
{
    
    public function setUp()
    {
       $this->bootstrap = ROOT_PATH . '/tests/functionnal/bootstrap.php';
       parent::setUp();
    }
    
    public function testAuthPluginRedirectsToSigninWhenUserHasNoIdentity()
    {
        $this->dispatch('/users');
        $this->assertRoute('coreUserList');
        $this->assertModule('Core');
        $this->assertController('auth');
        $this->assertAction('signin');
        $this->assertNotRedirect();
        $this->assertResponseCode(200);
        $this->assertQueryCount('form#signinForm', 1);
    }
    
}