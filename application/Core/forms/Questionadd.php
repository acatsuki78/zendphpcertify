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
		if (null !== $question) {
			$this->populate(
					array(
						self::QUESTION_NAME => $question->getQuestionTitle()
					)
			);
		}
	}
	
	public function init()
	{
		$this->clearDecorators();
		$this->setMethod('post')
			 ->setAction('')
			 ->setAttrib('id', 'formQuestion');

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
		$question->setLabel('Intitulé de la question ')
				 ->setRequired(true)
				 ->addFilter(
                       new Zend_Filter_StripTags()
                  )
                 //->addDecorators($this->decorator())
                 ->addValidator(
                          new Zend_Validate_StringLength(
                              array('min' => 3)
                          )
                  );

		$questionTheme = new Zend_Form_Element_Select(self::QUESTION_THEME);
		$questionTheme->setLabel('Choisir le thème de la question')
					  //->addDecorators($this->decorator())
					  ->setRequired(true)
					  ->addMultiOptions($themeList);;
		
		$questionLevel = new Zend_Form_Element_Select(self::QUESTION_LEVEL);
		$questionLevel->setLabel('Choisir une difficulté ')
					  //->addDecorators($this->decorator())
					  ->setRequired(true)
					  ->addMultiOptions($levelList);
		
		$questionType = new Zend_Form_Element_Select(self::QUESTION_TYPE);
		$questionType->setLabel('Choisir un type de question')
					 //->addDecorators($this->decorator())
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
	
	public function decorator() {
		$decorator = array(
				'ViewHelper',
				array(
						'Label',
						array(
								'class' => 'label'
						)
				),
				'Errors',
				'Description',
				array(
						'HtmlTag',
						array(
								'tag' => 'p'
						)
				)
		);
	
		return $decorator;
	}
}