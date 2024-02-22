<?php
    include('../Function/function.php');

    $liste = array();
    $liste= getData($dbh, "cueilleur");

    echo json_encode($liste);

?>
