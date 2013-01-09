<?php
/**
 * Mapper pour les postits
 *
 */

/**
 * Mapper pour les postits
 *
 * @category MyApp
 * @package Core
 * @subpackage Model
 * @example <br />
 *          Instanciation : <br />
 *          <b>$roleMapper = new Core_Model_Mapper_Role();</b>
 * @version 0.01
 * @since 2012-08-06
 * @author Moi <moi@monmail.com>
 */
class Core_Model_Mapper_Postit extends Core_Model_Mapper_Abstract
{

    protected $_dbTableClass = 'Core_Model_DbTable_Postit';

    const COL_ID = 'pi_id';
    const COL_U_ID = 'u_id';
    const COL_LIBELLE = 'pi_libelle';
    const COL_DATE = 'pi_date';

    public function fetchAll($userId = null)
    {	
    	
    	if (null !== $userId) {
    		$where = 'u_id = ' . (int)$userId;
    	} else {
    		$where = '1';    		
    	}
    	
    	$rowSet = $this->getDbTable()->fetchAll($where);
    	    	
    	if (0 === $rowSet->count()) {
    		return false;
    	}
    	
    	$postitsCollection = new Core_Model_PostitCollection();
    	foreach ($rowSet as $row) {
    		$postitsCollection->add($this->rowToObject($row));
    	}
    
    	return $postitsCollection;
    }
    
    public function rowToObject(Zend_Db_Table_Row_Abstract $row)
    {

        $postit = new Core_Model_Postit();
        $postit->setId($row[self::COL_ID]);
        $postit->setLibelle($row[self::COL_LIBELLE]);
        $postit->setDate($row[self::COL_DATE]);
        $postit->setUserId($row[self::COL_U_ID]);
        

        return $postit;
    }

    public function objectToArray($postit)
    {
        $data[self::COL_ID] = $postit->getId();
        $data[self::COL_LIBELLE] = $postit->getLibelle();
        $data[self::COL_DATE] = $postit->getDate();
        $data[self::COL_U_ID] = $postit->getUserId();

        return $data;
    }
}
