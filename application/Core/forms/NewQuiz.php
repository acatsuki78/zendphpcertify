<?php
class Core_Form_Newquiz extends Zend_Form
{
	public function init()
	{
		$title = new Zend_Form_Element_Text('title');
		$title->setRequired(true)
			  ->setValidator(
			  		new Zend_Validate_StringLength(
			  			array('min' => '5', 'max' => '100')
			  		)
			  	);
		$this->addElement($title);
		
		$submit = new Zend_Form_Element_Submit('Enregistrer');
		$this->addElement($submit);
	}
}