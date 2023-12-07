<?php
require_once 'dbconfig.php';
require_once 'Provider.cls.php';
session_start();

$companyName=$_GET["companyName"];
$companyStreet=$_GET["street"];
$companyNumber=$_GET["locationNumber"];
$companyCity=$_GET["city"];
$companyPostalCode=$_GET["postalCode"];
$companyProvince=$_GET["province"];

$address = $companyNumber." ".$companyStreet.", ".$companyCity.", ".$companyProvince." ".$companyPostalCode;

echo $companyName."</br>";
echo $address."</br>";

$sqlStmt = "INSERT INTO provider (Address, CompanyName, Latitude, Longitude) VALUES ($address','$companyName',0,0)";

$queryNewUser = mysqli_query($connection,$sqlStmt);

if ($queryNewUser == true)
{
    echo "Good job, user added!";
    $sqlStmt3 = "SELECT nbId FROM finder WHERE Name = '$name';";
    $queryId = mysqli_query($connection,$sqlStmt3);
    $count = mysqli_num_rows($queryId);

    if ($count > 0)
    {
        $row = mysqli_fetch_array($queryId);
        $id = $row["nbId"];
        $nbdigits = strlen((string)$id);
        $nbzeros = 6 - $nbdigits;
        $providerID = "PR";
        $i = 0;
        while ($i<$nbzeros)
        {
            $providerID = $providerID."0";
            $i++;
        }
        $providerID = $providerID.(string)$id;
        //echo $finderID;
        $sqlStmt3 = "UPDATE provider SET ProviderId = '$providerID' WHERE Name = '$companyName'";
        $sqlStmt4 = "UPDATE finder SET ProviderId = '$providerID' WHERE Name = '$name'";
        $queryUpdateToProviderId = mysqli_query($connection,$sqlStmt3);
        $queryUpdateToFinderId = mysqli_query($connection,$sqlStmt4);
    }
    echo "<script>location = '../registration.php';</script>";
}