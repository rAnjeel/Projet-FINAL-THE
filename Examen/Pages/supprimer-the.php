<?php
include('../Function/function.php');

header('Content-Type: application/json'); 

    $idsup = $_GET["idsup"];

    // $idsup = 3;
    supprimerThe($dbh, $idsup);
    $rep = "ok";
    echo ($rep);

?>
