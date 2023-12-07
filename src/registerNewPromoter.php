<?php
require_once 'dbconfig.php';
require_once 'Promoter.cls.php';
session_start();

echo "<h2>Welcome to the database '$dbname', $user!</h2>";

$companyName=$_GET["culturalCompanyName"];

echo $companyName."</br>";

$sqlStmt = "INSERT INTO promoter (PromoterId, CompanyName) VALUES ('EP008', '$companyName')";

$queryNewUser = mysqli_query($connection,$sqlStmt);