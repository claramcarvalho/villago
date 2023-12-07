<?php
require_once 'dbconfig.php';
require_once 'Finder.cls.php';
session_start();

echo "<h2>Welcome to the database '$dbname', $user!</h2>";

$finderName=$_GET["fullName"];
$finderEmail=$_GET["email"];
$finderPhone=$_GET["phone"];
$finderPassword=$_GET["password"];

$sqlStmt = "INSERT INTO finder (Name, Email, Phone, Password) VALUES ('$finderName','$finderEmail','$finderPhone','$finderPassword')";

$queryNewUser = mysqli_query($connection,$sqlStmt);

if ($queryNewUser == true)
{
    echo "Good job, user added!";
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
            if ($queryUpdateFinderId == true)
            {
                //echo "Good job, user id was updated!!";
            }
        }
    echo "<script>location = '../registration.php';</script>";
}