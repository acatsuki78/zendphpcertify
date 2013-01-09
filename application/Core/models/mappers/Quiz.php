<?php
class Core_Model_Mapper_Quiz extends Core_Model_Mapper_Abstract
{
	protected $_dbTableClass = 'Core_Model_DbTable_Quiz';
	
	const COL_ID = 'quiz_id';
	const COL_TITLE = 'quiz_title';
	const COL_ACTIVE = 'quiz_active';
	const COL_NBR_QUESTION = 'quiz_nbr_question';
	const COL_DURATION = 'quiz_duration';
	const COL_DESCRIPTION = 'quiz_description';
	const COL_LEVEL_ID = 'level_id';
	
	
	public function rowToObject(Zend_Db_Table_Row_Abstract $row)
	{
		$quiz = new Core_Model_Quiz();
		$quiz->setQuizId($row[self::COL_ID])
			 ->setQuizTitle($row[self::COL_TITLE])
			 ->setActive($row[self::COL_ACTIVE])
			 ->setNbrQuestion($row[self::COL_NBR_QUESTION])
			 ->setDuration($row[self::COL_DURATION])
			 ->setDescr($row[self::COL_DESCRIPTION])
			 ->setLevel($row[self::COL_LEVEL_ID]);
		
		return $quiz;
	}
	
	public function objectToArray($quiz)
	{
		$data = array();
		$data[self::COL_ID] = $quiz->getQuizId();
		$data[self::COL_TITLE] = $quiz->getQuizTitle();
		$data[self::COL_ACTIVE] = $quiz->getActive();
		$data[self::COL_NBR_QUESTION] = $quiz->getNbrQuestion();
		$data[self::COL_DURATION] = $quiz->getDuration();
		$data[self::COL_DESCRIPTION] = $quiz->getDescr();
		$data[self::COL_LEVEL_ID] = $quiz->getLevel();
	
		return $data;
	}
}