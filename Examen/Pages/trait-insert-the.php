<?php
    include('../Function/function.php');

    $nomThe = $_POST['nomThe'];
    $idVariete = $_POST['typeThe'];

    insertThe($dbh, $nomThe, $idVariete);
    echo("oui");
?>