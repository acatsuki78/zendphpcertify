<?php
class Front_IndexController extends Zend_Controller_Action
{
    private $isConnect;

    public function init()
    {
        $this->isConnect = new Zend_Session_Namespace('isConnect');
        $this->view->data = $this->isConnect;
    }

    public function indexAction()
    {   
        // $isConnect->isConnect = false;
        if($this->isConnect->isConnect === true){
           $this->_helper->viewRenderer('homeuser');  
        }
    }
    
    public function loginAction()
    {
        if($this->getRequest()->isXmlHttpRequest()) {
            $this->_helper->layout->disableLayout();
        } 
    }

    public function inscriptionAction()
    {
        if($this->getRequest()->isXmlHttpRequest()) {
            $this->_helper->layout->disableLayout();
        } 
    }

    public function validateinscriptionAction()
    {

        $this->_helper->layout->disableLayout();

        $request = $this->getRequest();
        $data = $request->getPost('data');
        
        $user = new Core_Model_User;
        $userMapper = new Core_Model_Mapper_User;

        $pwd = sha1($data['pwd']);

        $user->setFirstname($data['nom']);
        $user->setLastname($data['prenom']);
        $user->setEmail($data['email']);
        $user->setPassword($pwd);

        $result = false;

        if(!empty($data['nom']) && !empty($data['prenom']) && !empty($data['email']) && !empty($data['pwd'])){
            $result = $userMapper->verifEmail($data['email']);
            $array = array('ok' => $result);
        } else $array = array('ok' => $result);

        if($result){
            $userMapper->save($user);
            echo json_encode($array);
        } else{
            echo json_encode($array);
        }
    }

    public function loginvalidateAction() {

        $this->_helper->layout->disableLayout();

        $request = $this->getRequest();
        $data = $request->getPost('data');

        $result = false;

        $userMapper = new Core_Model_Mapper_User;

        if(!empty($data['email']) && !empty($data['pwd'])){
            $pwd = sha1($data['pwd']);

            $result = $userMapper->connexion_user($data['email'], $pwd);

            if($result == true){
                $array = array('ok' => $result);
                if ($this->isConnect->isConnect == false) {
                    $this->isConnect->isConnect = true;
                }
                echo json_encode($array);
            }else {
                $array = array('ok' => $result);
                echo json_encode($array);
            }
        }else echo json_encode($result);
    }

    public function homeAction()
    {
        if($this->getRequest()->isXmlHttpRequest()) {
            $this->_helper->layout->disableLayout();
        } 
    }

    public function deconnexionAction() {

        $this->_helper->layout->disableLayout();

        if ($this->isConnect->isConnect == true) {
            $this->isConnect->isConnect = false;
            $array = array('ok' => true);
            echo json_encode($array);
        }
    }
}
