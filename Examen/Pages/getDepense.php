<?php
    include('../Function/function.php');

    $liste = array();
    $liste= getData($dbh, "depense");

    echo json_encode($liste);

?>
