<?php
require_once 'dbconfig.php';

$country = $_GET["query"];

$listEvents = array();

function selectByCountry(&$arr,$ctry) {
    global $connection;

    $sqlStatement = "SELECT E.NAME, C.NAME FROM EVENT E JOIN COUNTRY C ON E.COUNTRYID = C.COUNTRYID WHERE C.NAME = '".$ctry."'";

    $queryId = mysqli_query($connection, $sqlStatement);
    $count = mysqli_num_rows($queryId);
    
    if ($count > 0) {
        $cpt = 0;
        while ($rec = mysqli_fetch_row ($queryId)) {
           
            $arr[$cpt]["title"] = $rec[0];
            $arr[$cpt]["desc"] = "Event";
            $arr[$cpt]["language"] = $rec[1]; 
            
            $cpt++;
        }
    }
    
    mysqli_close($connection);
}


function returnArray($arr) {
    $cpt = count($arr);

    if ($cpt > 0){
        foreach($arr as $oneDim) {
            echo $oneDim["title"].",".$oneDim["desc"].",".$oneDim["language"]."|";
        }
    } else {
        echo "empty";
    }
}

selectByCountry($listEvents,$country);
returnArray($listEvents);