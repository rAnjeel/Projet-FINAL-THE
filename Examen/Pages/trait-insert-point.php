<?php
    include('../Function/function.php');

    $bonus = $_POST['bonus'];
    $malus =$_POST['malus'];
    
    insertPoint($dbh, $bonus, $malus);
    echo("oui");
?>