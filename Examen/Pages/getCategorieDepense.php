<?php
    include('../Function/function.php');

    $liste = array();
    $liste= getData($dbh, "categDepense");

    echo json_encode($liste);

?>
