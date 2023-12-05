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
    //$listOfProviders = unserialize($provider);
    $listOfProviders = unserialize(Provider::getAllProviders($connection));

    $counter = 0;

    foreach ($listOfProviders as $oneProvider)
    {
        $listOfServices = unserialize($oneProvider->getServiceByProviderId($connection));
        //echo $listOfServices;

        $id = $oneProvider->getProviderId();
        $name = $oneProvider->getCompanyName();;
        $lat = $oneProvider->getLat();
        $lng = $oneProvider->getLng();
        $oneEntityToMaps = array("id" => $id, "name" => $name, "lat" => $lat, "lgn" => $lng, "services" => $listOfServices);

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