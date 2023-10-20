<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    // L'utilisateur n'est pas authentifié, redirigez-le vers la page d'authentification
    header('Location: View/authentification.php');
    exit;
}
?>

<h1>Bienvenue dans l'Espace Bénévole</h1>
    <p>Vous êtes connecté en tant que bénévole.</p>
    <!-- Contenu spécifique pour l'espace bénévole -->

<a href="deconnexion.php">Déconnexion</a>