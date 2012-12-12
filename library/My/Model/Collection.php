<?php 
/**
 * Classe abstraite collection
 *
 * Brique élémentaire de toute collection 
 * dans l'application
 *
 */

/**
 * Classe abstraite collection
 *
 * Brique élémentaire de toute collection 
 * dans l'application
 *
 * @category My
 * @package Model
 * @version 0.01
 * @since 2012-08-06
 * @author Moi <moi@monmail.com>
 */
abstract class My_Model_Collection implements Iterator
{
    private $position = 0;
    private $array = array();
    
	/* (non-PHPdoc)
     * @see Iterator::current()
     */public function current()
       {
         return $this->array[$this->position];
       }

	/* (non-PHPdoc)
     * @see Iterator::next()
     */public function next()
       {
        ++$this->position;
       }

	/* (non-PHPdoc)
     * @see Iterator::key()
     */public function key()
      {
        return $this->position;
      }

	/* (non-PHPdoc)
     * @see Iterator::valid()
     */public function valid()
      {
        return isset($this->array[$this->position]);
      }

	/* (non-PHPdoc)
     * @see Iterator::rewind()
     */public function rewind()
      {
         $this->position = 0;
      }
      
      public function add($obj)
      {
          $this->array[] = $obj;
      }

    
}