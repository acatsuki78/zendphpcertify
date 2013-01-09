<?php

/**
 * Controller d'identification
 *
 * Ce controller gère les actions en rapport avec
 * l'identification des utilisateurs 
 * <ul>
 * <li>Connexion</li>
 * <li>Déconnexion</li>
 * </ul>
 *
 */

/**
 * Controller d'identification
 *
 * Ce controller gère les actions en rapport avec
 * l'identification des utilisateurs 
 * <ul>
 * <li>Connexion</li>
 * <li>Déconnexion</li>
 * </ul>
 *
 * @category MyApp
 * @package Core
 * @subpackage Controller
 * @version 0.01
 * @since 2012-08-06
 * @author Moi <moi@monmail.com>
 */
class AuthController extends Zend_Controller_Action
{

    /**
     * Connexion
     * @uses Core_Form_Signin Formulaire de connexion
     * @uses Core_Service_UserApi 
     */
    public function signinAction()
    {
        $this->_helper->layout()->setLayout('signin');
        $form = new Core_Form_Signin();
        $form->setAction('')->setMethod('post');
        // Si la requete est en POST, on traite le formulaire
        if ($this->getRequest()->isPost()) {
            // Deux cas : formulaire valide ou pas
            if ($form->isValid($this->getRequest()->getPost())) {
                // Si valide, on traite l'identification
                $login = $form->getValue('login');
                $password = $form->getValue('password');
                $userApi = new Core_Service_User();
                if ($userApi->authenticate($login, $password)) {
                    $this->_redirect('/');
                }
            }
        }
        $this->view->form = $form;
    }

    /**
     * Déconnexion
     * @uses Core_Service_UserApi
     */
    public function signoutAction()
    {
        // Destruction de l'identité
        $userApi = new Core_Service_User();
        $userApi->clearIdentity();
        $this->_redirect('/signin');
    }
}