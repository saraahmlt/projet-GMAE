<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:ital,wght@0,300..800;1,300..800&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Single+Day&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/connect.css">
    <title>Connexion</title>
</head>
<body>

<?php
include '../templates/loginform.php';
?>

<?php
$host = 'localhost';
$username = 'root';
$dbname = 'projetGMAE';
$password = 'root';


try {
    $bdd = new PDO("mysql:host=$host;dbname=$dbname", 'root', $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
    die();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $userpassword = $_POST['password'];
    if ($email != "" && $userpassword != "") {
        $req = $bdd->query("SELECT * FROM User WHERE email = '$email' AND mot_de_passe = '$userpassword'");
        $rep = $req->fetch();
        if ($rep) {
            header("Location: ../templates/dashboard.php");
            exit();
        } else {
            $error_msg = "Email ou Mot de passe incorrect !";
        }
    }
}
?>



<?php
if (isset($error_msg)) {
    echo "<p>$error_msg</p>";
}
?>

</body>
</html>
