<?php
/**
 * Model Level
 */

/**
 * Model Level
 *
 * @category MyApp
 * @package Core
 * @subpackage Model
 * @version 0.01
 * @since 2013-01-08
 * @author Eric
 */
class Core_Model_Level
{
	/**
	 * @var integer
	 */
	private $_levelId;
	
	/**
	 * @var string
	 */
	private $_level;
	
	/**
	 * @return integer $_levelId
	 */
	public function getLevelId() {
		return $this->_levelId;
	}

	/**
	 * @param integer $_levelId
	 */
	public function setLevelId($_levelId) {
		$this->_levelId = $_levelId;
		
		return $this;
	}

	/**
	 * @return string $_level
	 */
	public function getLevel() {
		return $this->_level;
	}

	/**
	 * @param string $_level
	 */
	public function setLevel($_level) {
		$this->_level = $_level;
		
		return $this;
	}
}