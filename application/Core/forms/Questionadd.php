<?php
/**
 * 
 * @author Nicolas Duba
 *
 */
class Core_Form_Questionadd extends Zend_Form
{
	const QUESTION_NAME = 'questionName';
	const QUESTION_ID = 'questionId';
	const QUESTION_LEVEL = 'questionLevel';
	const QUESTION_TYPE = 'questionType';
	const QUESTION_THEME = 'questionTheme';
	
	//private $urlAction = '/Core/questions/save'; // temp

	public function __construct(Core_Model_Question $question = null)
	{
		parent::__construct();
		$this->setMethod('post')->setAction('');
		$this->populate(
				array(
					$this->getValue(self::QUESTION_NAME)
				)
		);
	}
	
	public function init()
	{
		// 	Data
			$mapperLevel = new Core_Model_Mapper_Level();
			$levels = $mapperLevel->fetchAll();
			$levelList = array();
			foreach ($levels as $level) {
				$levelList[$level->getLevelId()] = $level->getLevel();
			}
			
			$mapperTheme = new Core_Model_Mapper_Theme();
			$themes = $mapperTheme->fetchAll();
			$themeList = array();
			foreach ($themes as $theme) {
				$themeList[$theme->getThemeId()] = $theme->getLanguage() . ' - ' . $theme->getThemeTitle(); 
			}
			
			$mapperType = new Core_Model_Mapper_Type();
			$types = $mapperType->fetchAll();
			$typeList = array();
			foreach ($types as $type) {
				$typeList[$type->getTypeId()] = $type->getTypeTitle();
			}
		//
		
		
		$question = new Zend_Form_Element_Text(self::QUESTION_NAME);
		$question->setRequired(true)
				 ->addFilter(
                       new Zend_Filter_StripTags()
                  )
                 ->addValidator(
                          new Zend_Validate_StringLength(
                              array('min' => 3, 'max' => 60)
                          )
                  );

		$question->setLabel('Intitulé de la question ');

		$questionTheme = new Zend_Form_Element_Select(self::QUESTION_THEME);
		$questionTheme->setLabel('Choisir le thème de la question')
					  ->setRequired(true)
					  ->addMultiOptions($themeList);;
		
		$questionLevel = new Zend_Form_Element_Select(self::QUESTION_LEVEL);
		$questionLevel->setLabel('Choisir une difficulté ')
					  ->setRequired(true)
					  ->addMultiOptions($levelList);
		
		$questionType = new Zend_Form_Element_Select(self::QUESTION_TYPE);
		$questionType->setLabel('Choisir un type de question')
					 ->setRequired(true)
					 ->addMultiOptions($typeList);
		
		$questionId = new Zend_Form_Element_Hidden(self::QUESTION_ID);
		
		$submit = new Zend_Form_Element_Submit('submit');
		$submit->setLabel('Valider');
		
		$this->addElements(
				array(
					$question, $questionTheme, $questionLevel, $questionType, $questionId, $submit
				)
		);
	}
}