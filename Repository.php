<?php

require_once 'Config.php';
require_once 'Cache.php';
require_once 'Object.php';

class Repository {
    
    private $cache;
    private $config;
    
    public function __construct(&$config, &$cache) {
        
        $this->config = &$config;
        $this->cache = &$cache;
    }
    
    public function createObject($pid = null) {

        $object = null;
        if ( $pid == null ) {
            $url = $this->config->getURL() . '/objects/nextPID';
            $results = $this->makeRequest($url);
            $object = new Object($this, 'asdf');
        } else {
        }
        return $object;
    }
    
    public function readObject($pid, $lazy=true) {
        
        // Get the object from the cache
        $object = $this->cache->getObject($pid);
        
        // Check to see if the object is cached
        if ( $object == null ) {

            // Create the object
            $object = new Object($this, $pid);
            
            // Need to populate the object
            //$url = $this->config->getURL() . '/objects/' . $pid;
            //$results = $this->makeRequest($url);
            
            // Add it to the cache
            $this->cache->addObject($object);
        }
        
        //return the object
        return $object;
    }
    
    public function updateObject($object) {
        
    }
    
    public function readDatastream($object, $dsid) {

        // Create the url to get the datastream
        $url = $this->config->getURL() . '/objects/' . $object->getPID() . '/datastreams/' . $dsid . '/content';
        
        // Make the request
        $results = $this->makeRequest($url);
        
        // Return the results
        return $results;
    }
    
    public function makeRequest($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url . '?format=xml');
        curl_setopt($ch, CURLOPT_HEADER, 0);

        // Execute the curl call
        $results = curl_exec($ch);
        
        // Check if any error occured
        if(curl_errno($ch))
        {
            //echo 'Curl error: ' . curl_error($ch);
            return null;
        } else {
        
            //var_dump($results);
        }

        // Close
        curl_close($ch);
        
        return $results;
    }
}

?>
