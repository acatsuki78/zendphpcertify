<?php 

$application = new Zend_Application(
                APPLICATION_ENV,
                ROOT_PATH . '/application/Core/configs/application.ini'
);

$application->bootstrap();

$fc = Zend_Controller_Front::getInstance();
if (null === $fc->getParam('bootstrap')) {
    $fc->setParam('bootstrap',$application->getBootstrap());
}

