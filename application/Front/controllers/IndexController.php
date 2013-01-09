<?php
class Front_IndexController extends Zend_Controller_Action
{
    public function init()
    {

    }

    public function indexAction()
    {

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

    public function validateInscriptionAction()
    {
        
    }

    public function homeAction()
    {
        if($this->getRequest()->isXmlHttpRequest()) {
            $this->_helper->layout->disableLayout();
        } 
    }
}
