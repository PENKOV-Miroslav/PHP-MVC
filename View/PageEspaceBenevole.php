<?php
session_start();

if (isset($_SESSION['user_id']) && $_SESSION['id_role'] === 3) {
    $id_role = $_SESSION['id_role'];
    // L'utilisateur est authentifié en tant qu'administrateur, affichez le bouton
    ?>
    <p>Vous êtes connecté en tant que Pointeur.</p>
    <a class="btn btn-primary" href="?action=PageEspaceBenevole">Accueil</a>
    <button class="btn btn-primary" id="btnAfficherInscription" onclick="afficherPageRFID()">Page RFID</button>
    <a class="btn btn-danger" href="?action=deconnexion">Déconnexion</a>
    <div id="resultatInscription"></div>

    <?php
} else {
    // L'utilisateur n'est pas authentifié en tant qu'administrateur, redirigez-le vers la page d'authentification
    $redirection = '?action=authentification'; // Redirection en cas d'erreur
    header("Location: $redirection");
    exit;
}