<?php
/**
 * Formulaire de création d'un nouveau quiz
 */

/**
 * Formulaire de création d'un nouveau quiz
 *
 * @category MyApp
 * @package Core
 * @subpackage Form
 * @version 0.01
 * @since 2013-01-07
 * @author Eric
 */
class Core_Form_Newquiz extends Zend_Form
{	
	public function init()
	{		
		$title = new Zend_Form_Element_Text('title');
		$title->setRequired(true)
			  ->setLabel('Titre : ')
			  ->addValidator(
			  		new Zend_Validate_StringLength(
			  			array('min' => '5', 'max' => '100')
			  		)
			  	);
		$this->addElement($title);
		
		$descr = new Zend_Form_Element_Textarea('descr');
		$descr->setLabel('Description : ');
		$this->addElement($descr);
		
		$level = new Zend_Form_Element_Select('level');
		$levelMapper = new Core_Model_Mapper_Level();
		$levels = $levelMapper->fetchAll();
		
		$lvlArr = array();
		
		foreach($levels as $lvl)
		{
			$lvlArr[$lvl->getLevelId()] = $lvl->getLevel();
		}

		$level->setLabel('Difficulté : ')
			  ->addMultiOptions($lvlArr);
		$this->addElement($level);
		
		$nbQuestion = new Zend_Form_Element_Text('nbQuestion');
		$nbQuestion->setRequired(true)
				   ->setLabel('Nombre de questions : ')
				   ->setAttrib('style', 'width : 20px')
				   ->addValidator(
				   	 	new Zend_Validate_Digits()
				   	 )
				   ->addValidator(
				   	 	new Zend_Validate_StringLength(
				   	 		array('min' => '1', 'max' => '2')
				   	 	)
				   	 );
		$this->addElement($nbQuestion);
		
		$duration = new Zend_Form_Element_Text('duration');
		$duration->setRequired(true)
				 ->setLabel('Durée (en minute) : ')
				 ->setAttrib('style', 'width : 20px')
				 ->addValidator(
					new Zend_Validate_Digits()
				   )
				 ->addValidator(
					new Zend_Validate_StringLength(
						array('min' => '1', 'max' => '2')
					)
		);
		$this->addElement($duration);
		
// 		$decoCheckBox = array(
// 				'ViewHelper',
// 				'Description',
// 				'Errors',
// 				array('Label'),
// 				array('HtmlTag', array('tag' => 'div'))
// 				);
		
		$theme = new Zend_Form_Element_MultiCheckbox('theme');
		
		$themeMapper = new Core_Model_Mapper_Theme();
		$themes = $themeMapper->fetchAll();
		
		$themeArr = array();
		
		foreach ($themes as $sujet)
		{
			$themeArr[$sujet->getThemeId()] = $sujet->getThemeTitle() . ' - ' . $sujet->getLanguage();
		}
		
		$theme->setLabel('Thèmes : ')
			  ->addMultiOptions($themeArr);
// 			  ->addDecorators($checkboxDecorators);
		$this->addElement($theme);
		
		$submit = new Zend_Form_Element_Submit('Enregistrer');
		$this->addElement($submit);
	}
}