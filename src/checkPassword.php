<?php
session_start();

require_once 'dbconfig.php';
require_once 'Finder.cls.php';

$username = $_GET['email'];
$password = $_GET['password'];

try{

    $connection1 = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
    $oneFinder = new Finder();
    $oneFinder -> setEmail($username);
    $oneFinder -> setPassword($password);
    $oneFinder = unserialize($oneFinder->getFinderByEmail($connection1));

    if(!empty($oneFinder)){
        $_SESSION["EXIST"] = "YES";
        $_SESSION["FINDERID"] = $oneFinder->getFinderId();
        $_SESSION["NAME"] = $oneFinder->getName();
        $_SESSION["PHONE"] = $oneFinder->getPhone();
        $_SESSION["EMAIL"] = $oneFinder->getEmail();
        $_SESSION["PASSWORD"] = $oneFinder->getPassword();
        $_SESSION["PROVIDERID"] = $oneFinder->getProviderId();
        $_SESSION["PROMOTER"] = $oneFinder->getPromoterId();    
    }
    else 
    {
        $_SESSION["EXIST"] = "NO";
    }
}
catch (PDOException $e) {
    echo $e->getMessage();
}


 $sqlStmt = "SELECT password FROM finder WHERE email = '$username'";

 $queryCheckPassword = mysqli_query($connection, $sqlStmt);
 $count = mysqli_num_rows($queryCheckPassword);
if ($count == 0)
{
    echo "<div style='display:flex;justify-content:center;align-items:center;width:100%;height:100%';>";
    echo "<div style='display:flex;flex-direction:column;text-align:center;color:red;height:auto;'>";
    echo "<h3>User not found</h3>";
    echo "</div>";
    echo "</div>";
    echo "<script>location = '../loginSignUp.php';</script>";
}
else
{
    $row  = mysqli_fetch_array($queryCheckPassword);
    $correctPassword = $row[0];
    if ($correctPassword == $password)
    {
        echo "<div style='display:flex;justify-content:center;align-items:center;width:100%;height:100%';>";
        echo "<div style='display:flex;flex-direction:column;text-align:center;color:red;height:auto;'>";
        echo "<h3>Welcome to Villago</h3>";
        echo "<h3>".$_SESSION["NAME"]."</h3>";
        echo "</div>";
        echo "</div>";
        echo "<script>window.opener.location.href = window.opener.location.href;setTimeout('window.close()',1000);</script>";
    }
    else
    {
        echo "<div style='display:flex;justify-content:center;align-items:center;width:100%;height:100%';>";
        echo "<div style='display:flex;flex-direction:column;text-align:center;color:red;height:auto;'>";
        echo "<h3>Wrong Password</h3>";
        echo "<a href='../loginSignUp.php' style='color:red'><h3>Back to login</h3></a>";
        echo "</div>";
        echo "</div>";
        session_destroy();
    }
}

?>