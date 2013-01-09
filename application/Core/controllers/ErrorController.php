<?php

/**
 * Controller d'erreur
 *
 * Ce controller est appelé (action error) lorsqu'une
 * erreur est attrapée par le plugin error_handler
 *
 */

/**
 * Controller d'erreur
 *
 * Ce controller est appelé (action error) lorsqu'une
 * erreur est attrapée par le plugin error_handler
 *
 *
 * @category MyApp
 * @package Core
 * @subpackage Controller
 * @version 0.01
 * @since 2012-08-06
 * @author Moi <moi@monmail.com>
 */
class ErrorController extends Zend_Controller_Action
{
    public function errorAction()
    {
        $errorHandler = $this->_getParam('error_handler');

        switch ($errorHandler->type) {
            case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_ACTION :
            case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_CONTROLLER :
            case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_ROUTE :
                $this->getResponse()->setHttpResponseCode(404);
                // 1ère méthode d'affectation à la vue
                $this->view->assign('message', 'Page inexistante');
                break;
            case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_OTHER :
            default :
                $this->getResponse()->setHttpResponseCode(500);
                // 2nde méthode d'affectation à la vue
                $this->view->message = 'Erreur interne';
        }

        // 1ère méthode pour accéder aux ressources dans un controller
        $log = $this->getInvokeArg('bootstrap')
                    ->getResource('log');

        // 2nde méthode pour accéder aux ressources dans un controller
//		$log = Zend_Controller_Front::getInstance()
//								    ->getParam('bootstrap')
//								    ->getResource('log');

        $log->info($errorHandler->exception);

    }

    public function forbidenAction()
    {

    }
}
