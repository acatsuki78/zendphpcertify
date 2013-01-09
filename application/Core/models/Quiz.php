<?php
/**
 * Model Quiz
 */

/**
 * Model Quiz
 *
 * @category MyApp
 * @package Core
 * @subpackage Model
 * @version 0.01
 * @since 2013-01-08
 * @author Eric
 */
class Core_Model_Quiz
{
	/**
	 * @var integer
	 */
	private $_quizId;
	
	/**
	 * @var string
	 */
	private $_quizTitle;
	
	/**
	 * @var string
	 */
	private $_descr;
	
	/**
	 * @var Core_Model_Level
	 */
	private $_level;
	
	/**
	 * @var integer
	 */
	private $_nbrQuestion;
	
	/**
	 * @var Core_Model_Theme
	 */
	private $_theme;
	
	/**
	 * @var integer
	 */
	private $_active;
	
	/**
	 * @var integer
	 */
	private $_duration;
	
	/**
	 * @return integer $_quizId
	 */
	public function getQuizId() {
		return $this->_quizId;
	}

	/**
	 * @param integer $_quizId
	 */
	public function setQuizId($_quizId) {
		$this->_quizId = $_quizId;
		
		return $this;
	}

	/**
	 * @return string $_title
	 */
	public function getQuizTitle() {
		return $this->_quizTitle;
	}

	/**
	 * @param string $_title
	 */
	public function setQuizTitle($_quizTitle) {
		$this->_quizTitle = $_quizTitle;
		
		return $this;
	}

	/**
	 * @return string $_descr
	 */
	public function getDescr() {
		return $this->_descr;
	}

	/**
	 * @param string $_descr
	 */
	public function setDescr($_descr) {
		$this->_descr = $_descr;
		
		return $this;
	}

	/**
	 * @return Core_Model_Level $_level
	 */
	public function getLevel() {
		return $this->_level;
	}

	/**
	 * @param Core_Model_Level $_level
	 */
	public function setLevel($_level) {
		$this->_level = $_level;
		
		return $this;
	}

	/**
	 * @return integer $_nbrQuestion
	 */
	public function getNbrQuestion() {
		return $this->_nbrQuestion;
	}

	/**
	 * @param integer $_nbrQuestion
	 */
	public function setNbrQuestion($_nbrQuestion) {
		$this->_nbrQuestion = $_nbrQuestion;
		
		return $this;
	}

	/**
	 * @return Core_Model_Theme $_theme
	 */
	public function getTheme() {
		return $this->_theme;
	}

	/**
	 * @param Core_Model_Theme $_theme
	 */
	public function setTheme($_theme) {
		$this->_theme = $_theme;
		
		return $this;
	}
	/**
	 * @return the $_active
	 */
	public function getActive() {
		return $this->_active;
	}

	/**
	 * @param number $_active
	 */
	public function setActive($_active) {
		$this->_active = $_active;
		
		return $this;
	}
	/**
	 * @return the $_duration
	 */
	public function getDuration() {
		return $this->_duration;
	}

	/**
	 * @param number $_duration
	 */
	public function setDuration($_duration) {
		$this->_duration = $_duration;
		
		return $this;
	}

	// feinte //
	public function getId()
	{
		return $this->getQuizId();
	}
}