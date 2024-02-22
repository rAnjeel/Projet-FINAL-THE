<?php
    include('../Function/function.php');

    $liste = array();
    $liste= getData($dbh, "cueillette");

    echo json_encode($liste);

?>
