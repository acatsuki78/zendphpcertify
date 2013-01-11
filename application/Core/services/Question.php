<?php
/**
 * 
 * @author Nicolas Duba
 *
 */
class Core_Service_Question
{
	private $mapperQuestion;
	private $questionActive = 1;

	public function find($id, Core_Model_Question $question)
	{	
		$this->getMapperQuestion()->find($id, $question);

		return $question;
	}
	
	public function saveDataInSession(Zend_Form $form)
	{
		$question = $this->setToObject($form);
		$data = new Zend_Session_Namespace('question');
		$data->dataQuestion = $question;
	}
	
	public function deleteSession()
	{
		$data = new Zend_Session_Namespace('question');
		$data->dataQuestion = null;
	}
	
	public function getDataInSession()
	{
		$data = new Zend_Session_Namespace('question');

		return $data->dataQuestion;
	}

	public function save($question)
	{
		//$question = $this->setToObject($form);
		return $this->getMapperQuestion()->save($question);
	}
	
	public function fetchAll()
	{
		return $this->getMapperQuestion()->fetchAll();
	}

	public function getMapperQuestion()
	{
		if (null === $this->mapperQuestion) {
			$this->mapperQuestion = new Core_Model_Mapper_Questions();
		}

		return $this->mapperQuestion;
	}
	
	public function setToObject($form)
	{
		$question = new Core_Model_Question();
		$question->setQuestionId(
				('' !== $form->getValue(Core_Form_Questionadd::QUESTION_ID)
						? $form->getValue(Core_Form_Questionadd::QUESTION_ID) : null)
		)
		->setQuestionTitle($form->getValue(Core_Form_Questionadd::QUESTION_NAME))
		->setActive($this->questionActive)
		->setImage('not')
		->setLevel($form->getValue(Core_Form_Questionadd::QUESTION_LEVEL))
		->setType($form->getValue(Core_Form_Questionadd::QUESTION_TYPE))
		->setTheme($form->getValue(Core_Form_Questionadd::QUESTION_THEME))
		;
		
		return $question;
	}
}