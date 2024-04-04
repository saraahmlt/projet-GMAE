<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:ital,wght@0,300..800;1,300..800&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Single+Day&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/mesvoyages.css">
    <title>Mes voyages</title>
    <style>
     
    </style>
</head>
<body>
 
<?php include '../templates/corps.php'; ?>


<div class="big-container">
    <div class="menu-gauche">
        <div class="menu-gauche-text-active">
            <a class="active" href="dashboard.php"> Mes voyages</a>
        </div>
        <div class="trait"></div>
        <div class="menu-gauche-text">
            <a href="voyageform.php"> Publier un nouveau voyage</a>
        </div>
        <div class="trait"></div>
        <div class="menu-gauche-text">
        <a href="deconnexion.php">Déconnexion</a>
        </div>
        <div class="trait"></div>
    </div>
    <div>
      <div class="container-filtres">
        <div>
        <h1>Mes voyages</h1>
        </div>
        <div class="filtres">
          <div>
        <select name="categorie" id="categorie">
        <option value="Toutes Catégories">Toutes catégories</option>
        <option value="Mer">Mer</option>
        <option value="Campagne">Campagne</option>
        <option value="Montagne">Montagne</option>
        </select>
          </div>
          <div>
        <select name="region" id="region">
        <option value="Toutes régions">Toutes régions</option>
        <option value="Nouvelle Aquitaine">Nouvelle Aquitaine</option>
        <option value="Provence-Alpes-Côte d'Azur">Provence-Alpes-Côte d'Azur</option>
        <option value="Auvergne-Rhône-Alpes">Auvergne-Rhône-Alpes</option>
        </select>
        </div>
        <div>
        <select name="price" id="price">
        <option value="Toutes les prix">Tous les prix</option>
        <option value="Croissant">Croissant à décroissant</option>
        <option value="Decroissant">Décroissant à croissant</option>
        </select>
         </div>
         <div>
        <button  value="valider" id="button">Valider</button>
         </div>
        </div>
      </div>

        <div id="voyages"> 
        <?php
        require_once("../controlers/addVoyage.php");
        $req = $travels->dbc->connection->query("SELECT * FROM travels");

        while($aff=$req->fetch()) {
        ?>
        <div class="voyage">
            <img src="<?php echo $aff['image_url']; ?>" alt="Image voyage">
            <div class="voyage-info">
                <div class="container-donnees"><?php echo $aff['title']; ?></p></div>
                <div class="container-donnees"><?php echo $aff['date_debut']; ?>
                / <?php echo $aff['date_fin']; ?></div>
                <div class="container-donnees"><?php echo $aff['price']; ?> €</div>
            </div>
            <a href="../templates/editformulaire.php?id_voyage=<?php echo $aff['id_voyage']; ?>">
             <img src="../assets/images/crayon.jpeg" alt="crayon" id="crayon" data-id="<?php echo $aff['id_voyage']; ?>">
            </a>
            <a href="../controlers/delete_voyage.php?id_voyage=<?php echo $aff['id_voyage']; ?>">
             <img src="../assets/images/croix.jpeg" alt="croix" id="croix">
            </a>
        </div>
        <?php } ?>
        </div>
    </div>
</div>



<script src="../javascript/mesvoyages.js"></script>

</body>
</html>






