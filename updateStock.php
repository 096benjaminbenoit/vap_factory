<?php

$db = new PDO(
    'mysql:host=localhost:3306;dbname=Vap_Factory;charset=utf8',
    'admin',
    'adminpwd'
);

 $id= $_GET['id'];
//  je recupere l'id du produit depuis la page stock 
 $pdoStmt = $db->prepare("SELECT `quantite` FROM Cigarette_electronique WHERE `id`=$id");
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
$pdostmt = $db->prepare($sql);
$pdostmt->execute(); 

// je redirige l'utilisateur vers la page index
header('Location: stock.php');
exit();
?>