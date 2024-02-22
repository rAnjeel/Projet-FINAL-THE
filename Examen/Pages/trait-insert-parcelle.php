<?php
    include('../Function/function.php');

    $nomVariete = $_POST['surface'];
    $occupation = $_POST['typeThe'];

    insertParcelle($dbh, $nomVariete, $occupation);
    echo("oui");
?>