<?php

include '../classes/voyage.php';

if(isset($_GET['id_voyage'])) {
    $id_voyage = $_GET['id_voyage'];
    $travels = new Travels();
    $travelDetail = $travels->getTravelsDetail($id_voyage);

    if($travelDetail) {

        // Si la méthode de demande est POST et que le formulaire a été soumis
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
        
            $targetdir = "projet-GMAE/assets/images/";
            $nameimages = basename($_FILES["image_url"]["name"]);
            $images = $_SERVER['DOCUMENT_ROOT'] ."/". $targetdir . $nameimages;
            
            $upload = 1;
            $imagefiletype = strtolower(pathinfo($nameimages, PATHINFO_EXTENSION));
        
            $check = getimagesize($_FILES["image_url"]["tmp_name"]);
            if($check === false) {
                echo "Le fichier n'est pas une image.";
                $upload = 0;
            }
        
            if($upload == 0){
                echo "Désolé, votre fichier n'a pas été téléchargé.";
            } else {
                // On vérifie si le répertoire de destination existe, sinon on le créer
                if (!file_exists($targetdir)) {
                    mkdir($targetdir, 0777, true);
                }
              
                if (move_uploaded_file($_FILES["image_url"]["tmp_name"], $images)) {
                    $images_url = "http://" .$_SERVER['HTTP_HOST'] . "/" . $targetdir . $nameimages;
                    $travels = new Travels();
                    $travels->update($id_voyage, $categorie, $region, $formule, $title, $images_url, $description, $date_debut, $date_fin, $price, $type_hebergement);
                    echo "L'image " . htmlspecialchars($nameimages) . " a été téléchargée.";
                    header("Location: ../templates/dashboard.php");
                    exit();
                } else {
                    echo "Désolé, une erreur s'est produite lors du téléchargement de votre fichier.";
                }
    }
}
    }
}

?>

