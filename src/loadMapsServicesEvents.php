<?php
require_once 'dbconfig.php';
require_once 'Provider.cls.php';
require_once 'Event.cls.php';
//header('Content-type: application/json'); //header for json

try 
{
    $connection = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
    
    //$provider = new Provider();
    //$provider = $provider->getAllProviders($connection);
    //$listOFProviders = unserialize($provider);
    $listOFProviders = unserialize(Provider::getAllProviders($connection));

    $listOfEvents = unserialize(Event::getAllEvents($connection));

    $counter = 0;

    foreach ($listOFProviders as $oneProvider)
    {
        $id = $oneProvider->getProviderId();
        $name = $oneProvider->getCompanyName();;
        $lat = $oneProvider->getLat();
        $lng = $oneProvider->getLng();
        $oneEntityToMaps = array("id" => $id, "name" => $name, "lat" => $lat, "lgn" => $lng);

        $arrToJson[$counter++] = $oneEntityToMaps;
    }
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

/* 


$sqlStmtEntities = "SELECT * FROM services_and_events";
/*
$sqlStmtEntities = "SELECT EventId ID, Name NAME, Latitude LAT, Longitude LNG
                        FROM event
                    UNION
                    SELECT ProviderId ID, CompanyName NAME, Latitude LAT, Longitude LNG
                        FROM provider";


$queryEntitiesForMaps = mysqli_query($connection, $sqlStmtEntities);

$countEntities = mysqli_num_rows($queryEntitiesForMaps);
    if ($countEntities > 0)
    {
        //echo "Entities found!";
        $cpt = 0;
        while ($oneEntity = mysqli_fetch_array($queryEntitiesForMaps))
        {
            $id = $oneEntity["ID"];
            $name = $oneEntity["NAME"];
            $lat = $oneEntity["LAT"];
            $lng = $oneEntity["LNG"];

            $arrEntity = array ("id" => $id, "name" => $name, "lat" => $lat, "lgn" => $lng);
            
            $arrToJson[$cpt] = $arrEntity;

            /*
            $arrToJson[$cpt]["id"] = $oneEntity["ID"];
            $arrToJson[$cpt]["name"] = $oneEntity["NAME"];
            $arrToJson[$cpt]["lat"] = $oneEntity["LAT"];
            $arrToJson[$cpt]["lng"] = $oneEntity["LNG"];
            
            $cpt++;
        }
        
        $entitiesJson = json_encode($arrToJson);
        echo $entitiesJson;
    }
    else
        echo "No entities were found!"; */