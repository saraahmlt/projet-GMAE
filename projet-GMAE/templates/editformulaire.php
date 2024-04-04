<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/publivoyages.css">
    <title>Modifier Voyage</title>
</head>
<body>
<?php 

if(isset($_GET['id_voyage'])) {
    $id_voyage = $_GET['id_voyage'];
}

?>
<div>
    <form method="POST" action="../controlers/EditVoyage.php?id_voyage=<?php echo $id_voyage; ?>" enctype="multipart/form-data">
        <div id="line-one">
            <input type="text" id="voyage" name="title"  placeholder="Nom du voyage" value="<?php echo $travelDetail['title']; ?>">
            <select name="categorie" id="categorie">
                <option value="Toutes catégories">Catégories</option>
                <option value="Campagne" <?php if($categorie == "Campagne") echo "selected"; ?>>Campagne</option>
                <option value="Mer" <?php if($categorie == "Mer") echo "selected"; ?>>Mer</option>
                <option value="Montagne" <?php if($categorie == "Montagne") echo "selected"; ?>>Montagne</option>
            </select>
            <select name="region" id="region">
                <option value="Toutes régions">Régions</option>
                <option value="Nouvelle Aquitaine" <?php if($region == "Nouvelle Aquitaine") echo "selected"; ?>>Nouvelle Aquitaine</option>
                <option value="Provence-Alpes-Côte d'Azur" <?php if($region == "Provence-Alpes-Côte d'Azur") echo "selected"; ?>>Provence-Alpes-Côte d'Azur</option>
                <option value="Auvergne-Rhône-Alpes" <?php if($region == "Auvergne-Rhône-Alpes") echo "selected"; ?>>Auvergne-Rhône-Alpes</option>
            </select>
            <select name="type_hebergement" id="type-hebergement">
                <option value="Tous types d'hébergement">Types d'hébergement</option>
                <option value="Hôtel" <?php if($type_hebergement == "Hôtel") echo "selected"; ?>>Hôtel</option>
                <option value="Cabane" <?php if($type_hebergement == "Cabane") echo "selected"; ?>>Cabane</option>
                <option value="Chalet" <?php if($type_hebergement == "Chalet") echo "selected"; ?>>Chalet</option>
            </select>
        </div>
        <select name="formule" id="formule">
            <option value="Toutes formules">Formules</option>
            <option value="Petit-déjeuner" <?php if($formule == "Petit-déjeuner") echo "selected"; ?>>Petit-déjeuner</option>
            <option value="Demi-pension" <?php if($formule == "Demi-pension") echo "selected"; ?>>Demi-pension</option>
            <option value="Pension complète" <?php if($formule == "Pension complète") echo "selected"; ?>>Pension complète</option>
        </select>
        <label for="date">Date de début:</label>
        <input type="date" id="date-debut" name="date_debut" value="<?php echo $travelDetail['date_debut']; ?>">
        <label for="date">Date de fin:</label>
        <input type="date" id="date-fin" name="date_fin" value="<?php echo $travelDetail['date_fin']; ?>">
        <input type="number" id="prix" name="price" placeholder="Prix" value="<?php echo $travelDetail['price']; ?>">
        <div>
            <input type="text" id="description" name="description" placeholder="Description" value="<?php echo $travelDetail['description']; ?>">
        </div>
        <div class="image-container">
            <input type="file" id="inputImage" name="image_url" accept="image/*" style="display: none;">
            <button id="importButton">Importer une image </button>
            <img id="imagePreview" src="#" alt="Aperçu de l'image" style="display:none; max-width: 300px;">
        </div>
        <button type="submit" value="enregistrer" id="button">Enregistrer</button>
    </form>
</div>




<script src="../javascript/script.js"></script>

</body>
</html>