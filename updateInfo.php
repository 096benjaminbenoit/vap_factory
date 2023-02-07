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

$cigaretteStatement = $db->prepare('SELECT * FROM Cigarette_electronique');
$cigaretteStatement->execute();
$Cigarette_electronique = $cigaretteStatement->fetchAll();

foreach ($Cigarette_electronique as $cigarettes) {
var_dump($cigarettes);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UpdateInfo</title>
</head>
<body>
    
</body>
</html>