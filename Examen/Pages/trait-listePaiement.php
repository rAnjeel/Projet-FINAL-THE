<?php
    include('../Function/function.php');

    $dateDebut = $_POST['dateDebut'];
    $dateFin = $_POST['dateFin'];
    // $dateDebut ='2023-12-12';
    // $dateFin = '2024-02-13';
    $liste = array();
    $liste= getListePaiement($dbh, $dateDebut, $dateFin);
    // var_dump($liste);

    echo json_encode($liste);

?>
