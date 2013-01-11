<?php
class Core_Model_Mapper_Reponses extends Core_Model_Mapper_Abstract
{
	protected $_dbTableClass = 'Core_Model_DbTable_Reponses';
	
	const COL_ID = 'reponse_id';
	const COL_REPONSE_TEXT = 'reponse_text';
	const COL_REPONSE_CORRECT = 'reponse_correct';
	const COL_QUESTION_ID = 'question_id';
	
	public function rowToObject(Zend_Db_Table_Row_Abstract $row)
	{
		$reponse = new Core_Model_Reponse();
		$reponse->setQuestion($row[self::COL_QUESTION_ID])
				->setReponseId($row[self::COL_ID])
				->setReponse($row[self::COL_REPONSE_CORRECT])
				->setReponseText($row[self::COL_REPONSE_TEXT]);
		
		return $reponse;
	}
	
	public function objectToArray($reponse)
	{
		$data = array();
		$data[self::COL_ID] = $reponse->getReponseId();
		$data[self::COL_REPONSE_TEXT] = $reponse->getReponseText();
		$data[self::COL_REPONSE_CORRECT] = $reponse->getReponse();
		$data[self::COL_QUESTION_ID] = $reponse->getQuestion();
	
		return $data;
	}
}