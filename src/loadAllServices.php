<?php

require_once 'dbconfig.php';


// $arrName = array(
//     array("k0" => "v0", "k1" => "v1", ...),
//     array("k0" => "v0", "k1" => "v1", ...),
//     array("k0" => "v0", "k1" => "v1", ...));

$listProviderServices = array();
$listEvents = array();

function selectAllProviderServices(&$arr) {
    global $connection;

    $sqlStatement = "SELECT P.COMPANYNAME, S.DESCRIPTION, L.NAME FROM PROVIDERSERVICE PS JOIN PROVIDER P ON P.PROVIDERID = PS.PROVIDERID JOIN SERVICE S ON S.SERVICEID = PS.SERVICEID JOIN LANGUAGE L ON L.LANGUAGEID = PS.LANGUAGEID";

    $queryId = mysqli_query($connection, $sqlStatement);
    $count = mysqli_num_rows($queryId);
    
    if ($count > 0) {
        $cpt = 0;
        while ($rec = mysqli_fetch_assoc($queryId)) {
            $arr[$cpt]["title"] = $rec["COMPANYNAME"];
            $arr[$cpt]["desc"] = $rec["DESCRIPTION"];
            $arr[$cpt]["language"] = $rec["NAME"]; 
            $cpt++;
        }
    }
    
    //mysqli_close($connection);
}

function selectAllEvents(&$arr) {
    global $connection;

    $sqlStatement = "SELECT E.NAME, C.NAME FROM EVENT E JOIN COUNTRY C ON E.COUNTRYID = C.COUNTRYID";

    $queryId = mysqli_query($connection, $sqlStatement);
    $count = mysqli_num_rows($queryId);
    
    //echo $count;
    if ($count > 0) {
        $cpt = 0;
        while ($rec = mysqli_fetch_row ($queryId)) {
            //echo $rec[0]."|".$rec[1]."|".$rec[2];
            
            $arr[$cpt]["title"] = $rec[0];
            $arr[$cpt]["desc"] = "Event";
            $arr[$cpt]["language"] = $rec[1]; 
            
            $cpt++;
        }
    }
    
    //mysqli_close($connection);
}


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

selectAllProviderServices($listProviderServices);
selectAllEvents($listEvents);
mysqli_close($connection);
//returnArray($listProviderServices);
returnArray($listEvents,$listProviderServices);
