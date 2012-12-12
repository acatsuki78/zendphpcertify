<?php 

define(
    'APPLICATION_ENV',
	getenv('APPLICATION_ENV') ?: 'production'
);

if ( 'production' !== APPLICATION_ENV) {
	include_once './xhprof/external/header.php';
}

define(
	'ROOT_PATH',
    dirname(__DIR__)	
);

require_once 'Zend/Application.php';

$application = new Zend_Application(
	APPLICATION_ENV,
	ROOT_PATH . '/application/Core/configs/application.ini'
);
$application->bootstrap()
			->run();

