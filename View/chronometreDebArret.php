<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2>Chronomètre</h2>
                        <input type="hidden" id="chronoValue" name="chronoValue" value="00:00:00">
                        <div id="chrono" class="mb-3">00:00:00</div>
                        <button id="startButton" class="btn btn-primary">Lancer le chronomètre</button>
                        <button id="stopButton" class="btn btn-secondary">Arrêter</button>
                        <button id="resetButton" class="btn btn-danger">Réinitialiser</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
    // Variables pour le chronomètre
    var timer; // Référence au timer
    var chrono = $('#chrono');
    var running = false;
    var currentTime = 0;

    // Gestionnaire de clic pour le bouton "Lancer le chronomètre"
    $('#startButton').click(function() {
        if (!running) {
            timer = setInterval(updateChrono, 1000);
            running = true;
        }
    });

    // Gestionnaire de clic pour le bouton "Arrêter"
    $('#stopButton').click(function() {
        if (running) {
            clearInterval(timer);
            running = false;
            // Récupérer la valeur du chronomètre lorsque vous arrêtez le chronomètre
            var chronoValue = chrono.text();
            // Envoyer la valeur du chronomètre à votre contrôleur RFID
            envoyerChronoAuControleur(chronoValue);
        }
    });

    // Gestionnaire de clic pour le bouton "Réinitialiser"
    $('#resetButton').click(function() {
        clearInterval(timer);
        running = false;
        currentTime = 0;
        chrono.text('00:00:00');
    });

    // Fonction pour mettre à jour le chronomètre
    function updateChrono() {
        currentTime += 1;
        var hours = Math.floor(currentTime / 3600);
        var minutes = Math.floor((currentTime % 3600) / 60);
        var seconds = currentTime % 60;
        var formattedTime = formatTime(hours) + ':' + formatTime(minutes) + ':' + formatTime(seconds);
        chrono.text(formattedTime);
        // Mettez à jour la valeur du champ caché
        $('#chronoValue').val(formattedTime);
    }


    // Fonction pour formater le temps en "HH:MM:SS"
    function formatTime(time) {
        return time < 10 ? '0' + time : time;
    }

    // Fonction pour envoyer la valeur du chronomètre au contrôleur RFID
    function envoyerChronoAuControleur(chronoValue) {
        $.ajax({
            type: 'POST',
            url: 'votre_controleur.php', // Remplacez 'votre_controleur.php' par l'URL de votre contrôleur RFID
            data: { chrono: chronoValue }, // Envoyez la valeur du chronomètre
            success: function(data) {
                // Gestion de la réponse du contrôleur ici
            },
            error: function() {
                // Gérez les erreurs de requête AJAX ici
            }
        });
    }
});

    </script>