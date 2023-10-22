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
        $pageTitle = 'PageEspaceAdmin';
        $contentFile = 'View/PageEspaceAdmin.php';
        include 'View/template.php';
    }
    public function PageEspaceSecretaire(){
        $pageTitle = 'PageEspaceSecretaire';
        $contentFile = 'View/PageEspaceSecretaire.php';
        include 'View/template.php';
    }
    public function PageEspaceBenevole(){
        $pageTitle = 'PageEspaceBenevole';
        $contentFile = 'View/PageEspaceBenevole.php';
        include 'View/template.php';
    }
    
    public function PageDeconnexion(){
        $pageTitle = 'Deconnexion de votre espace';
        $contentFile = 'View/deconnexion.php';
        include 'View/template.php';
    }

    public function PageAuthentification() {
        $pageTitle = 'Authentification';
        $contentFile = 'View/authentification.php';
        
        // Démarrez la session
        session_start();
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Traitement du formulaire d'authentification
            $login = $_POST['login'];
            $mot_de_passe = $_POST['mot_de_passe'];
    
            $connexion = new ConnexionBDD('localhost', 'raid_ckc', 'raid_ckc', 'raid_ckc');
            $utilisateurDAO = new UtilisateurDAO($connexion);
            $utilisateur = $utilisateurDAO->authentifierUtilisateur($login, $mot_de_passe);
    
            if ($utilisateur) {
                // Authentification réussie
                $_SESSION['user_id'] = $utilisateur['ID_UTILISATEUR'];
                $_SESSION['id_role'] = $utilisateur['ID_ROLE'];
            }
    
            if (isset($_SESSION['user_id'])) {
                // L'utilisateur est déjà authentifié, redirigez-le vers la bonne page d'espace
                $redirection = '?action=PageEspace';
                switch ($_SESSION['id_role']) {
                    case 1:
                        $redirection .= 'Admin';
                        break;
                    case 2:
                        $redirection .= 'Secretaire';
                        break;
                    case 3:
                        $redirection .= 'Benevole';
                        break;
                    default:
                        $_SESSION['error'] = "Rôle non reconnu";
                        $redirection = '?action=authentification'; // Redirection en cas d'erreur
                        break;
                }
    
                header("Location: $redirection");
                exit;
            } else {
                // Authentification échouée
                $_SESSION['error'] = "Mot de passe ou login incorrect";
                $redirection = '?action=authentification'; // Redirection en cas d'erreur
                header("Location: $redirection");
                exit;
            }
        }
    
        include 'View/template.php';
    }
    
    
    public function PageInscription() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_roleHidden = $_POST['id_roleHidden']; // Récupération de l'ID du rôle depuis le champ caché
    
            if ($id_roleHidden == 1) {
                // L'ID du rôle 1 correspond à l'administrateur, ce qui signifie que l'utilisateur est autorisé à s'inscrire.
    
                $login = $_POST['login'];
                $mot_de_passe = $_POST['mot_de_passe'];
                $id_role = $_POST['id_role']; // Récupération de l'ID du rôle depuis le champ caché
                $connexion = new ConnexionBDD('localhost', 'raid_ckc', 'raid_ckc', 'raid_ckc');
                $utilisateurDAO = new UtilisateurDAO($connexion);
    
                try {
                    $inscriptionReussie = $utilisateurDAO->inscrireUtilisateur($login, $mot_de_passe, $id_role);
    
                    if ($inscriptionReussie) {
                        $_SESSION['success'] = "L'inscription a réussi";
                        // Vous pouvez rediriger l'utilisateur vers une autre page si nécessaire.
                        $redirection = '?action=PageEspaceAdmin'; // Redirection en cas d'erreur
                        header("Location: $redirection");
                    } else {
                        $_SESSION['error'] = "L'inscription a échoué";
                    }
                } catch (Exception $e) {
                    $_SESSION['error'] = $e->getMessage();
                }
            } else {
                // L'ID du rôle ne correspond pas à un administrateur, affichez un message d'erreur ou traitez l'utilisateur différemment.
                $_SESSION['error'] = "Vous n'êtes pas autorisé à effectuer cette action en tant qu'administrateur.";
                // Vous pouvez rediriger l'utilisateur vers une autre page si nécessaire.
            }
        } else {
            $_SESSION['error'] = "Vous n'êtes pas autorisé à effectuer cette action";
            $redirection = '?action=authentification'; // Redirection en cas d'erreur
            header("Location: $redirection");
        }
    }
    
    
    
    
    
    
    
}