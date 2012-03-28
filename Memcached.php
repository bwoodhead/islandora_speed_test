<?php

require_once 'ICache.php';

class MemCachedCache implements ICache {
    
    private $cache;
            
    public function __constructor($server, $port) {
        
        $this->cache = new Memcached();
        $this->cache->addServer($server, $port);   
    }


    /**
     * Store the object in the cache
     * @param type $object
     * @return type 
     */
    public function addObject($object) {
        
        if ( $object->getPid() == null ) {
            return;
        }
        if ( ! $this->cache->get($object->getPid()) ) {
            $this->cache->set($object->getPid(), $object);
        }
    }
    
    /**
     * Get the object from the cache
     * @param type $pid
     * @return null 
     */
    public function getObject($pid) {

        if ( ! $this->cache->get($object->getPid()) ) {
            return $this->cache->get($object->getPid());
        }
        
        return null;
    }
}

?>
