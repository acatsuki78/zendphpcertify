<?php 
abstract class Core_Model_Mapper_Abstract
{
	
	protected $_dbTableClass = null; 

	private $_dbTable;
	
	public function find($id)
	{
	   
		$rowSet = $this->getDbTable()->find($id);
		
		if (1 !== $rowSet->count()) {
			return false;
		}

		return $this->rowToObject($rowSet->current());
	}
	
	public function fetchAll()
	{
		$rowSet = $this->getDbTable()->fetchAll();
		if (0 === $rowSet->count()) {
			return false;
		}
		$entities = array();
		foreach($rowSet as $row) {
			$entities[] = $this->rowToObject($row);
		}
		return $entities;
	}

	public function setDbTable(Zend_Db_Table_Abstract $dbTable) {
		$this->_dbTable = $dbTable;
	}
	
	public function getDbTable() {
		if (null === $this->_dbTable) {
			if(null === $this->_dbTableClass) {
				throw new Zend_Db_Table_Exception(
					'$_dbTableClass property has to be defined in concrete mapper'
				);
			}
			$this->_dbTable = new $this->_dbTableClass();
		}
		return $this->_dbTable;
	}
	
	/**
	 * Deletes an entity
	 * @param Core_Model_Interface|integer $entity
	 * @throws Exception on invalid param given 
	 * @throws Zend_Db_Table_Row_Exception on unexisting row to delete
	 * @return boolean
	 */
	public function delete($entity)
	{
		if(is_int($entity)) {
			$id = $entity;
		} else if ($entity instanceof Core_Model_Interface) { 
			$id = $entity->getId();
		} else {
			throw new Exception('First param should be an integer or an instance of ' . 
							    ' Core_Model_Interface, ' . gettype($entity) . ' given');
		}
		
		$row = $this->getDbTable()
					->find($id)
					->current();
					
		if(!$row instanceof Zend_Db_Table_Row_Abstract)	{
			throw new Zend_Db_Table_Row_Exception(
			    'Unable to delete row with id #' . $id
			);
		}	
		return (bool) $row->delete();
	}

	public function save($entity) 
	{
		
		$data = $this->objectToArray($entity);
		
		// CAS DE L'INSERT
		if (0 === (int) $data[static::COL_ID]) {
			unset($data[static::COL_ID]);
			$this->getDbTable()->insert($data);
			return $this->getDbTable()->getAdapter()->lastInsertId();
		} else {
		// CAS DE L'UPDATE
			$where = array(static::COL_ID . ' = ?' => $entity->getId());
			return $this->getDbTable()->update($data, $where);
		}
	}
	
	abstract public function rowToObject(Zend_Db_Table_Row_Abstract $row);
	
	abstract public function objectToArray($entity);
}