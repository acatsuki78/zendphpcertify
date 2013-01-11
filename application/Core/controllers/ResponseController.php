<?php
/**
 * 
 * @author Nicolas Duba
 *
 */
class ResponseController extends Zend_Controller_Action
{
    private $serviceResponse;

	public function init()
	{
		$this->serviceResponse = new Core_Service_Response();
	}
	
	public function indexAction()
	{
		
	}
	
	public function addresponseAction()
	{
		$serviceQuestion = new Core_Service_Question();
		$questionDataInSession = $serviceQuestion->getDataInSession();

		if (0 !== count($questionDataInSession)) {
                        $type = new Core_Model_Type();
                        $typeMapper = new Core_Model_Mapper_Type();
                        $typeObject = $typeMapper->find($questionDataInSession->getType());
                    
                        if (null !== $typeObject) {
                            $form = new Core_Form_Manageresponse($typeObject);

                            if ($this->_request->isPost() && $form->isValid($this->_request->getPost())) {
                                 $idQuestion = $serviceQuestion->save($questionDataInSession);
                                 $this->serviceResponse->saveResponse($form, $idQuestion);
                                 $this->_redirect('/Core/questions/new');
                            }

                            $this->view->typeObject   = $typeObject;
                            $this->view->dataQuestion = $questionDataInSession;
                            $this->view->form         = $form;
                            return;
                        }
		}

		$this->_redirect('/Core/questions/new');			
		
	}
}