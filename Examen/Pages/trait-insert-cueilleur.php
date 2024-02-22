<?php
    include('../Function/function.php');

    $nomC = $_POST['nomCueilleur'];
    $dateN = $_POST['dateNaissance'];
    $genre = $_POST['genre'];

    insertCueilleur($dbh, $nomC, $genre, $dateN);
    echo("oui");
?>