<?php
    include('../Function/function.php');

    $date = $_POST['date'];


    // $idCategorie = 1;
    // $date = "2023-09-12";
    // $montant = 15000;

    insertDepense($dbh, $idCategorie, $date, $montant);
    $value = "oui";
    echo($value);

?>