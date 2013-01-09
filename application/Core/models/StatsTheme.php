<?php
/**
 * Model StatsTheme
 */

/**
 * Model StatsTheme
 *
 * @category MyApp
 * @package Core
 * @subpackage Model
 * @version 0.01
 * @since 2013-01-08
 * @author Eric
 */
class Core_Model_StatsTheme
{
	/**
	 * @var integrer
	 */
	private $_statsThemeId;
	
	/**
	 * @var Core_Model_Stats
	 */
	private $_stats;
	
	/**
	 * @var Core_Model_Theme
	 */
	private $_theme;
	
	/**
	 * @var integer
	 */
	private $_goodAnswer;
	
	/**
	 * @return integer $_statsThemeId
	 */
	public function getStatsThemeId() {
		return $this->_statsThemeId;
	}

	/**
	 * @param integer $_statsThemeId
	 */
	public function setStatsThemeId($_statsThemeId) {
		$this->_statsThemeId = $_statsThemeId;
	}

	/**
	 * @return Core_Model_Stats $_stats
	 */
	public function getStats() {
		return $this->_stats;
	}

	/**
	 * @param Core_Model_Stats $_stats
	 */
	public function setStats($_stats) {
		$this->_stats = $_stats;
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

	/**
	 * @return integer $_goodAnswer
	 */
	public function getGoodAnswer() {
		return $this->_goodAnswer;
	}

	/**
	 * @param integer $_goodAnswer
	 */
	public function setGoodAnswer($_goodAnswer) {
		$this->_goodAnswer = $_goodAnswer;
	}
}