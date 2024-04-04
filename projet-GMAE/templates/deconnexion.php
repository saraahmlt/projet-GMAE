<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/deconnexion.css">
    <title>Document</title>
</head>
<body>
    


<?php include '../templates/corps.php'; ?>


<div class="big-container">
    <div class="menu-gauche">
        <div class="menu-gauche-text">
            <a href="dashboard.php"> Mes voyages</a>
        </div>
        <div class="trait"></div>
        <div class="menu-gauche-text">
            <a href="voyageform.php"> Publier un nouveau voyage</a>
        </div>
        <div class="trait"></div>
        <div class="menu-gauche-text-active">
            <a class="active" href="deconnexion.php">Déconnexion</a>
        </div>
        <div class="trait"></div>
    </div>

    <div>
      <div>
        <h1>Déconnexion</h1>
      </div>
      <div>
       <a id="deconnexion" href="../controlers/logout.php">Déconnexion</a>
      </div>
    </div>
</div>



</body>
</html>