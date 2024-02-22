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

    <script type="text/javascript">

        window.addEventListener("load", function () {
            function sendData() {
                var xhr = new XMLHttpRequest(); 

                var formData = new FormData(form);

                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4) {
                        if (xhr.status === 200) {
                            var response = xhr.responseText;
                            if (response == "oui") {
                                alert("success");
                                afficherData();
                            } else {
                                alert("non");

                            }
                        } else {
                            console.error('Erreur de connexion au serveur');
                        }
                    }
                };
    
                xhr.addEventListener("error", function(event) {
                    alert('Oups! Quelque chose s\'est mal passé.');
                });
    
                xhr.open("POST", "trait-insert-depense.php");
                xhr.send(formData);
            }

            var form = document.getElementById("formulaire");
            form.addEventListener("submit", function (event) {
                event.preventDefault();
                sendData();
            });

            

afficherData()

function afficherData() {
    var xhr;
    try {
        xhr = new XMLHttpRequest();
    } catch (e) {
        xhr = false;
    }

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                var retour = JSON.parse(xhr.responseText);
                var table = document.getElementById("tableau");
                var tableau = document.createElement("table");
                tableau.className = "table";
                var thead = document.createElement("thead");
                var tr = document.createElement("tr");
                var th1 = document.createElement("th");
                var th2 = document.createElement("th");
                var th3 = document.createElement("th");
                th1.innerHTML = "<span style='color: rgb(3, 3, 3);'>Nom categorie</span>";
                th2.innerHTML = "<span style='color: rgb(0, 0, 0);'>Date depense</span>";
                th3.innerHTML = "<span style='color: rgb(0, 0, 0);'>Montant</span>";
                tr.appendChild(th1);
                tr.appendChild(th2);
                tr.appendChild(th3);
                thead.appendChild(tr);
                tableau.appendChild(thead);

                var tbody = document.createElement("tbody");

                for (var i = 0; i < retour.length; i++) {
                    (function(index){
                        var tr = document.createElement("tr");
                        var td1 = document.createElement("td");
                        var td2 = document.createElement("td");
                        var td3 = document.createElement("td");
                        td1.innerHTML = retour[i].idCateg;
                        td2.innerHTML = retour[i].dateDepense;
                        td3.innerHTML = retour[i].montant;

                        tr.appendChild(td1);
                        tr.appendChild(td2);
                        tr.appendChild(td3);

                        tbody.appendChild(tr);
                    })(i);
                }

                tableau.appendChild(tbody);
                table.innerHTML = ""; // Effacer le contenu précédent
                table.appendChild(tableau);

            } else {
                document.nom = "Error code " + xhr.status;
            }
        }
    };

    xhr.open("GET", "getDepense.php", true);
    xhr.send(null);
}


        });
    </script>
</head>

<body style="background: linear-gradient(rgba(47, 23, 15, 0.65) 0%, rgba(122,210,52,0.65) 100%), url(&quot;../assets/img/pexels-oziel-gómez-837275.jpg&quot;);">
    <?php include 'header-user.php'; ?>
    <h1 class="text-center text-white d-none d-lg-block site-heading"><span class="text-primary site-heading-upper mb-3"></span></h1>
    <section class="position-relative py-4 py-xl-5">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-5">
                        <div class="card-body d-flex flex-column align-items-center" style="width: 881px;transform: translate(-229px);background: #f4f4f4;border-color: var(--bs-body-bg);">
                            <div class="col-md-8 col-xl-6 text-center mx-auto">
                                <h2 style="color: #009e49;font-family: Amethysta, serif;font-size: 40.1px;transform: translate(1px);border-color: rgb(2,2,0);font-weight: bold;">INSERTION DEPENSE</h2>
                                <p class="w-lg-50" style="color: rgb(230,230,230);"></p>
                            </div>
                            <section class="py-4 py-xl-5">
                                <div class="container">
                                    <div class="bg-dark border rounded border-0 border-dark overflow-hidden">
                                        <div class="row g-0">
                                            <div class="col-md-6" style="color: #d3d1aa;background: #fbfbfb;">

                                            <form id="formulaire">
                                                <div class="text-white p-4 p-md-5" style="width: 413.5px;"><label class="form-label" style="color: rgb(47,45,45);padding: 6px;">Categories
                                                        <select name="categories">
                                                            <?php 
                                                                include('../Function/function.php');
                                                                $table = getData($dbh, "categDepense") ;
                                                                foreach ($table as $tablee) { ?>
                                                                    <option value="<?php echo($tablee['idCateg']); ?>" > <?php echo($tablee['nomCateg']); ?> </option>
                                                            <?php     
                                                                }
                                                            ?>
                                                        </select>
                                                        </label> 
                                                </div>
                                                    <div><label class="form-label text-center" style="color: rgb(57,52,52);text-align: center;padding: 5px;">Date depense</label><input type="date" name="dateDepense"></div>
                                                    <div class="input-group"></div>
                                                    <div class="input-group"></div>
                                                    <div class="input-group"><span class="input-group-text" style="width: 106.4px;">Montant</span><input class="form-control" type="number" min="0" placeholder="sasissez un nombre" name="montant"></div>
                                                    <input type="submit" style="width : 316px; height : 50px;">
                                                </div>
                                            </form>
                                            <div class="col-md-6 order-first order-md-last" style="min-height: 250px;"><img class="w-100 h-100 fit-cover" src="../assets/img/intro.jpg" style="background: #f2eaea;"></div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <div class="text-white bg-dark border rounded border-0 p-4 p-md-5" style="width: 770px;transform: translate(-36px);margin-left: 78px;">
                                <h2 class="fw-bold text-white mb-3">LISTE DES CATEGORIES</h2>
                                <p class="mb-4"><span style="text-decoration: underline;">Tableau recapitulatif :</span></p>
                                <div class="table-responsive" style="background: #ffffff;" id="tableau">
                                    
                                </div>
                                <div class="my-3"></div>
                            </div>
                        </div>
                    </div>
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
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/current-day.js"></script>
</body>

</html>