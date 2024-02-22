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

        xhr.open("POST", "trait-insert-cueilleur.php");
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
                th1.innerHTML = "<span style='color: rgb(0, 0, 0);'>Nom Cueilleur</span>";
                th2.innerHTML = "<span style='color: rgb(0, 0, 0);'>Date de naissance</span>";
                th3.innerHTML = "<span style='color: rgb(0, 0, 0);'>Genre</span>";
                th4.innerHTML = "Update";
                th5.innerHTML = "Delete";
                tr.appendChild(th1);
                tr.appendChild(th2);
                tr.appendChild(th3);
                tr.appendChild(th4);
                tr.appendChild(th5);
                thead.appendChild(tr);
                tableau.appendChild(thead);

                var tbody = document.createElement("tbody");

                for (var i = 0; i < retour.length; i++) {
                    (function(index){
                        var indice= retour[i].idCueilleur;
                        
                        var tr = document.createElement("tr");
                        var td1 = document.createElement("td");
                        var td2 = document.createElement("td");
                        var td3 = document.createElement("td");
                        var td4 = document.createElement("td");
                        var td5 = document.createElement("td");
                        td1.innerHTML = retour[i].nomCueilleur;
                        td2.innerHTML = retour[i].dateDeNaissance;
                        td3.innerHTML = retour[i].genre;

                        var updateButton = document.createElement("button");
                        updateButton.className = "btn btn-primary";
                        updateButton.type = "button";
                        updateButton.innerHTML = "Update";
                        td4.appendChild(updateButton);

                        var deleteButton = document.createElement("button");
                        deleteButton.className = "btn btn-primary";
                        deleteButton.type = "button";
                        deleteButton.innerHTML = "Delete";
                        td5.appendChild(deleteButton);

                        tr.appendChild(td1);
                        tr.appendChild(td2);
                        tr.appendChild(td3);
                        tr.appendChild(td4);
                        tr.appendChild(td5);

                        tbody.appendChild(tr);

                        updateButton.addEventListener("click", function() {
                            // Logique à exécuter lors du clic sur le bouton Update
                            console.log("Update button clicked for row " + indice);
                            // Ajoutez votre logique de mise à jour ici
                        });

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

    xhr.open("GET", "getCueilleur.php", true);
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


                xhr.open("GET", "supprimer-cueilleur.php?idsup=" + id, true);
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
                                        <div class="row g-0" style="background: var(--bs-green);">
                                            <div class="col-md-6 col-xl-12" style="color: #d3d1aa;background: #fbfbfb;">
                                                <section class="position-relative py-4 py-xl-5" style="background: var(--bs-green);width: 784.9px;">
                                                    <div class="container position-relative">
                                                        <div class="row mb-5">
                                                            <div class="col-md-8 col-xl-6 text-center mx-auto" style="background: #2b4c3f;">
                                                                <h2 style="border-bottom-color: var(--bs-emphasis-color);">Gestion</h2>
                                                                <p class="w-lg-50">Cueilleurs</p>
                                                            </div>
                                                        </div>
                                                        <div class="row d-flex justify-content-center">
                                                            <div class="col-md-6 col-lg-5 col-xl-4" style="width: 354.9px;">
                                                                <div>
                                                                    <form class="p-3 p-xl-4" method="post" id="formulaire"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-person-vcard" style="font-size: 87px;transform: translate(100px);margin-bottom: 27px;">
                                                                            <path d="M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5ZM9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8Zm1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5Z"></path>
                                                                            <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96c.026-.163.04-.33.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1.006 1.006 0 0 1 1 12V4Z"></path>
                                                                        </svg>
                                                                        <div class="mb-3"><input class="form-control" type="text" id="name-1" name="nomCueilleur" placeholder="Nom cueilleur" style="margin-bottom: 11px;"></div><label class="form-label">Date de naissance :</label><input class="form-control" type="date" name="dateNaissance"><input class="form-control" type="number" name="poidsMin" placeholder="Poids min">
                                                                        <div style="margin-bottom: 12px;"><label class="form-label">Genre :</label><select class="form-select" name="genre">
                                                                                <option value="homme" selected="">Homme</option>
                                                                                <option value="femme">Femme</option>
                                                                            </select></div>
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
                            <div class="text-white bg-dark border rounded border-0 p-4 p-md-5" style="width: 701px;transform: translate(-55px);position: sticky;margin-left: 172px;">
                                <h2 class="fw-bold text-white mb-3">RESULTAT GLOBAL</h2>
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