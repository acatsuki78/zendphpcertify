<?php
/**
 * Model QuizRel
 */

/**
 * Model QuizRel
 *
 * @category MyApp
 * @package Core
 * @subpackage Model
 * @version 0.01
 * @since 2013-01-08
 * @author Eric
 */
class Core_Model_QuizRel
{
	/**
	 * @var integer
	 */
	private $_quizRelId;
	
	/**
	 * @var Core_Model_Quiz
	 */
	private $_quiz;
	
	/**
	 * @var Core_Model_Theme
	 */
	private $_theme;
	
	/**
	 * @var integer
	 */
	private $_questionByTheme;
	
	/**
	 * @return integer $_quizRelId
	 */
	public function getQuizRelId() {
		return $this->_quizRelId;
	}

	/**
	 * @param integer $_quizRelId
	 */
	public function setQuizRelId($_quizRelId) {
		$this->_quizRelId = $_quizRelId;
		
		return $this;
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
	 * @return integer $_questionByTheme
	 */
	public function getQuestionByTheme() {
		return $this->_questionByTheme;
	}

	/**
	 * @param integer $_questionByTheme
	 */
	public function setQuestionByTheme($_questionByTheme) {
		$this->_questionByTheme = $_questionByTheme;
		
		return $this;
	}
	
	// feinte //
	public function getId()
	{
		return $this->getQuizRelId();
	}
}