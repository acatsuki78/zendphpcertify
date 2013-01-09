<?php
/**
 * Model User
 */

/**
 * Model User
 *
 * @category MyApp
 * @package Core
 * @subpackage Model
 * @version 0.01
 * @since 2013-01-08
 * @author Eric
 */
class Core_Model_User
{
	/**
	 * @var integer
	 */
	private $_userId;
	
	/**
	 * @var string
	 */
	private $_email;
	
	/**
	 * @var string
	 */
	private $_password;
	
	/**
	 * @var string
	 */
	private $_status;
	
	/**
	 * @var string
	 */
	private $_firstname;
	
	/**
	 * @var string
	 */
	private $_lastname;
	
	/**
	 * @var integer
	 */
	private $_active;
	
	/**
	 * @return integer $_userId
	 */
	public function getUserId() {
		return $this->_userId;
	}

	/**
	 * @param integer $_userId
	 */
	public function setUserId($_userId) {
		$this->_userId = $_userId;
	}

	/**
	 * @return string $_email
	 */
	public function getEmail() {
		return $this->_email;
	}

	/**
	 * @param string $_email
	 */
	public function setEmail($_email) {
		$this->_email = $_email;
	}

	/**
	 * @return string $_password
	 */
	public function getPassword() {
		return $this->_password;
	}

	/**
	 * @param string $_password
	 */
	public function setPassword($_password) {
		$this->_password = $_password;
	}

	/**
	 * @return string $_status
	 */
	public function getStatus() {
		return $this->_status;
	}

	/**
	 * @param string $_status
	 */
	public function setStatus($_status) {
		$this->_status = $_status;
	}

	/**
	 * @return string $_firstname
	 */
	public function getFirstname() {
		return $this->_firstname;
	}

	/**
	 * @param string $_firstname
	 */
	public function setFirstname($_firstname) {
		$this->_firstname = $_firstname;
	}

	/**
	 * @return string $_lastname
	 */
	public function getLastname() {
		return $this->_lastname;
	}

	/**
	 * @param string $_lastname
	 */
	public function setLastname($_lastname) {
		$this->_lastname = $_lastname;
	}

	/**
	 * @return integer $_active
	 */
	public function getActive() {
		return $this->_active;
	}

	/**
	 * @param integer $_active
	 */
	public function setActive($_active) {
		$this->_active = $_active;
	}
}