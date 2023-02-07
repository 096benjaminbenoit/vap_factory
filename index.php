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
    <form class="newProduct" action="">
        <div class="newProduct_bloc1">
            <input class="newProduct_bloc1__ref" type="text" placeholder="Référence">
            <input class="newProduct_bloc1__name" type="text" placeholder="Nom">
        </div>
        <input class="newProduct_bloc2__resume" type="text" placeholder="Description">
        <div class="newProduct_bloc3">
            <input class="newProduct_bloc3__purchasePrice" type="text" placeholder="Prix d'achat">
            <input class="newProduct_bloc3__sellingPrice" type="text" placeholder="Prix de vente">
        </div>
        <div class="newProduct_bloc4">
            <input class="newProduct_bloc4__stock" type="text" placeholder="Stock">
            <button class="newProduct_bloc4__btnAdd" class="btnAjout">AJOUTER</button>
        </div>
    </form>
</body>
</html>