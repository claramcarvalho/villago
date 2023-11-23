<?php
require_once 'dbconfig.php';

$language = $_GET["query"];

$listProviderServices = array();

function selectByLanguage(&$arr,$lang) {
    global $connection;

    $sqlStatement = "SELECT P.COMPANYNAME, S.DESCRIPTION, L.NAME FROM PROVIDERSERVICE PS JOIN PROVIDER P ON P.PROVIDERID = PS.PROVIDERID JOIN SERVICE S ON S.SERVICEID = PS.SERVICEID JOIN LANGUAGE L ON L.LANGUAGEID = PS.LANGUAGEID WHERE L.NAME = '".$lang."'";

    $queryId = mysqli_query($connection, $sqlStatement);
    $count = mysqli_num_rows($queryId);
    
    if ($count > 0) {
        $cpt = 0;
        while ($rec = mysqli_fetch_assoc($queryId)) {
            $arr[$cpt]["company"] = $rec["COMPANYNAME"];
            $arr[$cpt]["service"] = $rec["DESCRIPTION"];
            $arr[$cpt]["language"] = $rec["NAME"]; 
            $cpt++;
        }
    }
    
    mysqli_close($connection);
}


function returnArray($arr) {
    $cpt = count($arr);

    if ($cpt > 0){
        foreach($arr as $oneDim) {
            echo $oneDim["company"].",".$oneDim["service"].",".$oneDim["language"]."|";
        }
    } else {
        echo "empty";
    }

}

selectByLanguage($listProviderServices,$language);
returnArray($listProviderServices);