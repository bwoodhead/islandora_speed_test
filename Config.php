<?php

class Config {
    
    private $url;
    private $port;
    private $cache_url;
    
    public function __construct($url, $port) {
        $this->url = $url;
        $this->port = $port;
        
        $cache_url = $this->createURL();
    }
    
    public function getURL() {
        return $this->cache_url;
    }
    
    private function createURL() {

        // Should check for http://
        $this->cache_url = $this->url . ":" . $this->port ."/fedora";
    }
}

?>
