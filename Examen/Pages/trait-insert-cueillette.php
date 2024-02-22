<?php
    include('../Function/function.php');

    $date = $_POST['dateCueillette'];
    $idCueilleur = $_POST['idCueilleur'];
    $idParc = $_POST['idParcelle'];
    $poids = $_POST['poids'];
    $espere = totalFeuille1Parcelle($dbh, $idParc);
    $restant = $espere - $poids;
    if($restant < 0){
        echo("non");
    }
    else if($restant > 0 && $restant > $poids){
        insertCueillette($dbh, $date, $idCueilleur, $idParc, $poids);
        echo("oui");
    }
    
?>