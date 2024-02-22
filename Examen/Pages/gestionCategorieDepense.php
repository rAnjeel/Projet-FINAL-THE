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
    
                xhr.open("POST", "trait-insert-categDepense.php");
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
                            th1.innerHTML = "<span style='color: rgb(3, 3, 3);'>Nom categorie</span>";
                            th2.innerHTML = "Update";
                            th3.innerHTML = "Delete";
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
                                    td1.innerHTML = retour[i].nomCateg;

                                    var updateButton = document.createElement("button");
                                    updateButton.className = "btn btn-primary";
                                    updateButton.type = "button";
                                    updateButton.innerHTML = "Update";
                                    td2.appendChild(updateButton);

                                    var deleteButton = document.createElement("button");
                                    deleteButton.className = "btn btn-primary";
                                    deleteButton.type = "button";
                                    deleteButton.innerHTML = "Delete";
                                    td3.appendChild(deleteButton);

                                    tr.appendChild(td1);
                                    tr.appendChild(td2);
                                    tr.appendChild(td3);

                                    tbody.appendChild(tr);

                                    updateButton.addEventListener("click", function() {
                                        // Logique à exécuter lors du clic sur le bouton Update
                                        console.log("Update button clicked for row " + index);
                                        // Ajoutez votre logique de mise à jour ici
                                    });

                                    deleteButton.addEventListener("click", function() {
                                        // Logique à exécuter lors du clic sur le bouton Delete
                                        console.log("Delete button clicked for row " + index);
                                        // Ajoutez votre logique de suppression ici
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

                xhr.open("GET", "getCategorieDepense.php", true);
                xhr.send(null);
            }

        });
    </script>
</head>

<body style="background: linear-gradient(rgba(47, 23, 15, 0.65) 0%, rgba(122,210,52,0.65) 100%), url(&quot;../assets/img/pexels-oziel-gómez-837275.jpg&quot;);">
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
                                                                <h2 style="border-bottom-color: var(--bs-emphasis-color);">Gestion</h2>
                                                                <p class="w-lg-50">CATEGORIES DEPENSES</p>
                                                            </div>
                                                        </div>
                                                        <div class="bs-icon-md bs-icon-rounded bs-icon-primary d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block bs-icon" style="background: rgb(115,230,86);transform: translate(352px);"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-currency-dollar" style="font-size: 32px;">
                                                                <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"></path>
                                                            </svg></div>
                                                        <div class="row d-flex justify-content-center">
                                                            <div class="col-md-6 col-lg-5 col-xl-4" style="width: 354.9px;">
                                                                <div>
                                                                    <form class="p-3 p-xl-4"id="formulaire">
                                                                        <div class="mb-3"><input class="form-control" type="text" id="name-1" name="nomCategorie" placeholder="Nom Categorie"></div>
                                                                        <div style="margin-bottom: 12px;"></div>
                                                                        <div class="mb-3"></div>
                                                                        <div class="mb-3"></div>
                                                                        <input type="submit" style="width : 316px; height : 50px;">
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
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/current-day.js"></script>
</body>

</html>