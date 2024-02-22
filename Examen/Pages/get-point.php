<?php
    include('../Function/function.php');

    $liste = array();
    $liste= getPointActuel($dbh);
    // var_dump($liste);

    echo json_encode($liste);

?>
