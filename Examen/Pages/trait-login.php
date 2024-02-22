<?php
    include('../Function/function.php');
    session_start();

    $nom = $_GET['email'];
    $pass = $_GET['password'];
    $statut = $_GET['statuts'];

        $val = checkLoginAdmin($dbh, $nom, $pass, $statut);
        if ($val == "true") {
            if ($statut == "admin") {
                $id = getIdAdmin($dbh, $nom, $pass);
                $_SESSION['idAdmin'] = $id;
                header('Location: gestionThe.php');
            }elseif ($statut == "user") {
                $id = getIdAdmin($dbh, $nom, $pass);
                $_SESSION['idUser'] = $id;
                header('Location: saisieCueillette.php');
            } 
        }
        elseif ($val == "false") {
            header('Location: ../index.php?=valeur invalide');
        }

?>