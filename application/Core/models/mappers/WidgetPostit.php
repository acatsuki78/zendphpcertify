<?php


date('Y-m-d H:i:s');

/**
 * Mapper pour l'objet WidgetPostit du module ZF  'Core'
 *
 * @category   Application
 * @package    Application_Core
 * @subpackage Mapper
 * @desc       Mapper pour l'objet WidgetPostit du module ZF  'Core'
 * @author     Jean-Baptiste MONIN   <jb.monin@cleo-consulting.fr>
 * @copyright  2012 CLEO CONSULTING
 * @version    0.1
 * @since      2012-09-10
 */
class Core_Model_Mapper_WidgetPostit extends Core_Model_Mapper_Abstract
{
    const TABLE_NAME    = 'postit';
    const COL_ID        = 'id';
    const COL_USER_ID   = 'user_id';
    const COL_CONTENT   = 'content';
    const COL_TIMESTAMP = 'timestamp';


    private $_dbTable;
    protected $_dbTableClass = 'Core_Model_DbTable_WidgetPostit';
    protected $_entityClass  = 'Core_Model_WidgetPostit';

    public function fetchAllByUserId($userId)
    {
        $where = array(self::COL_USER_ID . ' = ? ' => $userId);
        $rowSet = $this->getDbTable()->fetchAll($where);
        if (!count($rowSet)) {
            return array();
        } 
        $postits = array();
        foreach( $rowSet as $row) {
            $postits[] = $this->rowToObject($row);
        }
        return $postits;
    }
    /**
     * Transforms an object into an row compatible array
     *
     * @param  Core_Model_WidgetPostit $obj
     * @return array           Representation of the object corresponding to table columns
     */
    public function objectToRow($obj)
    {
        $row[self::COL_ID] = $obj->getId();
        $row[self::COL_USER_ID] = $obj->getUser()->getId();
        $row[self::COL_CONTENT] = $obj->getContent();
        $row[self::COL_TIMESTAMP] = $obj->getTimestamp();
        return $row;
    }

    /**
     * Builds an object from DbTable row data
     *
     * @param  Zend_Db_Table_Row $row
     * @return Core_Model_WidgetPostit
     */
    public function rowToObject(Zend_Db_Table_Row_Abstract $row, $user=null)
    {
        if (null===$user) {
            $userRow = $row->findParentRow('Core_Model_DbTable_User');
            $userMapper = new Core_Model_Mapper_User();
            $user = $userMapper->rowToObject($userRow);
        }
        $obj = new $this->_entityClass();
        $obj->setId($row[self::COL_ID]);
        $obj->setUser($user);
        $obj->setContent($row[self::COL_CONTENT]);
        $obj->setTimestamp($row[self::COL_TIMESTAMP]);
        return $obj;
    }
    
    public function objectToArray($obj)
    {
    	$row[self::COL_ID] = $obj->getId();
    	$row[self::COL_USER_ID] = $obj->getUser()->getId();
    	$row[self::COL_CONTENT] = $obj->getContent();
    	$row[self::COL_TIMESTAMP] = $obj->getTimestamp();
    	return $row;
    }
}