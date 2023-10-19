<?php
class PageController {

    // Méthodes qui permettent d'afficher le contenu dans la template suivant le choix séléctionner par l'utilisateur

    public function Accueil() {
        $pageTitle = 'Accueil';
        $contentFile = 'View/accueil.php';
        include 'View/template.php';
    }

    public function TraitementFormulaireInscription() {
        $pageTitle = 'Traitement Inscription';
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérez les données du formulaire
            $categorie_formule = $_POST['categorie_formule'];
            $categorie = $_POST['categorie'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $date_naissance = $_POST['date_naissance'];
            $adresse = $_POST['adresse'];
            $club = $_POST['club'];
            $email = $_POST['email'];
    
            $nom_equipier = $_POST['nom_equipier'];
            $prenom_equipier = $_POST['prenom_equipier'];
            $date_naissance_equipier = $_POST['date_naissance_equipier'];
            $adresse_equipier = $_POST['adresse_equipier'];
            $club_equipier = $_POST['club_equipier'];
            $email_equipier = $_POST['email_equipier'];
    
            $tel_capitaine = $_POST['tel_capitaine'];
            $tel_equipier = $_POST['tel_equipier'];
    
            // Vous pouvez effectuer des validations supplémentaires ici, si nécessaire
    
            // Ensuite, vous pouvez insérer les données dans la base de données ou effectuer d'autres actions nécessaires
    
            // Redirigez l'utilisateur vers une page de confirmation ou une autre page appropriée
            header('Location: confirmation.php'); // Remplacez par la page de confirmation
            exit;
        } else {
            $contentFile = 'View/bulletin_inscription.php';
            include 'View/template.php';
        }
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
                include 'View/template.php';
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
        $pageTitle = 'Inscription';
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérez les données du formulaire
            $login = $_POST['login'];
            $mot_de_passe = $_POST['mot_de_passe'];
            $id_role = $_POST['id_role']; // Vous devez avoir un moyen de sélectionner le rôle dans le formulaire
    
            // Inscrivez l'utilisateur
            $connexionBDD = new ConnexionBDD('localhost', 'raid_ckc', 'raid_ckc', 'raid_ckc');
            $utilisateurDAO = new UtilisateurDAO($connexionBDD);
    
            if ($utilisateurDAO->inscrireUtilisateur($login, $mot_de_passe, $id_role)) {
                // L'inscription a réussi, redirigez l'utilisateur vers la page d'authentification ou autre
                header('Location: authentification.php'); // Remplacez avec votre page d'authentification
                exit;
            } else {
                // L'inscription a échoué, affichez un message d'erreur
                $errorMessage = 'L\'inscription a échoué.';
                $contentFile = 'View/inscription.php';
                include 'View/template.php';
            }
        } else {
            $contentFile = 'View/inscription.php';
            include 'View/template.php';
        }
    }
    

    public function PageRFID() {
        $pageTitle = 'Pointage';
        $contentFile = 'View/pointageRfid.php';
        include 'View/template.php';
    }
}