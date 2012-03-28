<?php

interface ICache {
    
    public function addObject($object);
    public function getObject($pid);
}

?>
