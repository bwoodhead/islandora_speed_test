<?php

require_once 'Repository.php';
require_once 'Cache.php';
require_once 'Config.php';

//header("Content-type: text/plain");
header("Content-type: image/jpeg");

// Create the repository
$repository = new Repository( new Config('http://fedoraAdmin:fedoraAdmin@127.0.0.1', '8080'), new Cache() );

$object = $repository->readObject('islandora:887');
var_dump($object->getThumbnail());

?>
