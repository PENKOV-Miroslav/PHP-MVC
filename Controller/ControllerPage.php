<?php


class PageController {

    public function Accueil() {
        $pageTitle = 'Accueil';
        $contentFile = 'View/accueil.php';
        include 'View/template.php';
    }

    public function TraitementFormulaireInscription() {
            //$pageTitle = 'S\'inscrire au raid';
            //$contentFile = 'View/bulletin_inscription.php';
            //include 'View/template.php';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id_roleHidden = $_POST['id_roleHidden']; // Récupération de l'ID du rôle depuis le champ caché
    
            if ($id_roleHidden == 2) {
            // Récupérer les données soumises par le formulaire
            $categorie_formule = $_POST["categorie_formule"];
            $categorie = $_POST["categorie"];

            // Elements spécifique du capitaine
            $nom = $_POST["nom"];
            $prenom = $_POST["prenom"];
            $date_naissance = $_POST["date_naissance"];
            $adresse = $_POST["adresse"];
            $club = !empty($_POST["club"]) ? $_POST["club"] : null;
            $email = $_POST["email"];
            $tel_capitaine = $_POST["tel_capitaine"];
            $ville_capitaine = $_POST["ville_capitaine"];
            $cp_capitaine = $_POST["cp_capitaine"];
            $certificat_valider_participant_cap = !empty($_POST["certificat_valider_participant_cap"]) ? $_POST["certificat_valider_participant_cap"] : null;
            $id_rfid_cap = !empty($_POST['id_rfid_capitaine']) ? $_POST['id_rfid_capitaine'] : null;
            
            // Elements spécifique de l' equipier
            $nom_equipier = $_POST["nom_equipier"];
            $prenom_equipier = $_POST["prenom_equipier"];
            $date_naissance_equipier = $_POST["date_naissance_equipier"];
            $adresse_equipier = $_POST["adresse_equipier"];
            $club_equipier = !empty($_POST["club_equipier"]) ? $_POST["club_equipier"] : null;
            $email_equipier = $_POST["email_equipier"];
            $tel_equipier = $_POST["tel_equipier"];
            $ville_equipier = $_POST["ville_equipier"];
            $cp_equipier = $_POST["cp_equipier"];
            $certificat_valider_participant = !empty($_POST['certificat_valider_participant']) ? $_POST['certificat_valider_participant'] : null;
            $id_rfid = !empty($_POST['id_rfid_equipier']) ? $_POST['id_rfid_equipier'] : null;

            
            // On va effectuer des validations ici pour les champs obligatoires
            if (empty($nom) || empty($prenom) || empty($email) || empty($tel_capitaine)) {
                // Si des champs obligatoires sont vides, vous pouvez afficher un message d'erreur.
                echo "Veuillez remplir tous les champs obligatoires.";
            } else {
                // Si toutes les validations sont réussies, vous pouvez traiter les données.
                // Par exemple,enregistrer les données dans une base de données
                $connexion = new ConnexionBDD('localhost', 'raid_ckc', 'raid_ckc', 'raid_ckc');
                $equipeDAO = new EquipeDAO($connexion);
                $equipe = new Equipe(null,$categorie_formule, $categorie);
                $equipeDAO->ajouterEquipe($equipe);
                $id_equipe= $equipe->getId_equipe();

                $participantDAO = new ParticipantDAO($connexion);

                $participantCap = new Participant(
                    $nom, $prenom, $date_naissance, $adresse, $cp_capitaine, $ville_capitaine, $tel_capitaine,
                     $certificat_valider_participant_cap, $club ,$id_rfid_cap, $email, $id_equipe
                );
                $participantEqu = new Participant(
                   $nom_equipier, $prenom_equipier, $date_naissance_equipier, $adresse_equipier, $cp_equipier, $ville_equipier, $tel_equipier,
                   $certificat_valider_participant, $club_equipier, $id_rfid, $email_equipier, $id_equipe
                );
                
                $participant1 = $participantDAO->ajouterParticipant($participantCap);
                $participant2 = $participantDAO->ajouterParticipant($participantEqu);
                $_SESSION['succes'] = "Participant ajouter";
                exit;
            }
        } else{
            $_SESSION['error'] = "Vous n'êtes pas autorisé à effectuer cette action";
            $redirection = '?action=authentification'; // Redirection en cas d'erreur
            header("Location: $redirection");
        }
    }
}

public function PageRFID() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Récupérer le code RFID envoyé via POST
        $rfidCode = $_POST['rfid'];
        $connexion = new ConnexionBDD('localhost', 'raid_ckc', 'raid_ckc', 'raid_ckc');
        $participantDAO = new ParticipantDAO($connexion);

        // Recherchez l'ID participant associé à l'ID RFID
        $participantDAO = new ParticipantDAO($connexion);
        $participantId = $participantDAO->getParticipantIdByRFID($rfidCode);

        if ($participantId) {
            // Insérez le temps en utilisant l'ID du participant
            $dureeTemps = '20:20:20';
            $epreuveId = '2';
            $temps = new Temps($dureeTemps, $participantId, $epreuveId);
            $tempsDAO = new TempsDAO($connexion);
            $tempsDAO->ajouterTemps($temps);

            // Répondre avec succès
            echo "Temps enregistré avec succès pour le participant avec l'ID RFID : " . htmlspecialchars($rfidCode);
            // Attendre 3 secondes avant de rediriger
            sleep(3);

            // Rediriger vers la page PageEspaceBenevole.php
            header("Location: ?action=PageEspaceBenevole");
            exit;
        } else {
            // Répondre avec un message d'erreur si l'ID RFID n'a pas été trouvé
            echo "ID RFID non trouvé dans la base de données.";
        }
    }
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
                $_SESSION['error'] = "Vous n'êtes pas autorisé à effectuer cette action";
                // Vous pouvez rediriger l'utilisateur vers une autre page si nécessaire.
            }
        } else {
            $_SESSION['error'] = "Vous n'êtes pas autorisé à effectuer cette action";
            $redirection = '?action=authentification'; // Redirection en cas d'erreur
            header("Location: $redirection");
        }
    }
    
    
    
    
    
    
    
}