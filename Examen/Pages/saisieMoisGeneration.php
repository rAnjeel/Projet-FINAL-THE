<?php include('../Function/function.php'); ?>
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


<body style="background: linear-gradient(rgba(47, 23, 15, 0.65) 0%, rgba(122,210,52,0.65) 100%), url(&quot;assets/img/pexels-oziel-gómez-837275.jpg&quot;);">
<?php include 'header-admin.php'; ?>    
<h1 class="text-center text-white d-none d-lg-block site-heading"><span class="text-primary site-heading-upper mb-3"></span></h1>
    <section class="position-relative py-4 py-xl-5">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-5" style="transform: scale(1);">
                        <div class="card-body d-flex flex-column align-items-center" style="width: 881px;transform: translate(-229px);background: var(--bs-green);border-color: var(--bs-body-bg);">
                            <div class="col-md-8 col-xl-6 text-center mx-auto">
                                <p class="w-lg-50" style="color: rgb(230,230,230);"></p>
                            </div>
                            <section class="py-4 py-xl-5" style="background: var(--bs-green);">
                                <div class="container" style="width: 791.7px;">
                                    <div class="bg-dark border rounded border-0 border-dark overflow-hidden">
                                        <div class="row g-0">
                                            <div class="col-md-6 col-xl-12" style="color: #d3d1aa;background: #fbfbfb;">
                                                <section class="position-relative py-4 py-xl-5" style="background: var(--bs-green);width: 784.9px;">
                                                    <div class="container position-relative">
                                                        <div class="row mb-5">
                                                            <div class="col-md-8 col-xl-6 text-center mx-auto" style="background: #2b4c3f;">
                                                                <h2 style="border-bottom-color: var(--bs-emphasis-color);">SAISIE</h2>
                                                                <p class="w-lg-50">MOIS DE GENERATION</p>
                                                            </div>
                                                        </div>
                                                        <div class="row d-flex justify-content-center">
                                                            <div class="col-md-6 col-lg-5 col-xl-4" style="width: 354.9px;">
                                                                <div>
                                                                    <form class="p-3 p-xl-4" method="post">
                                                                        <div class="mb-3"></div>
                                                                        <div style="margin-bottom: 12px;"></div>
                                                                        <div class="mb-3"></div>
                                                                        <div class="mb-3"></div>
                                                                        <div></div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <div class="text-white bg-dark border rounded border-0 p-4 p-md-5" style="width: 770px;transform: translate(-36px);margin-left: 100px;">
                                <h2 class="fw-bold text-white mb-3">Mois de generation</h2><label class="form-label">ID the :&nbsp;</label>
                                    <select name="idt">
                                        <?php 
                                            $table = getData($dbh,"the");
                                            foreach ($table as $row) { 
                                        ?>
                                            <option value="<?php echo $row['idThe']; ?>"> <?php echo $row['nomThe']; ?> </option>
                                        <?php     
                                            }
                                        ?>
                                    </select>
                                <div id="monDiv">
                                    <input class="form-check-input" type="checkbox" id="formCheck-1" name="mois" value="1"><label class="form-check-label" for="formCheck-1" value="janvier">Janvier</label>
                                    <input class="form-check-input" type="checkbox" id="formCheck-2" name="mois" value="2"><label class="form-check-label" for="formCheck-2" value="fevrier">Fevrier</label>
                                    <input class="form-check-input" type="checkbox" id="formCheck-2" name="mois" value="3"><label class="form-check-label" for="formCheck-2" value="mars">Mars</label>
                                    <input class="form-check-input" type="checkbox" id="formCheck-12" name="mois" value="4"><label class="form-check-label" for="formCheck-12" value="avril">Avril</label>
                                    <input class="form-check-input" type="checkbox" id="formCheck-11" name="mois" value="5"><label class="form-check-label" for="formCheck-11" value="mai">Mai</label>
                                    <input class="form-check-input" type="checkbox" id="formCheck-10" name="mois" value="6"><label class="form-check-label" for="formCheck-10" value="juin">Juin</label>
                                    <input class="form-check-input" type="checkbox" id="formCheck-9" name="mois" value="7"><label class="form-check-label" for="formCheck-9" value="juillet">Juillet</label>
                                    <input class="form-check-input" type="checkbox" id="formCheck-8" name="mois" value="8"><label class="form-check-label" for="formCheck-8" value="aout">Aout</label>
                                    <input class="form-check-input" type="checkbox" id="formCheck-7" name="mois" value="9"><label class="form-check-label" for="formCheck-7" value="septembre">Septembre</label>
                                    <input class="form-check-input" type="checkbox" id="formCheck-6" name="mois" value="10"><label class="form-check-label" for="formCheck-6" value="octobre">Octobre</label>
                                    <input class="form-check-input" type="checkbox" id="formCheck-5" name="mois" value="11"><label class="form-check-label" for="formCheck-5" value="novembre">Novembre</label>
                                    <input class="form-check-input" type="checkbox" id="formCheck-4" name="mois" value="12"><label class="form-check-label" for="formCheck-4" value="decembre">Decembre</label>
                                </div><button class="btn btn-primary" type="button" onclick="getSelectedCheckboxValues()">Inserer</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-xl-9" style="transform: translate(40px);">
                    <section class="py-4 py-xl-5"></section>
                </div>
            </div>
        </div>
    </section>
    <section class="page-section clearfix">
        <div class="container">
            <div class="intro"></div>
        </div>
    </section>
    <?php include 'foot.php'; ?>

    <script type="text/javascript">
        function getSelectedCheckboxValues() {
            // Récupérer la valeur de idCueilleur
            var idt = document.getElementById('idt').value;
            alert(idt);

            // Récupérer les valeurs des cases à cocher
            var checkboxes = document.querySelectorAll('input[name="mois"]:checked');
            var moisSelectionnes = [];
            checkboxes.forEach(function(checkbox) {
                moisSelectionnes.push(checkbox.value);
            });

            // Créer un objet JSON avec les valeurs récupérées
            var data = {
                idt: idt,
                mois: moisSelectionnes
            };

            // Convertir l'objet JSON en chaîne JSON
            var jsonData = JSON.stringify(data);

            // Afficher les données JSON dans la console à des fins de débogage
            console.log(jsonData);

        //Vous pouvez ensuite envoyer jsonData à votre backend via une requête AJAX par exemple
            fetch('trait-insert-mois.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: jsonData
            })
            .then(response => response.json())
            .then(data => {
                console.log('Réponse du serveur:', data);
            })
            .catch(error => {
                console.error('Erreur:', error);
            });
        }
            
    </script>

    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/current-day.js"></script>
</body>

</html>