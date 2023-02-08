<?php
// je me connecte a Mysql 

try
{
    $db = new PDO(
            'mysql:host=localhost:3306;dbname=Vap_Factory;charset=utf8',
            'admin',
            'adminpwd'
    );

}
// en cas d'erreur, on affiche un message et on arrete tout 
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
// si tout va bien , on peut continuer 


// mise a jour des cigarettes electronique 
if (isset ($_POST['reference']) && isset ($_POST['nom']) && isset ($_POST['description']) && isset ($_POST['prix_achat_unitaire']) && isset ($_POST['prix_vente_unitaire']) && isset ($_POST['quantite'])){
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
    
    $sql = "UPDATE `Cigarette_electronique` SET `reference` = " .$_POST['reference']. ", `nom` = '" .$_POST['nom']. "', `description` = '" .$_POST['description']. "', `prix_achat_unitaire` = " .$_POST['prix_achat_unitaire'] .", `prix_vente_unitaire` = " .$_POST['prix_vente_unitaire'] .", `quantite` = ".$_POST['quantite'] ." WHERE `Cigarette_electronique`.`Id` = 1;";
    
    // je met en commentaire les var-dump
    // var_dump($sql);
    $pdostmt = $db->prepare($sql);
    $pdostmt->execute();  
}
// je recupere les infos de la base de donnée 
$cigaretteStatement = $db->prepare('SELECT * FROM Cigarette_electronique');
$cigaretteStatement->execute();
$Cigarette_electronique = $cigaretteStatement->fetch();
echo '<pre>';
print_r($Cigarette_electronique);
echo '</pre>';
?>
<!DOCTYPE html>
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
    <form class="newProduct" method="POST">
        <div class="newProduct_bloc1">
            <input name="reference" class="newProduct_bloc1__ref" type="text" placeholder="Référence" value="<?php echo $Cigarette_electronique['reference']; ?>">
            <input name="nom" class="newProduct_bloc1__name" type="text" placeholder="Nom" value="<?php echo $Cigarette_electronique['nom']; ?>" >
        </div>
        <input name="description" class="newProduct_bloc2__resume" type="text" placeholder="Description" value="<?php echo $Cigarette_electronique['description']; ?>">
        <div class="newProduct_bloc3">
            <input name="prix_achat_unitaire" class="newProduct_bloc3__purchasePrice" type="text" placeholder="Prix d'achat" value="<?php echo $Cigarette_electronique['prix_achat_unitaire']; ?>">
            <input name="prix_vente_unitaire" class="newProduct_bloc3__sellingPrice" type="text" placeholder="Prix de vente" value="<?php echo $Cigarette_electronique['prix_vente_unitaire']; ?>">
        </div>
        <div class="newProduct_bloc4">
            <input name="quantite" class="newProduct_bloc4__stock" type="text" placeholder="Stock" value="<?php echo $Cigarette_electronique['quantite']; ?>">
            <button class="newProduct_bloc4__btnAdd" class="btnAjout">AJOUTER</button>
        </div>
    </form>
</body>
</html>