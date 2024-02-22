<?php
$zero = 0;
    if (isset($_POST['date'])) {
       
    }else{

    }
?>

<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Brand</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amethysta&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amiri&amp;display=swap">
    <link rel="stylesheet" href="../assets/css/Banner-Heading-Image-images.css">
    <link rel="stylesheet" href="../assets/css/Login-Form-Basic-icons.css">
</head>

<body style="background: linear-gradient(rgba(47, 23, 15, 0.65) 0%, rgba(122,210,52,0.65) 100%), url(&quot;assets/img/pexels-oziel-gómez-837275.jpg&quot;), #a49e9e;">
    <?php include 'header-admin.php'; ?>
    <h1 class="text-center text-white d-none d-lg-block site-heading"><span class="text-primary site-heading-upper mb-3"></span></h1>
    <section class="position-relative py-4 py-xl-5">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-xl-9" style="transform: translate(40px);">
                    <section class="py-4 py-xl-5"></section>
                </div>
            </div>
        </div>
    </section>
    <div class="container py-4 py-xl-5">
        <div class="row mb-5" style="background: #b4b16b;">
            <div class="col-md-8 col-xl-6 text-center mx-auto">
                <h1 style="font-size: 47.9px;">Prevision</h1>
                <form action="prevision.php" method="post">
                <label class="form-label">Date :&nbsp;</label><input type="date" name="date"><input class="btn btn-primary" type="submit" style="margin-left: 10px;margin-bottom: 8px;" value="prevoir">
                </form>

                <p>Poids total the restant : 
                <?php
    if (isset($_POST['date'])) {
       echo("7392 KG");
    }else{
        echo($zero);
    }
?>    
                </p>
                <p>Montant : 
                <?php
            if (isset($_POST['date'])) {
            echo("14 KG");
            }else{
                echo($zero);
            }
        ?> 
            </p>
            </div>
        </div>
        <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3">
            <div class="col">
                <div>
                    <div class="col" style="margin-bottom: 15px;">
                        <div class="card"><img class="card-img-top w-100 d-block fit-cover" style="height: 200px;" src="../assets/img/pexels-oziel-gómez-837275.jpg">
                            <div class="card-body p-4">
                                <p class="text-primary card-text mb-0">PARCELLE #1</p>
                                <h4 class="card-title">SAHAMBAVY</h4>
                                <p class="card-text">
                                <?php
            if (isset($_POST['date'])) {
            echo("15");
            }else{
                echo($zero);
            }
        ?> 
 ha</p>
                                <div class="d-flex">
                                    <div>
                                        <p class="fw-bold mb-0">Nombre de pied:                 <?php
            if (isset($_POST['date'])) {
            echo("35");
            }else{
                echo($zero);
            }
        ?> 
&nbsp;</p>
                                        <p class="text-muted mb-0"><strong><span style="color: rgba(10, 10, 10, 0.75);">Poids the restant: 47 KG</span></strong></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.getElementById('submitBtn').addEventListener('click', function() {
                var dateValue = document.getElementById('dateInput').value;

                var xhr = new XMLHttpRequest();
                xhr.open('GET', 'trait-prevision.php?date=' + dateValue, true);
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            console.log('Réponse du serveur : ' + xhr.responseText);
                        } else {
                            console.error('Une erreur s\'est produite');
                        }
                    }
                };
                xhr.send();
            });
        </script>

    </div>
    <section class="page-section clearfix">
        <div class="container">
            <div class="intro"></div>
        </div>
    </section>
    <?php include 'foot.php'; ?>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/current-day.js"></script>
</body>

</html>