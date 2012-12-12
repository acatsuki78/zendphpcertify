<?php
/**
 * Bootstrap du module Core
 *
 * Déclenche les initialisations de ressources
 * propres au module Core de l'application
 *
 */

/**
 * Bootstrap du module Core
 *
 * Déclenche les initialisations de ressources
 * propres au module Core de l'application
 *
 * @category MyApp
 * @package Core
 * @version 0.01
 * @since 2012-08-06
 * @author Moi <moi@monmail.com>
 */
class Core_Bootstrap extends Zend_Application_Module_Bootstrap
{

    protected function _initModulePlugins()
    {
        $fc = Zend_Controller_Front::getInstance();
        //$fc->registerPlugin(new Core_Plugin_Acl());
        //$fc->registerPlugin(new Core_Plugin_Auth());
    }
    
//     protected function _initModuleAcl()
//     {
//     	if(!$this->getApplication()->hasResource('multidb')){
//     		$this->getApplication()->bootstrap('multidb');
//     	}
    	
//     	$aclSvc = new Core_Service_Acl();
//     	$aclSvc->load();

//     }
}







