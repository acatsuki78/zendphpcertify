<?php
class Core_Model_Mapper_QuizRel extends Core_Model_Mapper_Abstract
{
	protected $_dbTableClass = 'Core_Model_DbTable_QuizRel';
	
	const COL_ID = 'quizRel_id';
	const COL_QUIZ_ID = 'quiz_id';
	const COL_THEME_ID = 'theme_id';
	const COL_QUESTION_BY_THEME = 'question_by_theme';
	
	public function rowToObject(Zend_Db_Table_Row_Abstract $row)
	{
		$quizRel = new Core_Model_Quiz();
		$quizRel->setQuizRelId($row[self::COL_ID])
				->setQuiz($row[self::COL_QUIZ_ID])
			 	->setTheme($row[self::COL_THEME_ID])
				->setQuestionByTheme($row[self::COL_QUESTION_BY_THEME]);
		
		return $quizRel;
	}
	
	public function objectToArray($quizRel)
	{
		$data = array();
		$data[self::COL_ID] = $quizRel->getQuizRelId();
		$data[self::COL_QUIZ_ID] = $quizRel->getQuiz();
		$data[self::COL_THEME_ID] = $quizRel->getTheme();
		$data[self::COL_QUESTION_BY_THEME] = $quizRel->getQuestionByTheme();
	
		return $data;
	}
}