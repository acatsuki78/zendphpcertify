<?php
/**
 * Controller de Qusetion
 */

/**
 * Controller de Question
 *
 * @category MyApp
 * @package Core
 * @subpackage Controller
 * @version 0.01
 * @since 2013-01-07
 * @author Nicolas Duba
 */
class QuestionsController extends Zend_Controller_Action
{
	private $serviceQuestion;
	private $idQuestion;

	public function init()
	{
		$this->serviceQuestion = new Core_Service_Question();
		$this->idQuestion = $this->_request->getParam('id');
	}

	public function questionsAction()
	{
		
	}
	
	public function newAction()
	{
		$this->view->headTitle('Ajouter une nouvelle question');

		$form = new Core_Form_Questionadd();
		if ($form->isValid($this->_request->getPost()) && $this->_request->isPost()) {
			$this->serviceQuestion->save($form);
			$this->_redirect('/Core/questions/new');
		}
		$this->view->form = $form;
	}
	
	public function editAction()
	{
		$question = new Core_Model_Question();
		if (null === $this->serviceQuestion->find($this->idQuestion, $question)->getId()) {
			exit('question inexistante');
		}
		$this->view->headTitle('Editer la question #'.$question->getQuestionId());
		
		$form = new Core_Form_Questionadd();
		if ($form->isValid($this->_request->getPost()) && $this->_request->isPost()) {
			$this->serviceQuestion->save($form);
			$this->_redirect('/Core/questions/new');
		}
		
		$this->_helper->viewRenderer('new');
		$this->view->form = $form;
	}
	
	public function listAction()
	{
		
	}
	
	public function delAction()
	{
		
	}
}