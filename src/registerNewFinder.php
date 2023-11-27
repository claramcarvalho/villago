<?php
require_once 'dbconfig.php';

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
}
