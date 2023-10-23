    <?php
    session_start();

    if (isset($_SESSION['user_id']) && $_SESSION['id_role'] === 3) {
    $id_role = $_SESSION['id_role'];
    // L'utilisateur est authentifié en tant qu'Benevole, affichez le contenu de l'espace admin
    ?>
    <p>Vous êtes connecté en tant que Benevole.</p>
    <!-- Contenu spécifique pour l'espace Benevole -->
    <button id="btnAfficherInscription" onclick="afficherPageInscription()">Inscrire un nouveau compte</button>
<div id="resultatInscription"></div>

    <a class="btn btn-danger" href="?action=deconnexion">Déconnexion</a>
    <?php
        } else {
            // L'utilisateur n'est pas authentifié en tant que Benevole, redirigez-le vers la page d'authentification
            $redirection = '?action=authentification'; // Redirection en cas d'erreur
            header("Location: $redirection");
            exit;
        }
    ?>