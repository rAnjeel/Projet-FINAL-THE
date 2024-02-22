<?php
    include('../Function/function.php');

    $idCueilleur = $_POST['idCueilleur'];
    $date =$_POST['date'];
    $poids=$_POST['poids'];
    // $idCueilleur = 1;
    // $date ='2023-02-13';
    // $poids=5;
    $bonus = "";
    $malus = "";
    $montant = "";
    $difference = "";
    $poidsMin = getPoidsMinCueilleur($dbh, $idCueilleur);
    $salaire = getSalaireById($dbh, $idCueilleur);
    $prixVente = getPrixVente($dbh, $idCueilleur);
    if ($poids < $poidsMin) { //mallus
        $difference = $poidsMin - $poids;
        $bonus = 0;
        $malus = malus($dbh);
        $montantMalus =($prixVente * $malus)/100;
            $montant = $salaire - $montantMalus;
        
        
    } elseif ($poids > $poidsMin) { //bonus
        $difference = $poids - $poidsMin;
        $bonus = bonus($dbh);
        $malus = 0;
        $montantBonus = ($prixVente * $bonus)/100;
        
        $montant = $salaire + $montantBonus;
    }
    insertPaiement($dbh, $idCueilleur, $date, $poids, $bonus, $malus, $montant);
    echo("oui");
?>