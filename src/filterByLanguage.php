<?php
require_once 'dbconfig.php';
require_once 'Provider.cls.php';

try {
    $language = $_GET["query"];
    $connection = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);

    $serializedServ = Provider::selectByLanguage($connection,$language);
    $listServiceCards = unserialize($serializedServ);
    
    Provider::returnArray($listServiceCards);
    
} catch (PDOException $err) {
    echo "Error! ".$err->getMessage()." <br>";
}