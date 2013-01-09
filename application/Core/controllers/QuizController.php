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
		$quizMapper = new Core_Model_Mapper_Quiz();
		$quizList = $quizMapper->fetchAll();
		$this->view->quizList = $quizList;
		
		$levelMapper = new Core_Model_Mapper_Level();
		$this->view->levelMapper = $levelMapper;
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
				$nbTheme =(int) count($themes);
				$nbQuestion = $newQuizForm->getValue('nbQuestion');
				$questionByTheme = ceil($nbQuestion / $nbTheme);
				$sum = 0;				
				
				$quizRel = new Core_Model_QuizRel();
				foreach($themes as $theme)
				{
					if (($sum + $questionByTheme) > $nbQuestion) {
						$questionByTheme = $questionByTheme - 1;
					}
					
					$quizRel->setQuiz($quizId)  
							->setTheme($theme)
							->setQuestionByTheme($questionByTheme);
					
					$quizRelMapper = new Core_Model_Mapper_QuizRel();
					$quizRelMapper->save($quizRel);
					
					$sum = $sum + $questionByTheme;
				}

				$this->_redirect($this->view->url(array(), 'quiz'));
			}
		}
		
		$this->view->newQuizForm = $newQuizForm;
	}
	
	public function delAction()
	{
		$quizId = $this->getRequest()->getParam('quizId');
		
		$quiz = new Core_Model_Quiz();
		$quiz->setQuizId($quizId);
		
		$quizMapper = new Core_Model_Mapper_Quiz();
		$quizMapper->delete($quiz);
		
		$this->_redirect($this->view->url(array(), 'quiz'));
	}
	
	public function editAction()
	{
		
	}
}