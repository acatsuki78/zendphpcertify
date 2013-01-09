<?php
/**
 * Model Type
 */

/**
 * Model Type
 *
 * @category MyApp
 * @package Core
 * @subpackage Model
 * @version 0.01
 * @since 2013-01-08
 * @author Eric
 */
class Core_Model_Type
{
	/**
	 * @var integer
	 */
	private $_typeId;
	
	/**
	 * @var string
	 */
	private $_typeTitle;
	
	/**
	 * @return integer $_typeId
	 */
	public function getTypeId() {
		return $this->_typeId;
	}

	/**
	 * @param integer $_typeId
	 */
	public function setTypeId($_typeId) {
		$this->_typeId = $_typeId;
	}

	/**
	 * @return string $_typeTitle
	 */
	public function getTypeTitle() {
		return $this->_typeTitle;
	}

	/**
	 * @param string $_typeTitle
	 */
	public function setTypeTitle($_typeTitle) {
		$this->_typeTitle = $_typeTitle;
	}

}