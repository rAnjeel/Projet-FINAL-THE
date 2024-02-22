<?php
    include('../Function/function.php');

    $liste = array();
    $liste= getData($dbh, "salaire");
    // var_dump($liste);

    echo json_encode($liste);

?>
