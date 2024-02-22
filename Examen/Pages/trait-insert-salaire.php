<?php
    include('../Function/function.php');

    $salaire = $_POST['salaire'];
    $id = $_POST['idcueilleur'];

    insertSalaire($dbh, $salaire,$id);
    echo("oui");
?>