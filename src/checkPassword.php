<?php

require_once 'dbconfig.php';
$username = $_GET['email'];
$password = $_GET['password'];

$sqlStmt = "SELECT password FROM finder WHERE email = '$username'";

$queryCheckPassword = mysqli_query($connection, $sqlStmt);
$count = mysqli_num_rows($queryCheckPassword);

if ($count == 0)
{
    echo "<script>alert('user not found')</script>";
    echo "<script>window.close();</script>";
}
else
{
    $row  = mysqli_fetch_array($queryCheckPassword);
    $correctPassword = $row[0];
    if ($correctPassword == $password)
    {
        echo "<script>alert('Login Successful')</script>";
        echo "<script>var loggedIn = true;</script>";
        //echo "<script>window.close();</script>";
    }
    else
    {
        echo "<script>alert('Wrong Password'); location = '/index.php';</script>";
    }
}
?>