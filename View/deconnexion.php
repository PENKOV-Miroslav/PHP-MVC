<?php
session_start();
if (session_status() == PHP_SESSION_ACTIVE) {
    // Détruire la session si elle est active
    session_destroy();
}
?>
<div role="alert">
    <p>Vous avez bien été déconnecté ! <a href="index.php">Cliquez ici</a>
        pour revenir à la page de connexion.</p>
</div>
<?php
header("Refresh: 3; URL=index.php");
