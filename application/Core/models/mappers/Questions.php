<?php
/**
 * 
 * @author Nicolas
 *
 */
class Core_Model_Mapper_Questions extends Core_Model_Mapper_Abstract
{
	protected $_dbTableClass = 'Core_Model_DbTable_Questions';
	
	const COL_ID = 'question_id';
	const COL_TITLE = 'question_title';
	const COL_ACTIVE = 'question_active';
	const COL_IMAGE = 'question_image';
	const COL_LEVEL_ID = 'level_id';
	const COL_TYPE_ID = 'type_id';
	const COL_THEME_ID = 'theme_id';
	
	public function rowToObject(Zend_Db_Table_Row_Abstract $row)
	{
		$level = new Core_Model_Mapper_Level();
		$level->rowToObject(
				$row->findParentRow('Core_Model_DbTable_Levels', 'FK_questions_level_id')
		);
		$type = new Core_Model_Mapper_Type();
		$type->rowToObject(
				$row->findParentRow('Core_Model_DbTable_Types', 'FK_questions_type_id')
		);
		$theme = new Core_Model_Mapper_Theme();
		$theme->rowToObject(
				$row->findParentRow('Core_Model_DbTable_Themes', 'FK_questions_theme_id')
		);
		$question = new Core_Model_Question();
		$question->setQuestionId($row[self::COL_ID])
				 ->setQuestionTitle($row[self::COL_TITLE])
				 ->setActive($row[self::COL_ACTIVE])
				 ->setImage($row[self::COL_IMAGE])
				 ->setLevel($level)
				 ->setType($type)
				 ->setTheme($theme);

		return $question;
	}
	
	public function objectToArray($question)
	{
		$data = array();
		$data[self::COL_ID] = $question->getQuestionId();
		$data[self::COL_TITLE] = $question->getQuestionTitle();
		$data[self::COL_ACTIVE] = $question->getActive();
		$data[self::COL_IMAGE] = $question->getImage();
		$data[self::COL_LEVEL_ID] = $question->getLevel();
		$data[self::COL_TYPE_ID] = $question->getType();
		$data[self::COL_THEME_ID] = $question->getTheme();
	
		return $data;
	}
}