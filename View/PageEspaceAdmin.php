<?php
session_start();

if (isset($_SESSION['user_id']) && $_SESSION['id_role'] === 1) {
    $id_role = $_SESSION['id_role'];
    // L'utilisateur est authentifié en tant qu'administrateur, affichez le contenu de l'espace admin
    ?>
    <p>Vous êtes connecté en tant qu'administrateur.</p>
    <!-- Contenu spécifique pour l'espace admin -->
    <a class="btn btn-primary" href="?action=inscription">Inscrire un nouveau compte</a>
    <a href="?action=deconnexion">Déconnexion</a>
    <?php
} else {
    // L'utilisateur n'est pas authentifié en tant qu'administrateur, redirigez-le vers la page d'authentification
    $redirection = '?action=authentification'; // Redirection en cas d'erreur
    header("Location: $redirection");
    exit;
}