<?php

require_once 'dbconfig.php';
require_once 'Provider.cls.php';
require_once 'Event.cls.php';

try {
    $connection = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);

    // $arrName = array(
    //     array("k0" => "v0", "k1" => "v1", ...),
    //     array("k0" => "v0", "k1" => "v1", ...),
    //     array("k0" => "v0", "k1" => "v1", ...));
    
    $serializedServ = Provider::generateServiceCards($connection);
    $listServiceCards = unserialize($serializedServ);
    
    $serializedEvent = Event::generateEventCards($connection);
    $listEventCards = unserialize($serializedEvent);
    
    function returnArray($arr1,$arr2) {
        $arr = array_merge($arr1,$arr2);
        $cpt = count($arr);
    
        if ($cpt > 0){
            foreach($arr as $oneDim) {
                echo $oneDim["title"].",".$oneDim["desc"].",".$oneDim["language"]."|";
            }
        } else {
            echo "empty";
        }
    }
    
    returnArray($listServiceCards,$listEventCards);
    
} catch (PDOException $err) {
    echo "Error! ".$err->getMessage()." <br>";
}
