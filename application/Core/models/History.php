<?php
/**
 * Model History
 */

/**
 * Model History
 *
 * @category MyApp
 * @package Core
 * @subpackage Model
 * @version 0.01
 * @since 2013-01-08
 * @author Eric
 */
class Core_Model_History
{
	/**
	 * @var integer
	 */
	private $_historyId;
	
	/**
	 * @var string
	 */
	private $_tempId;
	
	/**
	 * @var Core_Model_Quiz
	 */
	private $_quiz;
	
	/**
	 * @var Core_Model_Question
	 */
	private $_question;
	
	/**
	 * @var Core_Model_User
	 */
	private $_user;
	
	/**
	 * @var integer
	 */
	private $_historyReponseId;
	
	/**
	 * @var integer
	 */
	private $_orderQuestion;
	
	/**
	 * @var string
	 */
	private $_status;
	
	/**
	 * @var timestamp
	 */
	private $_timeStart;
	
	/**
	 * @return integer $_historyId
	 */
	public function getHistoryId() {
		return $this->_historyId;
	}

	/**
	 * @param integer $_historyId
	 */
	public function setHistoryId($_historyId) {
		$this->_historyId = $_historyId;
	}

	/**
	 * @return string $_tempId
	 */
	public function getTempId() {
		return $this->_tempId;
	}

	/**
	 * @param string $_tempId
	 */
	public function setTempId($_tempId) {
		$this->_tempId = $_tempId;
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

	/**
	 * @return Core_Model_Question $_question
	 */
	public function getQuestion() {
		return $this->_question;
	}

	/**
	 * @param Core_Model_Question $_question
	 */
	public function setQuestion($_question) {
		$this->_question = $_question;
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
	 * @return integer $_historyReponseId
	 */
	public function getHistoryReponseId() {
		return $this->_historyReponseId;
	}

	/**
	 * @param integer $_historyReponseId
	 */
	public function setHistoryReponseId($_historyReponseId) {
		$this->_historyReponseId = $_historyReponseId;
	}

	/**
	 * @return integer $_orderQuestion
	 */
	public function getOrderQuestion() {
		return $this->_orderQuestion;
	}

	/**
	 * @param integer $_orderQuestion
	 */
	public function setOrderQuestion($_orderQuestion) {
		$this->_orderQuestion = $_orderQuestion;
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
	 * @return timestamp $_timeStart
	 */
	public function getTimeStart() {
		return $this->_timeStart;
	}

	/**
	 * @param timestamp $_timeStart
	 */
	public function setTimeStart($_timeStart) {
		$this->_timeStart = $_timeStart;
	}
}