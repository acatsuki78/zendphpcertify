<?php
/**
 * ZFDebug Toolbar / Resource d'application Zend Framework
 *
 * Permet d'utiliser ZFDebug Toolbar en tant que
 * resource d'application (depuis le bootstrap) et
 * dans application.ini
 *
 */

/**
 * ZFDebug Toolbar / Resource d'application Zend Framework
 *
 * Permet d'utiliser ZFDebug Toolbar en tant que
 * resource d'application (depuis le bootstrap) et
 * dans application.ini
 *
 * @category My
 * @package Application
 * @subpackage Resource
 * @version 0.01
 * @since 2012-08-06
 * @author Moi <moi@monmail.com>
 */
class My_Application_Resource_Zfdebug extends Zend_Application_Resource_ResourceAbstract
{
	public function init()
	{
		$resourceOptions = $this->getOptions();
		// si desactiver dans la config on sort
		if (!$resourceOptions['enabled'])
			return;
		
		// On charge l'autoloader
		$autoloader = Zend_Loader_Autoloader::getInstance();
		// on recupere le plugin
		$autoloader->registerNamespace('ZFDebug');
		
		$options = array(
			'plugins' => array(
			'Variables',		// liste les variables
			'File' => array('base_path' => ROOT_PATH),			// Liste les fichiers utilisé
			'Html',				// Nombres de fichier stylesheets et javascripts. Liens vers les validateurs W3C.
			'Memory', 			// Memoire utilisé
			'Time',				// Timing information of current request, time spent in action controller and custom timers. Affiche le temps min et maxi par requete. 
			'Registry',			// Contenu de Zend_Registry 
			'Database',			// Profilage de la base de donnée (non compatible avec firebug)
			'Session',			// affiche le contenu de la session
			//'Cache',			// Etat, taille et contenu du cache
			'Exception',		// gere les exceptions
			)
		);
		
		// on verifie que la ressource est bien démarré
		if ($this->getBootstrap()->hasPluginResource('db')) {
			$this->getBootstrap()->bootstrap('db');
			$dbAdapter 	= $this->getBootstrap()->getPluginResource('db')->getAdapter();
			$options['plugins']['Database']['adapter'] = $dbAdapter;
		}
		
		// on verifie que la ressource est bien démarré
		if ($this->getBootstrap()->hasPluginResource('cachemanager')) {
			//$this->getBootstrap()->bootstrap('cachemanager');
			//$cache 	= $this->getBootstrap()->getPluginResource('cachemanager')->getOption();
			//$options['plugins']['Cache']['backend'] = $cache['global']['backend'];
		}
		
		// On bootstrap le front controller
		$this->getBootstrap()->bootstrap('frontcontroller');
		$fc = $this->getBootstrap()->getResource('frontcontroller');
		$fc->registerPlugin(new ZFDebug_Controller_Plugin_Debug($options));

	}
	
	
	
	
}