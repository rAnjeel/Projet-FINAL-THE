<?php
    include('../Function/function.php');

    $liste = array();
    $liste= getData($dbh, "paiement");
    // var_dump($liste);

    echo json_encode($liste);

?>
