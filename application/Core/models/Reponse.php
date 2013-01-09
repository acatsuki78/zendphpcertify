<?php
/**
 * Model Reponse
 */

/**
 * Model Reponse
 *
 * @category MyApp
 * @package Core
 * @subpackage Model
 * @version 0.01
 * @since 2013-01-08
 * @author Eric
 */
class Core_Model_Reponse
{
	/**
	 * @var integer
	 */
	private $_reponseId;
	
	/**
	 * @var string
	 */
	private $_reponse;
	
	/**
	 * @var integer
	 */
	private $_reponseCorrect;
	
	/**
	 * @var Core_Model_Question
	 */
	private $_question;
	
	/**
	 * @return integer $_reponseId
	 */
	public function getReponseId() {
		return $this->_reponseId;
	}

	/**
	 * @param integer $_reponseId
	 */
	public function setReponseId($_reponseId) {
		$this->_reponseId = $_reponseId;
	}

	/**
	 * @return string $_reponse
	 */
	public function getReponse() {
		return $this->_reponse;
	}

	/**
	 * @param string $_reponse
	 */
	public function setReponse($_reponse) {
		$this->_reponse = $_reponse;
	}

	/**
	 * @return integer $_reponseCorrect
	 */
	public function getReponseCorrect() {
		return $this->_reponseCorrect;
	}

	/**
	 * @param integer $_reponseCorrect
	 */
	public function setReponseCorrect($_reponseCorrect) {
		$this->_reponseCorrect = $_reponseCorrect;
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
}