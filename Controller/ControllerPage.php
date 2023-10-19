<?php
class PageController {

    // Méthodes qui permettent d'afficher le contenu dans la template suivant le choix séléctionner par l'utilisateur

    public function Accueil() {
        $pageTitle = 'Accueil';
        $contentFile = 'View/accueil.php';
        include 'View/template.php';
    }

    public function PageBulletin_inscription() {
        $pageTitle = 'Bulletin d\'inscription';
        $contentFile = 'View/bulletin_inscription.php';
        include 'View/template.php';
    }

    public function PageAuthentification() {
        $pageTitle = 'Authentification';
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérez les données du formulaire
            $login = $_POST['login'];
            $mot_de_passe = $_POST['mot_de_passe'];
    
            // Effectuez l'authentification en vérifiant les données en base de données
            $connexionBDD = new ConnexionBDD('localhost', 'raid_ckc', 'raid_ckc', 'raid_ckc');
            $utilisateurDAO = new UtilisateurDAO($connexionBDD);
            $utilisateur = $utilisateurDAO->authentifierUtilisateur($login, $mot_de_passe);
    
            if ($utilisateur) {
                // L'authentification a réussi, redirigez l'utilisateur vers son espace personnel
                header('Location: espace_personnel.php');
                exit;
            } else {
                // L'authentification a échoué, affichez un message d'erreur
                $errorMessage = 'Login ou mot de passe incorrect.';
                $contentFile = 'View/authentification.php';
                include 'View/template.php';
            }
        } else {
            $contentFile = 'View/authentification.php';
            include 'View/template.php';
        }
    }
    

    public function PageInscription() {
        $pageTitle = 'Enregistrer';
        $contentFile = 'View/inscription.php';
        include 'View/template.php';
    }

    public function PageRFID() {
        $pageTitle = 'Pointage';
        $contentFile = 'View/pointageRfid.php';
        include 'View/template.php';
    }
}