<?php
class Core_Service_Question
{
	private $mapperQuestion;
	private $questionActive = 1;

	public function find($id, Core_Model_Question $question)
	{
		
		$this->getMapperQuestion()->find($id, $question);

		return $question;
	}

	public function save(Zend_Form $form)
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

		$this->getMapperQuestion()->save($question);
	}

	public function getMapperQuestion()
	{
		if (null === $this->mapperQuestion) {
			$this->mapperQuestion = new Core_Model_Mapper_Questions();
		}

		return $this->mapperQuestion;
	}
}