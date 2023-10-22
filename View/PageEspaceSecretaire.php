<?php
    session_start();

    if (isset($_SESSION['user_id']) && $_SESSION['id_role'] === 2) {
    $id_role = $_SESSION['id_role'];
    // L'utilisateur est authentifié en tant que Secretaire, affichez le contenu de l'espace admin
    ?>
    <p>Vous êtes connecté en tant que Secretaire.</p>
    <!-- Contenu spécifique pour l'espace Secretaire -->
    <button id="btnAfficherInscription" onclick="afficherPageInscription()">Inscrire un nouveau compte</button>
<div id="resultatInscription"></div>

    <a href="?action=deconnexion">Déconnexion</a>
    <?php
        } else {
            // L'utilisateur n'est pas authentifié en tant que Secretaire, redirigez-le vers la page d'authentification
            $redirection = '?action=authentification'; // Redirection en cas d'erreur
            header("Location: $redirection");
            exit;
        }
    ?>