<?php
require_once 'dbconfig.php';
require_once 'Provider.cls.php';
require_once 'Event.cls.php';
//header('Content-type: application/json'); //header for json

try 
{
    $connection = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
    
    $listOfEvents = unserialize(Event::getAllEvents($connection));
    
    $counter = 0;

    foreach ($listOfEvents as $oneEvent)
    {
        $id = $oneEvent->getEventID();
        $name = $oneEvent->getEventName();;
        $lat = $oneEvent->getLat();
        $lng = $oneEvent->getLng();
        $oneEntityToMaps = array("id" => $id, "name" => $name, "lat" => $lat, "lgn" => $lng);

        $arrToJson[$counter++] = $oneEntityToMaps;
    }

    $entitiesJson = json_encode($arrToJson);
    echo $entitiesJson;
}
catch (PDOException $e)
{
    $err = $connection->errorInfo();
    echo "RDBMS Error: ".$err[0]."<br/>"; //RDBMS Error
    echo "Error Code: ".$err[1]."<br/>"; //Error code
    echo "Error Message: ".$err[2]."<br/>"; //Error Message
}