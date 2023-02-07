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

$queryAll = $con->query("SELECT * FROM `Cigarette_electronique`");

?><!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>VAP FACTORY - Stock</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
      <header>
          <h1 class="text-center">STOCK</h1>
      </header>
      <main>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Référence</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prix d'achat</th>
                    <th scope="col">Prix de vente</th>
                    <th scope="col">Stock</th>
                </tr>
            </thead>
            <tbody>
                <?php while($data = $queryAll->fetch()) { ?>
                <tr>
                    <td><?= $data['reference'] ?></td>
                    <td><?= $data['nom'] ?></td>
                    <td><?= $data['prix_achat_unitaire'] ?>€</td>
                    <td><?= $data['prix_vente_unitaire'] ?>€</td>
                    <td><?= $data['quantite'] ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>         
                </tr>
                <?php } ?>
            </tbody>
        </table>
      </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>