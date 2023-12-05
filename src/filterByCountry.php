<?php
require_once 'dbconfig.php';
require_once 'Event.cls.php';

try {
    $country = $_GET["query"];
    $connection = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);

    $serializedEvent = Event::selectByCountry($connection,$country);
    $listEventCards = unserialize($serializedEvent);
    
    Event::returnArray($listEventCards);
    
} catch (PDOException $err) {
    echo "Error! ".$err->getMessage()." <br>";
}