<?php
    include('../Include/connection.php');

    function signUpAdmin($dbh, $nom, $mail, $pwd){
        $requete = "INSERT INTO admin (nomAdmin, email, pwd) VALUES (:nm, :mal, :pwd)";
        $stmt = $dbh->prepare($requete);
        $stmt->bindParam(':nm', $nom);
        $stmt->bindParam(':mal', $mail);
        $stmt->bindParam(':pwd', $pwd);
        $stmt->execute();
    }

    function insertVariete($dbh, $nomVariete, $occupation, $rendement, $prixVente){
        $requete = "INSERT INTO variete (nomVariete, occupation, rendement, prixVente) VALUES (:nom, :occupation, :rendement, :prixV)";
        $stmt = $dbh->prepare($requete);
        $stmt->bindParam(':nom', $nomVariete);
        $stmt->bindParam(':occupation', $occupation);
        $stmt->bindParam(':rendement', $rendement);
        $stmt->bindParam(':prixV', $prixVente);
        $stmt->execute();
    }
    
    function insertThe($dbh, $nomThe, $idVariete){
        $requete = "INSERT INTO the (nomThe, idVariete) VALUES (:nom, :idVariete)";
        $stmt = $dbh->prepare($requete);
        $stmt->bindParam(':nom', $nomThe);
        $stmt->bindParam(':idVariete', $idVariete);
        $stmt->execute();
    }
    
    function insertParcelle($dbh, $surface, $idVariete){
        $requete = "INSERT INTO parcelle (surface, idVariete) VALUES (:surface, :idVariete)";
        $stmt = $dbh->prepare($requete);
        $stmt->bindParam(':surface', $surface);
        $stmt->bindParam(':idVariete', $idVariete);
        $stmt->execute();
    }
    
    
    
    function insertCategDepense($dbh, $nomCateg){
        $requete = "INSERT INTO categDepense (nomCateg) VALUES (:nom)";
        $stmt = $dbh->prepare($requete);
        $stmt->bindParam(':nom', $nomCateg);
        $stmt->execute();
    }
    
    function insertDepense($dbh, $idCateg, $dateDepense, $montant){
        $requete = "INSERT INTO depense (idCateg, dateDepense, montant) VALUES (:idCateg, :dateDepense, :montant)";
        $stmt = $dbh->prepare($requete);
        $stmt->bindParam(':idCateg', $idCateg);
        $stmt->bindParam(':dateDepense', $dateDepense);
        $stmt->bindParam(':montant', $montant);
        $stmt->execute();
    }

    function insertSalaire($dbh, $salaire, $id){
        $requete = "INSERT INTO salaire (idCueilleur, salaire) VALUES (:idCuilleur, :salaire)";
        $stmt = $dbh->prepare($requete);
        $stmt->bindParam(':idCuilleur', $id);
        $stmt->bindParam(':salaire', $salaire);
        $stmt->execute();
    }
    
    function insertCueillette($dbh, $dateCueillette, $idCueilleur, $idParcelle, $poids){
        $requete = "INSERT INTO cueillette (dateCueillette, idCueilleur, idParcelle, poids) VALUES (:dateCueillette, :idCueilleur, :idParcelle, :poids)";
        $stmt = $dbh->prepare($requete);
        $stmt->bindParam(':dateCueillette', $dateCueillette);
        $stmt->bindParam(':idCueilleur', $idCueilleur);
        $stmt->bindParam(':idParcelle', $idParcelle);
        $stmt->bindParam(':poids', $poids);
        $stmt->execute();
    }
    
    function checkLoginAdmin($dbh, $mail, $pwd, $statut){
        $sql = "select * from admin where email = :mail and pwd = :pass and statut = :stat";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':mail', $mail);
        $stmt->bindParam(':pass', $pwd);
        $stmt->bindParam(':stat', $statut);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $valiny = "";
        if ($result) {
            $valiny = "true";
        }
        else {
            $valiny = "false";
        }
        return $valiny;
    }

    function getIdAdmin($dbh, $mail, $pass){
        $sql = "select idAdmin from admin where email = :mail and pwd = :pass";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':mail', $mail);
        $stmt->bindParam(':pass', $pass);
        $stmt->execute();
    
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        $valiny = "";
        if ($result && isset($result['idAdmin'])) {
            $valiny = $result['idAdmin'];
        }else{
            echo("non");
        }
        return $valiny;
    }

    //configuration salaire
    function configurationSalaire($dbh, $salaire){
        $sql = "update salaire set salaire = :new where idSalaire = 1";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':new', $salaire);
        $stmt->execute();
    }

    function getSalaire($dbh){
        $sql = "select * from salaire";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function getParcelle($dbh){
        $sql = "select * from parcelle";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function getCueilleur($dbh){
        $sql = "select * from cueilleur";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function getThe($dbh){
        $sql = "select * from cueilleur";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function getData($dbh, $table){
        $sql = "SELECT * FROM $table";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function updateThe($dbh, $idThe, $nomThe, $idVariete){
        $sql = "UPDATE the SET nomThe = :newNom, idVariete = :newId WHERE idThe = :idThe";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':newNom', $nomThe);
        $stmt->bindParam(':newId', $idVariete);
        $stmt->bindParam(':idThe', $idThe);
        $stmt->execute();
    }

    function updateVariete($dbh, $idVariete, $nomVariete, $occupation, $rendement) {
        $sql = "UPDATE variete SET nomVariete = :nomVariete, occupation = :occupation, rendement = :rendement WHERE idVariete = :idVariete";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':nomVariete', $nomVariete);
        $stmt->bindParam(':occupation', $occupation);
        $stmt->bindParam(':rendement', $rendement);
        $stmt->bindParam(':idVariete', $idVariete);
        $stmt->execute();
    }

    function updateParcelle($dbh, $idParcelle, $surface, $idVariete) {
        $sql = "UPDATE parcelle SET surface = :surface, idVariete = :idVariete WHERE idParcelle = :idParcelle";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':surface', $surface);
        $stmt->bindParam(':idVariete', $idVariete);
        $stmt->bindParam(':idParcelle', $idParcelle);
        $stmt->execute();
    }
    
    function updateCategDepense($dbh, $idCateg, $nomCateg) {
        $sql = "UPDATE categDepense SET nomCateg = :nomCateg WHERE idCateg = :idCateg";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':nomCateg', $nomCateg);
        $stmt->bindParam(':idCateg', $idCateg);
        $stmt->execute();
    }
    
    function updateDepense($dbh, $idDepense, $idCateg, $dateDepense, $montant) {
        $sql = "UPDATE depense SET idCateg = :idCateg, dateDepense = :dateDepense, montant = :montant WHERE idDepense = :idDepense";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':idCateg', $idCateg);
        $stmt->bindParam(':dateDepense', $dateDepense);
        $stmt->bindParam(':montant', $montant);
        $stmt->bindParam(':idDepense', $idDepense);
        $stmt->execute();
    }

    function updateCueillette($dbh, $idCueillette, $dateCueillette, $idCueilleur, $idParcelle, $poids) {
        $sql = "UPDATE cueillette SET dateCueillette = :dateCueillette, idCueilleur = :idCueilleur, idParcelle = :idParcelle, poids = :poids WHERE idCueillette = :idCueillette";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':dateCueillette', $dateCueillette);
        $stmt->bindParam(':idCueilleur', $idCueilleur);
        $stmt->bindParam(':idParcelle', $idParcelle);
        $stmt->bindParam(':poids', $poids);
        $stmt->bindParam(':idCueillette', $idCueillette);
        $stmt->execute();
    }
    
    function updateSalaire($dbh, $idSalaire, $salaire) {
        $sql = "UPDATE salaire SET salaire = :salaire WHERE idSalaire = :idSalaire";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':salaire', $salaire);
        $stmt->bindParam(':idSalaire', $idSalaire);
        $stmt->execute();
    }

    function deleteFromTable($dbh, $id, $nomTable){
        $sql = "delete from $nomTable where id = :id";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    function totalCueillette($dbh, $debut, $fin){
        $sql = "select sum(poids) as total from cueillette where dateCueillette >= :debut and dateCueillette <= :fin";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':debut', $debut);
        $stmt->bindParam(':fin', $fin);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $sum = $result['total'];
        return $sum;
    }

    function totalRendementParcelles($dbh, $debut, $fin){
        $sql = "select sum(((surface * 10000) / occupation) * rendement ) as total_rendement from variete as v join parcelle as p on v.idVariete = p.idVariete join cueillette as c on c.idParcelle = p.idParcelle where c.dateCueillette >= :debut and c.dateCueillette <= :fin";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':debut', $debut);
        $stmt->bindParam(':fin', $fin);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $sum = $result['total_rendement'];
        return $sum;
    }

    function revient($sumSalaire, $sumDepense, $poidsCueil){
        $revient = ($sumDepense + $sumSalaire) / $poidsCueil;
        return $revient;
    }
    function reste($totalCueillette, $totalRendement){
        $reste = $totalRendement - $totalCueillette;
        return $reste;
    }

    function totalFeuille1Parcelle($dbh, $idParcelle){
        $sql = "select sum(((p.surface * 10000) / v.occupation) * v.rendement ) as total_feuille from variete as v join parcelle as p on v.idVariete = p.idVariete where p.idParcelle = :id";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':id', $idParcelle);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $sum = $result['total_feuille'];
        return $sum;
    }

    function supprimerSalaire($dbh, $id){
        try {
            $requete = "DELETE FROM salaire WHERE idSalaire = :id";
            $stmt = $dbh->prepare($requete);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true; // La suppression a réussi
        } catch (PDOException $e) {
            // Gérer l'erreur (optionnel)
            error_log('Erreur lors de la suppression du salaire : ' . $e->getMessage());
            return false; // La suppression a échoué
        }
    }

    function supprimerThe($dbh, $id){
        try {
            $requete = "DELETE FROM the WHERE idThe = :id";
            $stmt = $dbh->prepare($requete);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true; // La suppression a réussi
        } catch (PDOException $e) {
            // Gérer l'erreur (optionnel)
            error_log('Erreur lors de la suppression du salaire : ' . $e->getMessage());
            return false; // La suppression a échoué
        }
    }

    function supprimerParcelle($dbh, $id){
        try {
            $requete = "DELETE FROM parcelle WHERE idParcelle = :id";
            $stmt = $dbh->prepare($requete);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true; // La suppression a réussi
        } catch (PDOException $e) {
            // Gérer l'erreur (optionnel)
            error_log('Erreur lors de la suppression du salaire : ' . $e->getMessage());
            return false; // La suppression a échoué
        }
    }

    function supprimerCueilleur($dbh, $id){
        try {
            $requete = "DELETE FROM cueilleur WHERE idCueilleur = :id";
            $stmt = $dbh->prepare($requete);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true; // La suppression a réussi
        } catch (PDOException $e) {
            // Gérer l'erreur (optionnel)
            error_log('Erreur lors de la suppression du salaire : ' . $e->getMessage());
            return false; // La suppression a échoué
        }
    }

    function insertRegeneration($dbh, $idmois, $idt){
        $requete = "INSERT INTO regeneration (mois, idThe) VALUES (:mois, :idt)";
        $stmt = $dbh->prepare($requete);
        $stmt->bindParam(':mois', $idmois);
        $stmt->bindParam(':idt', $idt);
        $stmt->execute();
    }

    function insertPoint($dbh, $bonus, $malus){
        $requete = "INSERT INTO pointCueilleur (bonus, malus) VALUES (:bonus, :malus)";
        $stmt = $dbh->prepare($requete);
        $stmt->bindParam(':bonus', $bonus);
        $stmt->bindParam(':malus', $malus);
        $stmt->execute();
    }

    function malus($dbh){
        $sql= "select malus from pointCueilleur order by idPoint desc limit 1";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $sum = $result['malus'];
        return $sum;
    }

    function bonus($dbh){
        $sql= "select bonus from pointCueilleur order by idPoint desc limit 1";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $sum = $result['bonus'];
        return $sum;
    }

    function getMalusMontantSalaire($dbh, $salaire, $malus){
        $malusSalaire = ($salaire * $malus)/100;
        $montant = $salaire - $malusSalaire;
        return $montant;
    }

    function getSalaireById($dbh, $idCueilleur){
        $sql = "select salaire from salaire where idCueilleur = :id";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':id', $idCueilleur);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result !== false && isset($result['salaire'])) {
            return $result['salaire'];
        } else {
            return 0; 
        }
    }

    function getPoidsMinCueilleur($dbh, $idC){
        $sql = "select poidsMin from cueilleur where idCueilleur = :id";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':id', $idC);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $sum = $result['poidsMin'];
        return $sum;
    }

    function getBonusMontantSalaire($dbh, $bonus, $salaire){
        $bonusSalaire = ($salaire * $bonus)/100;
        $montant = $salaire + $bonusSalaire;
        return $montant;
    }
    function totalVente($dbh){
        $sql  = "select sum(prixVente * c.poids) as total_vente from  parcelle as p join cueillette as c on p.idParcelle = c.idParcelle join variete as v on v.idVariete = p.idVariete";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $vente = $result['total_vente'];
        return $vente;
    }

    function insertCueilleur($dbh, $nomCueilleur, $genre, $dateDeNaissance, $poidsMin){
        $requete = "INSERT INTO cueilleur (nomCueilleur, genre, dateDeNaissance, poidsMin) VALUES (:nom, :genre, :dateNaissance, :min)";
        $stmt = $dbh->prepare($requete);
        $stmt->bindParam(':nom', $nomCueilleur);
        $stmt->bindParam(':genre', $genre);
        $stmt->bindParam(':dateNaissance', $dateDeNaissance);
        $stmt->bindParam(':min', $poidsMin);
        $stmt->execute();
    }

    function sommeDepense($dbh, $debut, $fin){
        $sql = "select sum(montant) as total_montant from depense where dateDepense >= :debut and dateDepense <= :fin";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':debut', $debut);
        $stmt->bindParam(':fin', $fin);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $sum = $result['total_montant'];
        return $sum;
    }

    function sommeSalaire($dbh, $debut, $fin){
        $sql = "select sum(s.salaire) as total_montant from salaire as s join cueillette as c on s.idCueilleur = c.idCueilleur where c.dateCueillette >= :debut and c.dateCueillette <= :fin";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':debut', $debut);
        $stmt->bindParam(':fin', $fin);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $sum = $result['total_montant'];
        return $sum;
    }

    function vraiDepense($dbh, $debut, $fin){
        $depenseAutre = sommeDepense($dbh, $debut, $fin);
        $salaireTotal = sommeSalaire($dbh, $debut, $fin);
        $depense = $depenseAutre + $salaireTotal;
        return $depense;
    }

    function benefice($dbh, $debut, $fin){
        $vente = totalVente($dbh);
        $depense = vraiDepense($dbh, $debut, $fin);
        $benefice = $vente - $depense;
        return $benefice;
    }

    function insertPaiement($dbh, $idCueilleur, $datePaiement, $poids, $bonus, $malus, $montant) {
        $requete = "INSERT INTO paiement (idCueilleur, datePaiement, poids, bonus, malus, montant) VALUES (:idCueilleur, :datePaiement, :poids, :bonus, :malus, :montant)";
        $stmt = $dbh->prepare($requete);
        $stmt->bindParam(':idCueilleur', $idCueilleur); 
        $stmt->bindParam(':datePaiement', $datePaiement);
        $stmt->bindParam(':poids', $poids);
        $stmt->bindParam(':bonus', $bonus);
        $stmt->bindParam(':malus', $malus);
        $stmt->bindParam(':montant', $montant);
        $stmt->execute();
    }

    function supprimerPaiement($dbh, $id){
        try {
            $requete = "DELETE FROM paiement WHERE idPaiement = :id";
            $stmt = $dbh->prepare($requete);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true; // La suppression a réussi
        } catch (PDOException $e) {
            // Gérer l'erreur (optionnel)
            error_log('Erreur lors de la suppression du paiement : ' . $e->getMessage());
            return false; // La suppression a échoué
        }
    }

    function supprimerPointCueilleur($dbh, $id){
        try {
            $requete = "DELETE FROM pointCueilleur WHERE idPoint = :id";
            $stmt = $dbh->prepare($requete);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true; // La suppression a réussi
        } catch (PDOException $e) {
            // Gérer l'erreur (optionnel)
            error_log('Erreur lors de la suppression du paiement : ' . $e->getMessage());
            return false; // La suppression a échoué
        }
    }

    function getPointActuel($dbh){
        $sql= "select * from pointCueilleur order by idPoint desc limit 1";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function getListePaiement($dbh, $dateDebut, $dateFin){
        $sql= "select * from paiement WHERE datePaiement BETWEEN :dateDebut AND :dateFin";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':dateDebut', $dateDebut);
        $stmt->bindParam(':dateFin', $dateFin);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function nombrePiedParcelle($dbh){
        $sql = "select round((surface * 10000) / occupation) as nombre_pied from parcelle as p join variete as v on p.idVariete = v.idVariete group by idParcelle";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $rep = $result['nombre_pied'];
        return $rep;
    }

    // info prevision
    // idParcelle
    // surface getParcelle
    // nomThe
    // nombre Pied getParcelle
    // reste poids getParcelle
    // montant parcelle (nombrePied * rendement)


    function cueilletteDateT($dbh, $date){
        $sql = "select poids from cueillette where dateCueillette = :date group by idParcelle";

        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':date', $date);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function nombreJour($dbh){
        $sql = "select round(DATEDIFF(CURDATE(), '2023-01-01')/30) as nbJour";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $rep = $result['nbJour'];
        return $rep;

    }

    function nombreJourFutur($dbh, $date){
        $sql = "select round(DATEDIFF($date, CURDATE())/30) as nbJour";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $rep = $result['nbJour'];
        return $rep;

    }

    function moyenne($dbh, $id){
        $sql = "select round(avg(poids), 2) as moyenne from cueillette where dateCueillette <= CURDATE() and dateCueillette >= '2023-01-01' where idParcelle = :id";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $rep = $result['moyenne'];
        return $rep;
    }

    function moyennePoidsCueillette($dbh, $id){
        $nbJ = nombreJour($dbh);
        $moyenne = moyenne($dbh, $id);
        $moyennePoids = $moyenne / $nbJ;
        return $moyennePoids; 
    }

    function previsionPoidsCueilleteTotale($dbh, $date, $id){
        $futur = nombreJourFutur($dbh, $date);
        $moyenne = moyenne($dbh, $id);
        $cueillette = $moyenne * $futur;
        return $cueillette;
    }


    function getPrixVente($dbh, $idC){
        $sql = "select prixVente from variete as v join parcelle as p on v.idVariete = p.idVariete join cueillette as c on p.idParcelle = c.idParcelle where c.idCueillette = :id";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':id', $idC);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result !== false && isset($result['prixVente'])) {
            return $result['prixVente'];
        } else {
            return 0; 
        }
    }
    function montantTotal($dbh, $id, $date){
        $prixVente = getPrixVente($dbh, $id);
        $poidsCueil = previsionPoidsCueilleteTotale($dbh, $date, $id);
        $montant = $poidsCueil * $prixVente;
        return $montant;

    }
?>