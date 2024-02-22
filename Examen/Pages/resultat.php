<?php
    include('../Function/function.php');
    if (isset($_POST['dateDebut']) && isset($_POST['dateFin'])){
        $debut = $_POST['dateDebut'];
        $fin = $_POST['dateFin'];
        $totalCuil = totalCueillette($dbh, $debut, $fin);
        $totalRendement = totalRendementParcelles($dbh, $debut, $fin);
        $reste = $totalRendement - $totalCuil;
        $reste = round($reste, 2);
        $sumDepenseAutre = sommeDepense($dbh, $debut, $fin);
        $sumSalaire = sommeSalaire($dbh, $debut, $fin);
        $vraiDep = vraiDepense($dbh, $debut, $fin);
        // $revient1 = revient($sumSalaire, $sumDepenseAutre, $totalCuil);
        $revient1 = $vraiDep / $totalCuil;
        $revient1 = round($revient1, 2);
        $benefice = benefice($dbh, $debut, $fin);
        $benefice = round($benefice, 2);
        $vente = totalVente($dbh);
        $vente = round($vente, 2);
    }
    $zero = 0;
   
?>

<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Products - Brand</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amethysta&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amiri&amp;display=swap">
    <link rel="stylesheet" href="../assets/css/Banner-Heading-Image-images.css">
    <link rel="stylesheet" href="../assets/css/Login-Form-Basic-icons.css">
</head>

<body style="background: linear-gradient(rgba(47, 23, 15, 0.65), rgba(47, 23, 15, 0.65)), url(&quot;../assets/img/pexels-oziel-gómez-837275.jpg&quot;);">
<?php include 'header-user.php'; ?>    
<section class="page-section">
        <div class="container">
            <div class="product-item">
                <div class="d-flex product-item-title"></div>
            </div>
            <div class="product-item">
                <div class="d-flex product-item-title"></div>
            </div>
        </div>
    </section>
    <section class="page-section">
        <div class="container py-4 py-xl-5">
            <div class="row mb-5" style="background: #cdfc92;">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2><div><?php if (isset($_POST['dateDebut']) && isset($_POST['dateFin'])){
                                echo("bilan du "); echo($_POST['dateDebut']); echo(" au "); echo($_POST['dateFin']);
                            } else{
                                echo("BILAN GLOBAL");
                            }?> 
                    </div></h2>
                    <form action="resultat.php" method="post">
                    <p class="w-lg-50"></p><label class="form-label">Date debut :&nbsp;</label><input type="date" name="dateDebut"><label class="form-label">Date fin :&nbsp;</label><input type="date" name="dateFin"><input class="btn btn-primary" type="submit" value="Valider">
                    </form>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="product-item">
                <div class="d-flex product-item-title"></div>
                <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3" style="background: #eaebea;">
                    <div class="col">
                        <div class="p-4">
                            <h4>Poids total cueillette</h4>
                            <p>Valeur: <?php 
                            if (isset($_POST['dateDebut']) && isset($_POST['dateFin'])) {
                                echo($totalCuil); 
                            } else {
                                echo $zero;
                            }
                            ?> KG</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-4">
                            <h4>Poids restant sur les parcelles</h4>
                            <p>Valeur: <?php 
                            if (isset($_POST['dateDebut']) && isset($_POST['dateFin'])) {
                                echo($reste); 
                            } else {
                                echo $zero;
                            }
                            ?> KG</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-4">
                            <h4>Montant des ventes</h4>
                            <p>Valeur: <?php 
                            if (isset($_POST['dateDebut']) && isset($_POST['dateFin'])) {
                                echo($vente); 
                            } else {
                                echo $zero;
                            }
                            ?> AR</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-4">
                            <h4>Montant des depenses</h4>
                            <p>Valeur : 
                            <?php if (isset($_POST['dateDebut']) && isset($_POST['dateFin'])) {
                                // echo($sumSalaire); echo("ok");
                                // echo($sumDepenseAutre); echo("ok");
                                echo($vraiDep); 
                            } else {
                                echo $zero;
                            }
                            ?>    
                            AR</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-4">
                            <h4>Benefice</h4>
                            <p><br>Valeur: 
                            <?php 
                            if (isset($_POST['dateDebut']) && isset($_POST['dateFin'])) {
                                echo($benefice); 
                            } else {
                                echo $zero;
                            }
                            ?>
                            AR<br><br></p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-4">
                            <h4>Cout de revient / KG</h4>
                            <p><br>Valeur: 
                            <?php 
                            if (isset($_POST['dateDebut']) && isset($_POST['dateFin'])) {
                                echo($revient1); 
                            } else {
                                echo $zero;
                            }
                            ?>
                            AR<br><br></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="page-section">
        <div class="container">
            <div class="product-item">
                <div class="d-flex product-item-title"></div>
            </div>
        </div>
    </section>
    <?php include 'foot.php'; ?>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/current-day.js"></script>
</body>

</html>