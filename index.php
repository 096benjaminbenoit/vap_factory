<?php

$servername = "localhost";
$database = "Vap_Factory";
$username = "admin";
$password = "adminpwd";

try
{
    $con = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e)
{
        echo "Connection Failed" .$e->getMessage();
}

$reference = $_GET["reference"] ?? null;
$name = $_GET["name"] ?? null;
$resume = $_GET["resume"] ?? null;
$purchasePrice = $_GET["purchasePrice"] ?? null;
$sellingPrice = $_GET["sellingPrice"] ?? null;
$stock = $_GET["stock"] ?? null;

$sql = "INSERT INTO `Cigarette_electronique` (`reference`, `nom`, `description`, `prix_achat_unitaire` ,`prix_vente_unitaire`, `quantite`) VALUES ('$reference', '$name', '$resume', '$purchasePrice', '$sellingPrice', '$stock')";
var_dump($sql);
try {

    $pdostmt = $con->prepare($sql);
    $pdostmt->execute();  
}
catch (PDOException $e)
{
        echo "Connection Failed" .$e->getMessage();
}


// je recupere les infos de la base de donnée 
$cigaretteStatement = $db->prepare('SELECT * FROM Cigarette_electronique');
$cigaretteStatement->execute();
$Cigarette_electronique = $cigaretteStatement->fetch();

?><!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>VAP FACTORY</title>
</head>
<body>
    <header class="header">
        <h1 class="header__title">VAP FACTORY</h1>
    </header>
    <form class="newProduct" action="index.php" method="GET">
        <div class="newProduct_bloc1">
            <input class="newProduct_bloc1__ref" type="text" placeholder="Référence" id="reference" name="reference">
            <input class="newProduct_bloc1__name" type="text" placeholder="Nom" id="name" name="name">
        </div>
        <input class="newProduct_bloc2__resume" type="text" placeholder="Description" id="resume" name="resume">
        <div class="newProduct_bloc3">
            <input class="newProduct_bloc3__purchasePrice" type="text" placeholder="Prix d'achat" id="purchasePrice" name="purchasePrice">
            <input class="newProduct_bloc3__sellingPrice" type="text" placeholder="Prix de vente" id="sellingPrice" name="sellingPrice">
        </div>
        <div class="newProduct_bloc4">
            <input class="newProduct_bloc4__stock" type="text" placeholder="Stock" id="stock" name="stock">
            <button type="submit" class="newProduct_bloc4__btnAdd" class="btnAjout">AJOUTER</button>
        </div>
    </form>
</body>
</html>