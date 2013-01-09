<?php 

class AuthControllerTest extends Zend_Test_PHPUnit_ControllerTestCase
{
    public function setUp()
    {
        $this->bootstrap = ROOT_PATH . '/tests/functionnal/bootstrap.php';
        parent::setUp();
    }
    
    public function testAuthenticationWithValidCredentialsRedirectsToHome()
    {
        $this->authenticateUser();
        
        $this->assertRedirectTo('/');

    }
    
    public function testAuthenticationWithInvalidCredentialsRedirectsToSigninForm()
    {
        $this->authenticateUser(false);
        
        $this->assertModule('Core');
        $this->assertController('auth');
        $this->assertAction('signin');
        $this->assertNotRedirect();
        $this->assertResponseCode(200);
        $this->assertQueryCount('form#signinForm', 1);
    }
    
    public function testSignoutRedirectsToSignin()
    {
        $this->authenticateUser();
        $userService = new Core_Service_User();
        $this->assertEquals(true, $userService->hasIdentity());

        $this->resetResponse();
        $this->dispatch('/signout');
        $this->assertEquals(false, $userService->hasIdentity());
        $this->assertRedirectTo('/signin');
    }
    
    private function authenticateUser($validCredentials=true)
    {
        if ($validCredentials){
            $credentials = array('login' => 'admin', 'password' => '0000');
        } else {
            $credentials = array('login' => 'wrong', 'password' => 'wrong');
        }
        $this->_request
             ->setMethod('POST')
             ->setPost(array(
                        'login' => $credentials['login'],
                        'password' => $credentials['password']
                       ));
        $this->dispatch('/signin');
    }
}