<?php

$servername = "localhost";
$database = "vap_factory";
$username = "root";
$password = "root";

try
{
    $con = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e)
{
        echo "Connection Failed" .$e->getMessage();
}

$id = $_GET['id'];

    $sql = "DELETE FROM `Cigarette_electronique` WHERE  `Cigarette_electronique`.`id` = $id";

    $pdostmt = $con->prepare($sql);
    $pdostmt->execute(); 

     header('Location: index.php');
?>