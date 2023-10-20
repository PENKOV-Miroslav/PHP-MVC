<?php


class PageController {

    public function Accueil() {
        $pageTitle = 'Accueil';
        $contentFile = 'View/accueil.php';
        include 'View/template.php';
    }

    public function TraitementFormulaireInscription() {
        $pageTitle = 'S\'inscrire au raid';
        $contentFile = 'View/bulletin_inscription.php';
        include 'View/template.php';
    }

    public function PageRFID() {
        $pageTitle = 'Pointage';
        $contentFile = 'View/pointageRfid.php';
        include 'View/template.php';
    }

    public function PageEspaceAdmin(){
        $pageTitle = 'Pointage';
        $contentFile = 'View/pointageRfid.php';
        include 'View/template.php';
    }
    

    public function PageAuthentification() {
        $pageTitle = 'Authentification';
        $contentFile = 'View/authentification.php';
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Traitement du formulaire d'authentification
            $login = $_POST['login'];
            $mot_de_passe = $_POST['mot_de_passe'];
    
            $connexion = new ConnexionBDD('localhost', 'raid_ckc', 'raid_ckc', 'raid_ckc');
            $utilisateurDAO = new UtilisateurDAO($connexion);
            $utilisateur = $utilisateurDAO->authentifierUtilisateur($login, $mot_de_passe);
    
            // Démarrez la session
            session_start();
    
            if ($utilisateur) {
                // Authentification réussie
                $_SESSION['user_id'] = $utilisateur['ID_UTILISATEUR'];
                $_SESSION['id_role'] = $utilisateur['ID_ROLE'];
    
                if (isset($_SESSION['user_id'])) {
                    // L'utilisateur est déjà authentifié, redirigez-le vers la bonne page d'espace
                    if ($_SESSION['id_role'] == 1) {
                        header('Location: View/PageEspaceAdmin.php');
                    } elseif ($_SESSION['id_role'] == 2) {
                        header('Location: View/PageEspaceSecretaire.php');
                    } elseif ($_SESSION['id_role'] == 3) {
                        header('Location: View/PageEspaceBenevole.php');
                    }
                    exit;
                } else {
                    // Authentification échouée
                    $_SESSION['error'] = "Mot de passe ou login incorrect";
                    header('Location: authentification.php');
                    exit;
                }
            }
        }
    
        include 'View/template.php';
    }
      
    

    public function PageInscription() {
        $pageTitle = 'Inscription';
        $contentFile = 'View/inscription.php';
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Traitement du formulaire d'inscription
            $login = $_POST['login'];
            $mot_de_passe = $_POST['mot_de_passe'];
            $id_role = $_POST['id_role']; // Assurez-vous que l'id_role est correctement défini.
    
            $connexion = new ConnexionBDD('localhost', 'raid_ckc', 'raid_ckc', 'raid_ckc');
            $utilisateurDAO = new UtilisateurDAO($connexion);
            
            try {
                $inscriptionReussie = $utilisateurDAO->inscrireUtilisateur($login, $mot_de_passe, $id_role);
    
                if ($inscriptionReussie) {
                    // Rediriger vers la page d'authentification après une inscription réussie
                    header('Location: authentification.php');
                    exit;
                } else {
                    $_SESSION['error'] = "L'inscription a échoué";
                }
            } catch (Exception $e) {
                $_SESSION['error'] = $e->getMessage();
            }
        }
    
        include 'View/template.php';
    }
    
    
}