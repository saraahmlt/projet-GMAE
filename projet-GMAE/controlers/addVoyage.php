<?php 
include '../classes/db.php';
include '../classes/voyage.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $categorie = $_POST['categorie'];
    $region = $_POST['region'];
    $formule = $_POST['formule'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date_debut = $_POST['date_debut'];
    $date_fin = $_POST['date_fin'];
    $price = $_POST['price'];
    $type_hebergement = $_POST['type_hebergement'];

    $target = "projet-GMAE/assets/images/";
    $nameimage = basename($_FILES["image_url"]["name"]);
    $image = $_SERVER['DOCUMENT_ROOT'] ."/". $target . $nameimage;

    $upload = 1;
    $imagefiletype = strtolower(pathinfo($image, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["image_url"]["tmp_name"]);
    if($check === false) {
        echo "Le fichier n'est pas une image.";
        $upload = 0;
    }

    if($upload == 0){
        echo "Désolé, votre fichier n'a pas été téléchargé.";
    } else {
        // On vérifie si le répertoire de destination existe, sinon on le créer
        if (!file_exists($target)) {
            mkdir($target, 0777, true);
        }
      
        if (move_uploaded_file($_FILES["image_url"]["tmp_name"], $image)) {
            $image_url = "http://" .$_SERVER['HTTP_HOST'] . "/" . $target . $nameimage;
            $travels = new Travels();
            $travels->create($categorie, $region, $formule, $title, $image_url, $description, $date_debut, $date_fin, $price, $type_hebergement);
            echo "L'image " . htmlspecialchars($nameimage) . " a été téléchargée.";
            header("Location: ../templates/dashboard.php");
            exit();
        } else {
            echo "Désolé, une erreur s'est produite lors du téléchargement de votre fichier.";
        }
    } 
}

?>   








