function getRFID(){
    $(document).ready(function () {
        $("#sendRFID").click(function () {
            // Récupérer le code RFID depuis l'entrée utilisateur
            var rfidCode = $("#rfidInput").val();
    
            // Envoyer le code RFID en utilisant AJAX
            $.get("ControllerRfid.php", { rfid: rfidCode }, function (data) {
                // Traiter la réponse du serveur (data) ici
                $("#result").html(data);
            });
        });
    });
}

