<?php
    include('../Function/function.php');

    $liste = array();
    $liste= getData($dbh, "the");

    echo json_encode($liste);

?>
