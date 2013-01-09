 <?php
/**
 * Formulaire d'identification utilisateur
 *
 * Défini le contenu et le comportement du
 * formulaire d'identification avec Zend_Form
 *
 */

/**
 * Formulaire d'identification utilisateur
 *
 * Défini le contenu et le comportement du
 * formulaire d'identification avec Zend_Form
 *
 * @category MyApp
 * @package Core
 * @subpackage Form
 * @version 0.01
 * @since 2012-08-06
 * @author Moi <moi@monmail.com>
 * @uses Zend_Form
 */
class Core_Form_Signin extends Zend_Form
{
    public function init()
    {
        $login = new Zend_Form_Element_Text('login');
        $login->setRequired(true)
              ->addFilter(
                   new Zend_Filter_StripTags()
              )
              ->addValidator(
                      new Zend_Validate_StringLength(
                          array('min' => 3, 'max' => 20)
                      )
              );
        $this->addElement($login);

        $password = new Zend_Form_Element_Password('password');
        $password->setRequired(true)
                 ->addValidator(
                      new Zend_Validate_StringLength(
                          array('min' => 3, 'max' => 15)
                      )
              );
       $this->addElement($password);

       $submit = new Zend_Form_Element_Submit('submit');
       $this->addElement($submit);

    }
}
