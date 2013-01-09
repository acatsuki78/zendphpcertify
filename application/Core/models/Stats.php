<?php
/**
 * Model Stats
 */

/**
 * Model Stats
 *
 * @category MyApp
 * @package Core
 * @subpackage Model
 * @version 0.01
 * @since 2013-01-08
 * @author Eric
 */
class Core_Model_Stats
{
	/**
	 * @var integer
	 */
	private $_statsId;
	
	/**
	 * @var date
	 */
	private $_date;
	
	/**
	 * @var integer
	 */
	private $_result;
	
	/**
	 * @var integer
	 */
	private $_elapsedTime;
	
	/**
	 * @var Core_Model_User
	 */
	private $_user;
	
	/**
	 * @var Core_Model_Quiz
	 */
	private $_quiz;
	
	/**
	 * @return integer $_statsId
	 */
	public function getStatsId() {
		return $this->_statsId;
	}

	/**
	 * @param integer $_statsId
	 */
	public function setStatsId($_statsId) {
		$this->_statsId = $_statsId;
	}

	/**
	 * @return date $_date
	 */
	public function getDate() {
		return $this->_date;
	}

	/**
	 * @param date $_date
	 */
	public function setDate($_date) {
		$this->_date = $_date;
	}

	/**
	 * @return integer $_result
	 */
	public function getResult() {
		return $this->_result;
	}

	/**
	 * @param integer $_result
	 */
	public function setResult($_result) {
		$this->_result = $_result;
	}

	/**
	 * @return integer $_elapsedTime
	 */
	public function getElapsedTime() {
		return $this->_elapsedTime;
	}

	/**
	 * @param integer $_elapsedTime
	 */
	public function setElapsedTime($_elapsedTime) {
		$this->_elapsedTime = $_elapsedTime;
	}

	/**
	 * @return Core_Model_User $_user
	 */
	public function getUser() {
		return $this->_user;
	}

	/**
	 * @param Core_Model_User $_user
	 */
	public function setUser($_user) {
		$this->_user = $_user;
	}

	/**
	 * @return Core_Model_Quiz $_quiz
	 */
	public function getQuiz() {
		return $this->_quiz;
	}

	/**
	 * @param Core_Model_Quiz $_quiz
	 */
	public function setQuiz($_quiz) {
		$this->_quiz = $_quiz;
	}

}