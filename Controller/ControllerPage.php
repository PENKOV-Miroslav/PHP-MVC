<?php
class PageController {

    // Méthodes qui permettent d'afficher le contenu dans la template suivant le choix séléctionner par l'utilisateur
    //$connexion = new ConnexionBDD('localhost', 'raid_ckc', 'raid_ckc', 'raid_ckc');
    //$utilisateurDAO = new UtilisateurDAO($connexion);

    public function Accueil() {
        $pageTitle = 'Accueil';
        $contentFile = 'View/accueil.php';
        include 'View/template.php';
    }

    public function TraitementFormulaireInscription() {
        $pageTitle = 'Traitement Inscription';
        $contentFile = 'View/bulletin_inscription.php';
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
            
            if ($utilisateur) {
                // Authentification réussie, redirigez l'utilisateur vers une page appropriée.
                // Vous pouvez également définir des sessions pour gérer la connexion de l'utilisateur.
                // Exemple : $_SESSION['user_id'] = $utilisateur['id_utilisateur'];
            } else {
                // Authentification échouée, affichez un message d'erreur.
                // Vous pouvez ajouter une variable d'erreur à la vue.
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
            $utilisateurDAO = new UtilisateurDAO( $connexion);
            $inscriptionReussie = $utilisateurDAO->inscrireUtilisateur($login, $mot_de_passe, $id_role);
    
            if ($inscriptionReussie) {
                // L'inscription a réussi, redirigez l'utilisateur vers une page appropriée.
            } else {
                // L'inscription a échoué, affichez un message d'erreur.
            }
        }
    
        include 'View/template.php';
    }
    

    public function PageRFID() {
        $pageTitle = 'Pointage';
        $contentFile = 'View/pointageRfid.php';
        include 'View/template.php';
    }
}