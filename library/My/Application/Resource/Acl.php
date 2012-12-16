<?php
/**
 *  Resource d'application compatible Zend Framework pour le bootstrap de Zend_Acl
 *
 */

/**
 * Resource d'application compatible Zend Framework pour le bootstrap de Zend_Acl
 *
 * Permet d'utiliser Zend_Acl en tant que
 * resource d'application (depuis le bootstrap) et
 * dans application.ini
 *
 * @category     My
 * @package      Application
 * @subpackage   Resource
 * @version      0.01
 * @since        2012-09-03
 * @author       Moi <moi@monmail.com>
 */
class My_Application_Resource_Acl extends Zend_Application_Resource_ResourceAbstract
{
	public function init()
	{
		$acl = new Zend_Acl();
		Zend_Registry::set('Zend_Acl', $acl);
		return $acl;
	}
}