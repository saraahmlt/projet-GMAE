
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/filtre_voyages.css">
    <title>filtres</title>
</head>
<body>
    

<?php

require_once("../controlers/addVoyage.php");

$categorie = isset($_GET['categorie']) ? $_GET['categorie'] : 'Toutes Catégories';
$region = isset($_GET['region']) ? $_GET['region'] : 'Toutes régions';
$price = isset($_GET['price']) ? $_GET['price'] : 'Toutes les prix';

$sql = "SELECT * FROM travels WHERE 1";

if ($categorie != 'Toutes Catégories') {
    $sql .= " AND categorie = '$categorie'";
}

if ($region != 'Toutes régions') {
    if ($region == 'Provence-Alpes-Côte d\'Azur') {
        $sql .= " AND region = 'Provence-Alpes-Côte d\'Azur'";
    } else {
        $sql .= " AND region = '$region'";
    }
}


if ($price != 'Tous les prix') {
    if ($price == 'Croissant') {
        $sql .= " ORDER BY price ASC"; 
    } elseif ($price == 'Decroissant') {
        $sql .= " ORDER BY price DESC"; 
    }
}

$req = $travels->dbc->connection->query($sql);

while($aff=$req->fetch()) {
?>
<div class="voyage">
    <img src="<?php echo $aff['image_url']; ?>" alt="Image voyage">
    <div class="voyage-info">
        <div class="container-donnees"><?php echo $aff['title']; ?></p></div>
        <div class="container-donnees"><?php echo $aff['date_debut']; ?>/<?php echo $aff['date_fin']; ?></div>
        <div><?php echo $aff['price']; ?> €</div>
    </div>
    <div>
            <img src="../assets/images/crayon.jpeg" alt="crayon" id="crayon" data-id="<?php echo $aff['id']; ?>">
            <img src="../assets/images/croix.jpeg" alt="croix" id="croix">
    </div>
</div>
            
        
<?php } ?>

</body>
</html>
