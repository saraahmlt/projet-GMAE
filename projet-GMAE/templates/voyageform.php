<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:ital,wght@0,300..800;1,300..800&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Single+Day&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/publivoyages.css">
    <title>Publier nouveau voyage</title>
</head>
<body>
<?php include '../templates/corps.php'; ?>


<div class="big-container">
    <div class="menu-gauche">
        <div class="menu-gauche-text">
            <a href="dashboard.php"> Mes voyages</a>
        </div>
        <div class="trait"></div>
        <div class="menu-gauche-text-active">
            <a class="active" href="voyageform.php"> Publier un nouveau voyage</a>
        </div>
        <div class="trait"></div>
        <div class="menu-gauche-text">
        <a href="deconnexion.php">Déconnexion</a>
        </div>
        <div class="trait"></div>
    </div>
    <div>
        <h1>Nouveau voyage</h1>
    </div>
    <div>
        <form  method="POST" action="../controlers/addVoyage.php" enctype="multipart/form-data">
            <div id="line-one">
                <input type="text" id="voyage" name="title" placeholder="Nom du voyage">
                <select name="categorie" id="categorie">
                    <option value="Toutes catégories">Catégories</option>
                    <option value="Campagne">Campagne</option>
                    <option value="Mer">Mer</option>
                    <option value="Montagne">Montagne</option>
                </select>
                <select name="region" id="region">
                    <option value="Toutes régions">Régions</option>
                    <option value="Nouvelle Aquitaine">Nouvelle Aquitaine</option>
                    <option value="Provence-Alpes-Côte d'Azur">Provence-Alpes-Côte d'Azur</option>
                    <option value="Auvergne-Rhône-Alpes">Auvergne-Rhône-Alpes</option>
                </select>
                <select name="type_hebergement" id="type-hebergement">
                    <option value="Tous types d'hébergement">Types d'hébergement</option>
                    <option value="Hôtel">Hôtel</option>
                    <option value="Cabane">Cabane</option>
                    <option value="Chalet">Chalet</option>
                </select>
            </div>
            <select name="formule" id="formule">
                <option value="Toutes formules">Formules</option>
                <option value="Petit-déjeuner">Petit-déjeuner</option>
                <option value="Demi-pension">Demi-pension</option>
                <option value="Pension complète">Pension complète</option>
            </select>
            <label for="date">Date de début:</label>
            <input type="date" id="date-debut" name="date_debut">
            <label for="date">Date de fin:</label>
            <input type="date" id="date-fin" name="date_fin">
            <input type="number" id="prix" name="price" placeholder="Prix">
            <div>
                <input type="text" id="description" name="description" placeholder="Description">
            </div>
            <div class="image-container">
                <input type="file" id="inputImage" name="image_url" accept="image/*" style="display: none;">
                <button id="importButton">Importer une image </button>
                <img id="imagePreview" src="#" alt="Aperçu de l'image" style="display:none; max-width: 300px;">
            </div>
            <button type="submit" value="enregistrer" id="button">Enregistrer</button>
        </form>
    </div>
</div>

<script src="../javascript/script.js"></script>

</body>
</html>
