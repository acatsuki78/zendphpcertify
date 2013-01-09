<?php
/**
 * Model Question
 */

/**
 * Model Question
 *
 * @category MyApp
 * @package Core
 * @subpackage Model
 * @version 0.01
 * @since 2013-01-08
 * @author Eric
 */
class Core_Model_Question
{
	/**
	 * @var integer
	 */
	private $_questionId;
	
	/**
	 * @var string
	 */
	private $_questionTitle;
	
	/**
	 * @var integer
	 */
	private $_active;
	
	/**
	 * @var string
	 */
	private $_image;
	
	/**
	 * @var Core_Model_Level
	 */
	private $_level;
	
	/**
	 * @var Core_Model_Type
	 */
	private $_type;
	
	/**
	 * @var Core_Model_Theme
	 */
	private $_theme;
	
	/**
	 * @return integer $_questionId
	 */
	public function getQuestionId() {
		return $this->_questionId;
	}

	/**
	 * @param integer $_questionId
	 */
	public function setQuestionId($_questionId) {
		$this->_questionId = $_questionId;
	}

	/**
	 * @return string $_questionTitle
	 */
	public function getQuestionTitle() {
		return $this->_questionTitle;
	}

	/**
	 * @param string $_questionTitle
	 */
	public function setQuestionTitle($_questionTitle) {
		$this->_questionTitle = $_questionTitle;
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

	/**
	 * @return string $_image
	 */
	public function getImage() {
		return $this->_image;
	}

	/**
	 * @param string $_image
	 */
	public function setImage($_image) {
		$this->_image = $_image;
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
	}

	/**
	 * @return Core_Model_Type $_type
	 */
	public function getType() {
		return $this->_type;
	}

	/**
	 * @param Core_Model_Type $_type
	 */
	public function setType($_type) {
		$this->_type = $_type;
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
	}

	
	
}