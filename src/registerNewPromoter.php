<?php
require_once 'dbconfig.php';
require_once 'Promoter.cls.php';
session_start();

echo "<h2>Welcome to the database '$dbname', $user!</h2>";

$companyName=$_GET["culturalCompanyName"];
$name = $_SESSION["NAME"];


$sqlStmt = "INSERT INTO promoter (CompanyName) VALUES ('$companyName')";

$queryNewUser = mysqli_query($connection,$sqlStmt);

if ($queryNewUser == true)
{
    $sqlStmt3 = "SELECT nbId FROM finder WHERE Name = '$name';";
    $queryId = mysqli_query($connection,$sqlStmt3);
    $count = mysqli_num_rows($queryId);

    if ($count > 0)
    {
        $row = mysqli_fetch_array($queryId);
        $id = $row["nbId"];
        $nbdigits = strlen((string)$id);
        $nbzeros = 4 - $nbdigits;
        $promoterID = "EP";
        $i = 0;
        while ($i<$nbzeros)
        {
            $promoterID = $promoterID."0";
            $i++;
        }
        $promoterID = $promoterID.(string)$id;
        //echo $finderID;
        $sqlStmt3 = "UPDATE promoter SET PromoterId = '$promoterID' WHERE CompanyName = '$companyName'";
        $sqlStmt4 = "UPDATE finder SET PromoterId = '$promoterID' WHERE Name = '$name'";
        $queryUpdateToProviderId = mysqli_query($connection,$sqlStmt3);
        $queryUpdateToFinderId = mysqli_query($connection,$sqlStmt4);
    }
    echo "<script>location = '../registration.php';</script>";
}