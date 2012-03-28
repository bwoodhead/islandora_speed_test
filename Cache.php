<?php

require_once 'ICache.php';

class Cache implements ICache {
    
    private $objects = array();
    
    /**
     * Store the object in the cache
     * @param type $object
     * @return type 
     */
    public function addObject($object) {
        
        if ( $object->getPid() == null ) {
            return;
        }
        
        $this->objects[$object->getPid()] = $object;
    }
    
    /**
     * Get the object from the cache
     * @param type $pid
     * @return null 
     */
    public function getObject($pid) {
        
        if ( array_key_exists($pid, $this->objects) ) {
            return $this->objects[$pid];
        }
        
        return null;
    }
}

?>
