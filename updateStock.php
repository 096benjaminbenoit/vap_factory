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

 $id= $_GET['id'];
//  je recupere l'id du produit depuis la page stock 
 $pdoStmt = $con->prepare("SELECT `quantite` FROM Cigarette_electronique WHERE `id`=$id");
$pdoStmt->execute();
$quantite = $pdoStmt->fetch();  
var_dump ($quantite['quantite']);
 
// si action vaut increment j'ajoute 1 si il vaut decrement j'ajoute 1 (je hais ce truc )

if ($_GET['action']=='increment'){
    $newQuantite = ++$quantite['quantite'];
}
else{
    $newQuantite = --$quantite['quantite'];
}

var_dump($newQuantite);

$sql = "UPDATE `Cigarette_electronique` SET `quantite` = $newQuantite WHERE `Cigarette_electronique`.`id` = $id";
$pdostmt = $con->prepare($sql);
$pdostmt->execute(); 

// je redirige l'utilisateur vers la page index
header('Location: index.php');
exit();
?>