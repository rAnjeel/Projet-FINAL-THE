<?php
include('../Function/function.php');

header('Content-Type: application/json'); // Indique que le contenu est du JSON

    $idsup = $_GET["idsup"];
    supprimerParcelle($dbh, $idsup);
    $rep = "ok";
    echo ($rep);

?>
