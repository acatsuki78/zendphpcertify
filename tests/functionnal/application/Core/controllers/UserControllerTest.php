<?php 

class UserControllerTest extends Zend_Test_PHPUnit_ControllerTestCase
{
    public function setUp()
    {
        $this->bootstrap = ROOT_PATH . '/tests/functionnal/bootstrap.php';
        parent::setUp();
        $this->authenticateUser();
    }
    
    
    public function testCoreUserListDisplaysUsers()
    {
        $this->resetRequest();
        $this->resetResponse();
        
        $this->dispatch('/users');
        $this->assertQueryCountMin('table#users-list tr td', 1);
    }
    
    public function testUserCreationworksFine()
    {
        $this->resetRequest();
        $this->resetResponse();
        
        $id = uniqid();
        $data = array(
                'login' => 'Test' . $id,
                'password' => 'Test' . $id,
                'passwordconf' => 'Test' . $id,
                'firstname' => 'Test' . $id,
                'lastname' => 'Test' . $id,
                'email' => 'Test' . $id . '@test.com',
                'role' => 1,
                'submit' => true
            );
        
        $this->getRequest()
        ->setMethod('POST')
        ->setPost($data);
        
        $this->dispatch('/users/new');
        
        $this->assertRedirectTo('/users');
        
        $this->resetRequest();
        $this->resetResponse();
        
        $this->dispatch('/users');
        $this->assertQueryContentRegex('table#users-list tr td', "/Test$id/");
    }
    
    public function testUserDestructionWorksFine()
    {
        $this->resetRequest();
        $this->resetResponse();
        
        $this->dispatch('/users/delete/33');
        
        $this->assertRedirectTo('/users');
        
        $this->resetRequest();
        $this->resetResponse();
        
        $this->dispatch('/users');
        
        $this->assertQueryContentRegex('table#users-list tr td', "/((?!users\/delete\/33))/");
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