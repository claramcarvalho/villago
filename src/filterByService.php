<?php
require_once 'dbconfig.php';
require_once 'Provider.cls.php';

try {
    $service = $_GET["query"];
    $connection = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);

    $serializedServ = Provider::selectByService($connection,$service);
    $listServiceCards = unserialize($serializedServ);

    Provider::returnArray($listServiceCards);
    
} catch (PDOException $err) {
    echo "Error! ".$err->getMessage()." <br>";
}