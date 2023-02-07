<?php

$db = new PDO(
    'mysql:host=localhost:3306;dbname=Vap_Factory;charset=utf8',
    'admin',
    'adminpwd'
);

 $id=1;
 $pdoStmt = $db->prepare("SELECT `quantite` FROM Cigarette_electronique WHERE `id`=$id");
$pdoStmt->execute();
$quantite = $pdoStmt->fetch();  
var_dump ($quantite['quantite']);
$newQuantite = ++$quantite['quantite'];
var_dump($newQuantite);

$sql = "UPDATE `Cigarette_electronique` SET `quantite` = $newQuantite WHERE `Cigarette_electronique`.`id` = $id";
$pdostmt = $db->prepare($sql);
$pdostmt->execute(); 

//  cette tranche est à modifier en fonction de la liste de Benja 

// je redirige l'utilisateur vers la page index
// header('Location: updateInfo.php');
// exit();
?>