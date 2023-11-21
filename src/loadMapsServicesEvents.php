<?php

require_once 'dbconfig.php';
header('Content-type: application/json'); //header for json

$sqlStmtEntities = "SELECT * FROM services_and_events";

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
            */
            $cpt++;
        }
        
        $entitiesJson = json_encode($arrToJson);
        echo $entitiesJson;
    }
    else
        echo "No entities were found!";

//$EntitiesJSON = json_encode($queryEntitiesForMaps);

//echo "This is the file: $EntitiesJSON";