<?php
include('../Function/function.php');

// Vérifier si des données ont été envoyées
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer le contenu JSON envoyé
    $json_data = file_get_contents('php://input');

    // Vérifier si le contenu JSON est valide
    $data = json_decode($json_data, true);

    if ($data !== null) {
        // Traitement des données
        $idThe = $data['idt'];
        $moisSelectionnes = $data['mois'];

        // Afficher les données pour le débogage
        echo "ID du the: $idThe<br>";
        echo "Mois sélectionnés: ";
        foreach ($moisSelectionnes as $mois) {
            echo "$mois ";
            insertRegeneration($dbh,$mois,$idThe);
            echo ("succes");
        }
    } else {
        // Erreur lors du décodage JSON
        echo "Erreur: Impossible de décoder les données JSON.";
    }
} else {
    // Méthode de requête incorrecte
    echo "Erreur: Méthode de requête incorrecte.";
}
?>
