<?php
$host = '172.10.0.113'; 
$dbname = 'db_p16_ETU002603'; 
$username = 'ETU002603'; 
$password = 'XALPYFlTy6WD'; 

try {
    $dbh = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connexion à la base de données réussie!";
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
// function dbconnect()
//     {
//         static $connect = null;
//         if ($connect === null) {
//             $connect = mysqli_connect('localhost', 'root', '', 'gestionThe');
//         }
//         return $connect;
    // }

?>
