<?php
/**
 * Controller de Quiz
 */

/**
 * Controller de Quiz
 *
 * @category MyApp
 * @package Core
 * @subpackage Controller
 * @version 0.01
 * @since 2013-01-07
 * @author Eric
 */
class QuizController extends Zend_Controller_Action
{
	public function quizAction()
	{
		$quizMapper = new Core_Model_Mapper_Quiz;
		$quizMapper->fetchAll();
	}
	
	public function newAction()
	{
		$newQuizForm = new Core_Form_Newquiz;
		$newQuizForm->setAction('')->setMethod('post');
		
		if($this->getRequest()->isPost()) {
			if($newQuizForm->isValid($this->getRequest()->getPost())) {
				$quiz = new Core_Model_Quiz();
				$quiz->setQuizTitle($newQuizForm->getValue('title'))
					 ->setDescr($newQuizForm->getValue('descr'))
					 ->setLevel($newQuizForm->getValue('level'))
					 ->setNbrQuestion($newQuizForm->getValue('nbQuestion'))
					 ->setActive('1')
					 ->setDuration($newQuizForm->getValue('duration'));
				
				$quizMapper = new Core_Model_Mapper_Quiz();				
				$quizId = $quizMapper->save($quiz);
								
				$themes = $newQuizForm->getValue('theme');
				
				$quizRel = new Core_Model_QuizRel();
				foreach($themes as $theme)
				{
					$quizRel->setQuiz($quizId)  
							->setTheme($theme)
							->setQuestionByTheme(1);
					
					$quizRelMapper = new Core_Model_Mapper_QuizRel();
					$quizRelMapper->save($quizRel);
				}
				
				$this->_redirect('/quiz/');
			}
		}
		
		$this->view->newQuizForm = $newQuizForm;
	}
	
	public function delAction()
	{
		
	}
	
	public function editAction()
	{
		
	}
}