<?php include('../Function/function.php') ?>
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
                        alert("paiement inséré avec succès");
                        afficherData();
                    } else {
                        alert("non");
                        alert(response);
                    }
                } else {
                    console.error('Erreur de connexion au serveur');
                }
            }
        };

        xhr.addEventListener("error", function(event) {
            alert('Oups! Quelque chose s\'est mal passé.');
        });

        xhr.open("POST", "trait-insert-paiement.php");
        xhr.send(formData);
    }

    var form = document.getElementById("formulaire");
    form.addEventListener("submit", function (event) {
        event.preventDefault();
        sendData();
    });  
    
    afficherData();

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
                            var th4 = document.createElement("th");
                            var th5 = document.createElement("th");
                            var th6 = document.createElement("th");
                            var th7 = document.createElement("th");
                            th1.innerHTML = "<span style='color: rgb(3, 3, 3);'>Id Cueillant</span>";
                            th2.innerHTML = "<span style='color: rgb(3, 3, 3);'>Date paiement</span>";
                            th3.innerHTML = "<span style='color: rgb(3, 3, 3);'>Poids</span>";
                            th4.innerHTML = "<span style='color: rgb(3, 3, 3);'>Bonus</span>";
                            th5.innerHTML = "<span style='color: rgb(3, 3, 3);'>Malus</span>";
                            th6.innerHTML = "<span style='color: rgb(3, 3, 3);'>Montant</span>";
                            th7.innerHTML = "Delete";
                            tr.appendChild(th1);
                            tr.appendChild(th2);
                            tr.appendChild(th3);
                            tr.appendChild(th4);
                            tr.appendChild(th5);
                            tr.appendChild(th6);
                            tr.appendChild(th7);
                            thead.appendChild(tr);
                            tableau.appendChild(thead);

                            var tbody = document.createElement("tbody");

                            for (var i = 0; i < retour.length; i++) {
                                (function(index){
                                    var indice = retour[i].idPaiement;
                                    var tr = document.createElement("tr");
                                    var td1 = document.createElement("td");
                                    var td2 = document.createElement("td");
                                    var td3 = document.createElement("td");
                                    var td4 = document.createElement("td");
                                    var td5 = document.createElement("td");
                                    var td6 = document.createElement("td");
                                    var td7 = document.createElement("td");
                                    td1.innerHTML = retour[i].idCueilleur;
                                    td2.innerHTML = retour[i].datePaiement;
                                    td3.innerHTML = retour[i].poids;
                                    td4.innerHTML = retour[i].bonus;
                                    td5.innerHTML = retour[i].malus;
                                    td6.innerHTML = retour[i].montant;

                                    var deleteButton = document.createElement("button");
                                    deleteButton.className = "btn btn-primary";
                                    deleteButton.type = "button";
                                    deleteButton.innerHTML = "Delete";
                                    td7.appendChild(deleteButton);

                                    tr.appendChild(td1);
                                    tr.appendChild(td2);
                                    tr.appendChild(td3);
                                    tr.appendChild(td4);
                                    tr.appendChild(td5);
                                    tr.appendChild(td6);
                                    tr.appendChild(td7);

                                    tbody.appendChild(tr);

                                    deleteButton.addEventListener("click", function() {
                                        // Logique à exécuter lors du clic sur le bouton Delete
                                        console.log("Delete button clicked for row " + indice);
                                        supprimer(indice);
                                    });

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

                xhr.open("GET", "get-paiement.php", true);
                xhr.send(null);
            }

            function supprimer(id){
                var xhr;
                try {
                    xhr = new XMLHttpRequest();
                } catch (e) {
                    xhr = false;
                }

                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4) {
                        if (xhr.status == 200) {
                            var listeProd = xhr.responseText;
                            if (listeProd == "ok") {
                                alert("supprime");
                                afficherData();
                            }else {
                                alert("fghjk");
                                alert(listeProd);
                            }
                        } else {
                            console.error("Error code " + xhr.status);
                        }
                    }
                };


                xhr.open("GET", "supprimer-paiement.php?idsup=" + id, true);
                xhr.send(null);
            }

        });
    
</script>

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
                                                <section class="position-relative py-4 py-xl-5" style="background: var(--bs-green);width: 774.9px;">
                                                    <div class="container position-relative">
                                                        <div class="row mb-5">
                                                            <div class="col-md-8 col-xl-6 text-center mx-auto" style="background: #2b4c3f;">
                                                                <h2 style="border-bottom-color: var(--bs-emphasis-color);">Gestion</h2>
                                                                <p class="w-lg-50">PAYEMENT</p>
                                                            </div>
                                                        </div>
                                                        <div class="row d-flex justify-content-center">
                                                            <div class="col-md-6 col-lg-5 col-xl-4" style="width: 354.9px;">
                                                                <div>
                                                                    <form class="p-3 p-xl-4" id="formulaire">
                                                                        <label class="form-label">Cueilleur :
                                                                        <!-- <div class="mb-3"> -->
                                                                        <select name="idCueilleur">
                                                                            <?php 
                                                                                $table = getData($dbh,"cueilleur");
                                                                                foreach ($table as $row) { 
                                                                            ?>
                                                                                <option value="<?php echo $row['idCueilleur']; ?>"> <?php echo $row['nomCueilleur']; ?> </option>
                                                                            <?php     
                                                                                }
                                                                            ?>
                                                                        </select></label>
                                                                            </br>
                                                                            <label class="form-label">Date Paiement:</label><input class="form-control" type="date" style="margin-bottom: 9px;" name="date"><input class="form-control" type="number" id="name-2" name="poids" placeholder="Poids" style="margin-bottom: 5px;">
                                                                        <div style="margin-bottom: 12px;"></div>
                                                                        <div class="mb-3"></div>
                                                                        <div class="mb-3"></div>
                                                                        <div><input class="btn btn-primary d-block w-100" type="submit" value="Inserer paiement" style="margin-bottom: 5px;"></div>
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
                            <div class="text-white bg-dark border rounded border-0 p-4 p-md-5" style="width: 701px;transform: translate(-55px);position: sticky;margin-left: 172px;">
                                <h2 class="fw-bold text-white mb-3">RESULTAT Paiement</h2>
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