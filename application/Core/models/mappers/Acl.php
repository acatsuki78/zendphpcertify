<?php

class Core_Model_Mapper_Acl extends Core_Model_Mapper_Abstract
{
    protected $_dbTableClass = 'Core_Model_DbTable_Acl';

    const COL_ID = 'id';
    const COL_RIGHTS = 'rights';

    public function fetchAll()
    {
    	$rowSet = $this->getDbTable()->fetchAll();
    
    	if (0 === $rowSet->count()) {
    		return false;
    	}
    	$rolesCollection = new Core_Model_RoleCollection();
    	foreach ($rowSet as $row) {
    		$rolesCollection->add($this->rowToObject($row));
    	}
    
    	return $rolesCollection;
    }
    
    public function rowToObject(Zend_Db_Table_Row_Abstract $row)
    {

        $acl = new Core_Model_Acl();
        $acl->setId($row[self::COL_ID]);
        $acl->setRights($row[self::COL_RIGHTS]);

        return $acl;
    }

    public function objectToArray($acl)
    {
        $data[self::COL_ID] = $acl->getId();
        $data[self::COL_RIGHTS] = $acl->getRights();

        return $data;
    }
}