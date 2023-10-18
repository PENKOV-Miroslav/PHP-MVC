<?php

require_once('DAO/UtilisateurDAO.php');

class AuthController {
    private $connexion;

    public function __construct() {
                // Remplacez ces informations par les vôtres
                $host = 'localhost';
                $db_name = 'raid_ckc';
                $username = 'raid_ckc';
                $password = 'raid_ckc';
                $this->connexion = new ConnexionBDD($host, $db_name, $username, $password);
    }

    public function login() {
        // Vérifie si le formulaire a été soumis
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $login = $_POST["login"];
            $mot_de_passe = $_POST["mot_de_passe"];

            $utilisateurDAO = new UtilisateurDAO($this->connexion);

            // Recherche de l'utilisateur dans la base de données
            $utilisateur = $utilisateurDAO->getUtilisateurByLogin($login);

            if ($utilisateur !== null && password_verify($mot_de_passe, $utilisateur["mot_de_passe_utilisateur"])) {
                // L'utilisateur est authentifié, vous pouvez rediriger vers une page d'accueil, par exemple
                header("Location: accueil");
                exit;
            } else {
                // Identifiants incorrects, afficher un message d'erreur
                $erreur = "Identifiants incorrects";
            }
        }
    }

    public function inscription() {
        $erreur = '';

        // Vérifie si le formulaire d'inscription a été soumis
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["inscription"])) {
            $login = $_POST["login"];
            $mot_de_passe = $_POST["mot_de_passe"];

            // Hachez le mot de passe avec Bcrypt
            $mot_de_passe_hache = password_hash($mot_de_passe, PASSWORD_BCRYPT);

            $utilisateurDAO = new UtilisateurDAO($this->connexion);

            // Vérifie si l'utilisateur existe déjà
            if ($utilisateurDAO->getUtilisateurByLogin($login) !== null) {
                $erreur = "Cet utilisateur existe déjà";
            } else {
                // Inscrire l'utilisateur dans la base de données
                $utilisateur = new Utilisateur(null, $login, $mot_de_passe_hache, 1); // 1 pour un rôle utilisateur
                $result = $utilisateurDAO->createUtilisateur($utilisateur);

                if ($result) {
                    // Redirigez l'utilisateur vers la page de connexion
                    header("Location: login");
                    exit;
                } else {
                    $erreur = "Erreur lors de l'inscription";
                }
            }
        }

    }
}