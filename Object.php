<?php


class Object {

    private $repository;
    private $pid;
    private $dsid = array();
    
    public function __construct(&$repository, $pid = null) {
        
        // Keep a link to the repository
        $this->repository = &$repository;
        $this->pid = $pid;
    }
    
    public function getPID() {
        
        return $this->pid;
    }
    
    public function getLabel() {
        
    }

    /**
     * Get thumbnail helper function
     * @return type 
     */
    public function getThumbnail() {
        
        return $this->getDatastream('TN');
    }
    
    /**
     * Get the datastream
     * @param type $dsid
     * @return type 
     */
    public function getDatastream($dsid) {
        
        // Do we already have the datastream
        if ( array_key_exists($dsid, $this->dsid) ) {
            
            echo("cached");
            // Return the cached one
            return $this->dsid[$dsid];
        }
        
        // Has this actually been added to the repository
        if ($this->pid != null ) {
            
            // Pull the data from fedora and add it to the cache
            $this->dsid[$dsid] =  $this->repository->readDatastream($this, 'TN');
            
            // return the cached data
            return $this->dsid[$dsid];
        }        
    }
    
}

?>
