<?php
include('../Function/function.php');

if(isset($_POST['dateDebut']) && isset($_POST['dateFin'])) {
    $debut = $_POST['dateDebut'];
    $fin = $_POST['dateFin'];
    $liste = array();
    $liste[0]= revient($dbh, $debut, $fin);

    echo json_encode($liste);
} else {
    echo json_encode(array("error" => "Missing data"));
}
?>
