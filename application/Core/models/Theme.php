<?php
/**
 * Model Theme
 */

/**
 * Model Theme
 *
 * @category MyApp
 * @package Core
 * @subpackage Model
 * @version 0.01
 * @since 2013-01-08
 * @author Eric
 */
class Core_Model_Theme
{
	/**
	 * @var integer
	 */
	private $_themeId;
	
	/**
	 * @var string
	 */
	private $_themeTitle;
	
	/**
	 * @var string
	 */
	private $_language;
	
	/**
	 * @return integer $_themeId
	 */
	public function getThemeId() {
		return $this->_themeId;
	}

	/**
	 * @param integer $_themeId
	 */
	public function setThemeId($_themeId) {
		$this->_themeId = $_themeId;
		
		return $this;
	}

	/**
	 * @return string $_title
	 */
	public function getThemeTitle() {
		return $this->_themeTitle;
	}

	/**
	 * @param string $_title
	 */
	public function setThemeTitle($_themeTitle) {
		$this->_themeTitle = $_themeTitle;
		
		return $this;
	}

	/**
	 * @return string $_language
	 */
	public function getLanguage() {
		return $this->_language;
	}

	/**
	 * @param string $_language
	 */
	public function setLanguage($_language) {
		$this->_language = $_language;
		
		return $this;
	}
}