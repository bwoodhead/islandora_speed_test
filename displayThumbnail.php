<?php

require_once 'Repository.php';
require_once 'Cache.php';
require_once 'Config.php';

// Create the repository
$repository = new Repository( new Config('http://fedoraAdmin:fedoraAdmin@127.0.0.1', '8080'), new Cache() );

$pid = $_GET['pid'];
//$object = $repository->readObject('islandora:887');
$object = $repository->readObject($pid);

header("Content-type: image/jpeg");
echo $object->getThumbnail();

?>
