<?php
require_once 'dbconfig.php';
require_once 'Finder.cls.php';
session_start();

$finderName=$_GET["fullName"];
$finderEmail=$_GET["email"];
$finderPhone=$_GET["phone"];
$finderPassword=$_GET["password"];

if ($finderName == "" || $finderEmail == "" || $finderPhone == "" || $finderPassword == ""){
    echo "<script>alert('Some important field is empty');</script>";
    echo "<script>location = '../registration.php';</script>";
}
else {
    $sqlStmt = "INSERT INTO finder (Name, Email, Phone, Password) VALUES ('$finderName','$finderEmail','$finderPhone','$finderPassword')";
    $queryNewUser = mysqli_query($connection,$sqlStmt);
}


if ($queryNewUser == true)
{
    $sqlStmt2 = "SELECT nbId FROM finder WHERE Email = '$finderEmail';";
    $queryId = mysqli_query($connection,$sqlStmt2);
    $count = mysqli_num_rows($queryId);
    //echo $count;

    try{

        $connection1 = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
        $oneFinder = new Finder();
        $oneFinder -> setEmail($finderEmail);
        $oneFinder -> setPassword($finderPassword);
        $oneFinder = unserialize($oneFinder->getFinderByEmail($connection1));
    
        if(!empty($oneFinder)){
            $_SESSION["NAME"] = $oneFinder->getName();        }
        else 
        {
            $_SESSION["EXIST"] = "NO";
            session_destroy();
        }
    }
    catch (PDOException $e) {
        echo $e->getMessage();
    }

        if ($count > 0)
        {
            $row = mysqli_fetch_array($queryId);
            $id = $row["nbId"];
            $nbdigits = strlen((string)$id);
            $nbzeros = 6 - $nbdigits;
            $finderID = "FI";
            $i = 0;
            while ($i<$nbzeros)
            {
                $finderID = $finderID."0";
                $i++;
            }
            $finderID = $finderID.(string)$id;
            //echo $finderID;

            $sqlStmt3 = "UPDATE finder SET FinderId = '$finderID' WHERE Email = '$finderEmail'";
            $queryUpdateFinderId = mysqli_query($connection,$sqlStmt3);
        }
        echo "<script>location = '../registration.php';</script>";
}