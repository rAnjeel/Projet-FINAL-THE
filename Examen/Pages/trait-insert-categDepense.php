<?php
    include('../Function/function.php');

    $nomCateg = $_POST['nomCategorie'];

    insertCategDepense($dbh, $nomCateg);
    echo("oui");
?>