<?php
    include('../Function/function.php');

    $nomVariete = $_POST['nomVariete'];
    $occupation = $_POST['occupation'];
    $rendement = $_POST['rendement'];
    $prixv = $_POST['prixVente'];

    insertVariete($dbh, $nomVariete, $occupation, $rendement, $prixv);
    echo("oui");
?>