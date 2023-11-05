function init(){
    console.log("init start");
}

function getRFID() {
    $(document).ready(function () {
        $("#sendRFID").click(function () {
            // Récupérer le code RFID depuis l'entrée utilisateur
            var rfidCode = $("#rfidInput").val();

            // Envoyer le code RFID en utilisant AJAX
            $.post("?action=rfid", { rfid: rfidCode }, function (data) {
                // Traiter la réponse du serveur (data) ici
                $("#result").html(data);
            });
        });
    });
}

function afficherPageChronometre(){
    console.log('Fonction afficherPageChrono exécutée');
    $.ajax({
        url: 'View/chronometreDebArret.php', // Assurez-vous que c'est le bon chemin d'accès
        type: 'GET',
        success: function (data) {
            $('#resultatInscription').html(data); // Insérez le contenu de la page d'inscription dans l'élément avec l'ID "resultatInscription"
        },
        error: function (xhr, status, error) {
            console.log(error); // En cas d'erreur, affichez l'erreur dans la console
        }
    });
}

function afficherPageInscription() {
    console.log('Fonction afficherPageInscription exécutée');
    $.ajax({
        url: 'View/inscription.php', // Assurez-vous que c'est le bon chemin d'accès
        type: 'GET',
        success: function (data) {
            $('#resultatInscription').html(data); // Insérez le contenu de la page d'inscription dans l'élément avec l'ID "resultatInscription"
        },
        error: function (xhr, status, error) {
            console.log(error); // En cas d'erreur, affichez l'erreur dans la console
        }
    });
}

function afficherPageInscriptionParticipant() {
    console.log('Fonction afficherPageInscriptionParticipant exécutée');
    $.ajax({
        url: 'View/bulletin_inscription.php',
        type: 'GET',
        success: function (data) {
            $('#resultatInscription').html(data);
        },
        error: function (xhr, status, error) {
            console.log(error); // En cas d'erreur, affichez l'erreur dans la console
        }
    });
}

function afficherPageRFID() {
    console.log('Fonction afficherPageRFID exécutée');
    $.ajax({
        url: 'View/pointageRfid.php',
        type: 'GET',
        success: function (data) {
            $('#resultatInscription').html(data);
        },
        error: function (xhr, status, error) {
            console.log(error); // En cas d'erreur, affichez l'erreur dans la console
        }
    });
}

// Lorsque le document est prêt, on ajoute des écouteurs d'événements aux éléments de filtrage. A chaque clique sur un des filtres, les données seront mises à jour
$(document).ready(function() {
    $("#temps-type, #categorie, #circuit, #epreuve").on("change click", updateResults);
    updateResults();
});

function updateResults() {
    // Récupérer les valeurs des filtres
    const tempsType = $("#temps-type").val();
    const categorie = $("#categorie").val();
    const circuit = $("#circuit").val();
    const epreuve = $("#epreuve").val();

    // Utilisation d'AJAX pour envoyer les valeurs des filtres au script PHP côté serveur
    $.ajax({
        type: "POST",
        url: "DAO/get_results.php",
        data: {
            tempsType: tempsType,
            categorie: categorie,
            circuit : circuit,
            epreuve : epreuve
        },
        success: function (data) {
            // Met à jour le contenu du tableau HTML (#results-table) avec les données reçues du script PHP
            $("#results-table tbody").html(data);
        },
        error: function (xhr, status, error) {
            console.log(error); // En cas d'erreur, affichez l'erreur dans la console
        }
    });
}

function redirigerApresAttente() {
    setTimeout(function() {
        window.location = "?action=PageEspaceBenevole";
    }, 3000);
}