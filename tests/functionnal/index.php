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
