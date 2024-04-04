<?php

include '../classes/voyage.php';

if(isset($_GET['id_voyage'])) {
    $id_voyage = $_GET['id_voyage'];
    $travels = new Travels;
    $travels->delete($id_voyage);
    header("Location: ../templates/dashboard.php");
    exit();
}else {
    echo "Erreur id";
}

?>