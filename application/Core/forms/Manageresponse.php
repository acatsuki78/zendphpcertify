<?php
/**
 * 
 * @author Nicolas Duba
 *
 */
class Core_Form_Manageresponse extends Zend_Form
{
    const RESPONSE = 'response';

    private $typeObject;

    public function __construct($typeObject)
    {
            $this->typeObject   = $typeObject;
            parent::__construct();
    }

    public function init()
    {
            $this->setMethod('post')
                 ->setAction('');

            $this->generateElement($this->typeObject->getTypeTitle());

            $submit = new Zend_Form_Element_Submit('submit');
            $submit->setLabel("Enregistrer");
            $this->addElement($submit);
    }

    public function generateElement($typeTitle)
    {
        switch ($typeTitle) {
            case 'text' :
                $text = new Zend_Form_Element_Text(self::RESPONSE);
                $text->setLabel('Réponse');
                $this->addElement($text);
                break;

            case 'checkbox' :
                $text1 = new Zend_Form_Element_Text('response1');
                $text1->setLabel('Réponse 1')
                      ->setRequired(true);

                $text2 = new Zend_Form_Element_Text('response2');
                $text2->setLabel('Réponse 2')
                      ->setRequired(true);

                $text3 = new Zend_Form_Element_Text('response3');
                $text3->setLabel('Réponse 3')
                      ->setRequired(true);

                $text4 = new Zend_Form_Element_Text('response4');
                $text4->setLabel('Réponse 4')
                      ->setRequired(true);

                $checkbox1 = new Zend_Form_Element_Checkbox('checkbox1');
                $checkbox2 = new Zend_Form_Element_Checkbox('checkbox2');
                $checkbox3 = new Zend_Form_Element_Checkbox('checkbox3');
                $checkbox4 = new Zend_Form_Element_Checkbox('checkbox4');

                $this->addElements(
                        array(
                            $text1, $text2, $text3, $text4,
                            $checkbox1, $checkbox2, $checkbox3, $checkbox4
                        )
                );
                break;

            case 'radio' :
                $text1 = new Zend_Form_Element_Text('response1');
                $text1->setLabel('Réponse 1')
                      ->setRequired(true);

                $text2 = new Zend_Form_Element_Text('response2');
                $text2->setLabel('Réponse 2')
                      ->setRequired(true);

                $text3 = new Zend_Form_Element_Text('response3');
                $text3->setLabel('Réponse 3')
                      ->setRequired(true);

                $text4 = new Zend_Form_Element_Text('response4');
                $text4->setLabel('Réponse 4')
                      ->setRequired(true);
                
                $radio = new Zend_Form_Element_Radio('radio');
                $radio->addMultiOptions(
                    array(
                        '1' => 'Réponse 1',
                        '2' => 'Réponse 2',
                        '3' => 'Réponse 3',
                        '4' => 'Réponse 4',
                    )
                )->setRequired(true);
                $this->addElements(
                        array(
                            $text1, $text2, $text3, $text4,
                            $radio
                        )
                );
                break;
            }

            $submit = new Zend_Form_Element_Submit('submit');
            $submit->setLabel('Enregistrer');
            $this->addElement($submit);

    }
		
}