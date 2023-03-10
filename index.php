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

$reference = $_GET["reference"] ?? null;
$name = $_GET["name"] ?? null;
$resume = $_GET["resume"] ?? null;
$purchasePrice = $_GET["purchasePrice"] ?? null;
$sellingPrice = $_GET["sellingPrice"] ?? null;
$stock = $_GET["stock"] ?? null;
if(!empty($reference) && !empty($name) && !empty($resume) && !empty($purchasePrice) && !empty($sellingPrice) && !empty($stock)) {
    
    
    
    $sql = "INSERT INTO `Cigarette_electronique` (`reference`, `nom`, `description`, `prix_achat_unitaire` ,`prix_vente_unitaire`, `quantite`) VALUES ('$reference', '$name', '$resume', '$purchasePrice', '$sellingPrice', '$stock')";
    
    try {
        
        $pdostmt = $con->prepare($sql);
        $pdostmt->execute();  
    }
    catch (PDOException $e)
    {
        echo "Connection Failed" .$e->getMessage();
    }
    
}
$queryAll = $con->query("SELECT * FROM `Cigarette_electronique`");

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
    <div class="stock">
    <table>
            <thead>
                <tr class="stock_tr">
                    <th scope="col">REF</th>
                    <th scope="col">NOM</th>
                    <th scope="col">PA</th>
                    <th scope="col">PV</th>
                    <th scope="col">STOCK</th>
                    <th scope="col">STOCK +</th>
                    <th scope="col">STOCK -</th>
                    <th scope="col">EDITER</th>
                    <th scope="col">SUPPRIMER</th>
                </tr>
            </thead>
            <tbody>
                <?php while($data = $queryAll->fetch()) { ?>
                <tr>
                    <td data-label="REF"><?= $data['reference'] ?></td>
                    <td data-label="NOM"><?= $data['nom'] ?></td>
                    <td data-label="PA"><?= $data['prix_achat_unitaire'] ?>€</td>
                    <td data-label="PV"><?= $data['prix_vente_unitaire'] ?>€</td>
                    <td data-label="STOCK"><?= $data['quantite'] ?></td>
                    <td data-label="STOCK +"><a href="updateStock.php?id=<?= $data['Id']?>&action=increment"><button class="positive">+</button></a></td>
                    <td data-label="STOCK -"><a href="updateStock.php?id=<?= $data['Id']?>&action=decrement"><button class="negative">-</button></a></td>
                    <td data-label="EDITER"><a href="updateInfo.php?id=<?= $data['Id']?>">✏️</a></td>
                    <td data-label="SUPPRIMER"><a href="remove.php?id=<?= $data['Id']?>">🗑️</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>