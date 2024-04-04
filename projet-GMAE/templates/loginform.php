<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/connect.css">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php
include '../templates/corps.php';
?>

<form method="POST" action="../controlers/auth.php" enctype="multipart/form-data">
    <div>
        <h1>Se connecter</h1>
    </div>
    <img src="../assets/images/Capture d’écran 2024-03-25 à 11.23.22.png" alt="ile">
    <div class="form-connexion">
        <div>
            <label for="email">Email</label>
        </div>
        <div>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="password">Mot de passe</label>
        </div>
        <div>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <button type="submit">Valider</button>
        </div>
    </div>
</form>