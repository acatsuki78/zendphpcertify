<?php 

define(
    'APPLICATION_ENV',
	getenv('APPLICATION_ENV') ?: 'production'
);

define(
	'ROOT_PATH',
    dirname(dirname(__DIR__))	
);

require_once 'Zend/Loader/Autoloader.php';
$autoloader = Zend_Loader_Autoloader::getInstance();

Zend_Session::$_unitTestEnabled = true;

$application = new Zend_Application(
	APPLICATION_ENV,
	ROOT_PATH . '/application/Core/configs/application.ini'
);

$application->bootstrap()
			->run();
