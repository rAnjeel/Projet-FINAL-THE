<?php
    include('../Function/function.php');

    $idCategorie = $_POST['categories'];
    $date = $_POST['dateDepense'];
    $montant = $_POST['montant'];

    // $idCategorie = 1;
    // $date = "2023-09-12";
    // $montant = 15000;

    insertDepense($dbh, $idCategorie, $date, $montant);
    $value = "oui";
    echo($value);

?>