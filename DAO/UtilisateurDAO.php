<?php

require_once ('Model/Utilisateur.php');

class UtilisateurDAO {
    private $connexion;

    public function __construct(ConnexionBDD $connexion) {
        $this->connexion = $connexion;
    }
    
    public function authentifierUtilisateur($login, $mot_de_passe) {
        $sql = "SELECT * FROM utilisateur WHERE login_utilisateur = :login_utilisateur";
        $stmt = $this->connexion->connect()->prepare($sql);
        $stmt->bindParam(':login_utilisateur', $login);
        
        try {
            $stmt->execute();
            $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($utilisateur && password_verify($mot_de_passe, $utilisateur['MOT_DE_PASSE_UTILISATEUR'])) {
                return $utilisateur;
            } else {
                return null; // Authentification échouée
            }
        } catch (PDOException $e) {
            // Gérer les erreurs de requête
            return null;
        }
    }
    
    

    public function inscrireUtilisateur($login, $mot_de_passe, $id_role) {
        // Vérifiez d'abord si l'utilisateur avec le même login existe déjà
        $sql = "SELECT * FROM utilisateur WHERE login_utilisateur = :login_utilisateur";
        $stmt = $this->connexion->connect()->prepare($sql);
        $stmt->bindParam(':login_utilisateur', $login);
        $stmt->execute();
        $existingUser = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($existingUser) {
            return false; // Utilisateur avec le même login existe déjà
        }
        // Si l'utilisateur n'existe pas, vous pouvez insérer les données dans la base de données
        $mot_de_passe_hache = password_hash($mot_de_passe, PASSWORD_DEFAULT);
        $sql = "INSERT INTO utilisateur (login_utilisateur, mot_de_passe_utilisateur, id_role) VALUES (:login_utilisateur, :mot_de_passe, :id_role)";
        $stmt = $this->connexion->connect()->prepare($sql);
        $stmt->bindParam(':login_utilisateur', $login);
        $stmt->bindParam(':mot_de_passe', $mot_de_passe_hache);
        $stmt->bindParam(':id_role', $id_role);
        try {
            $stmt->execute();
            return true; // L'inscription a réussi
        } catch (PDOException $e) {
            throw new Exception("Erreur d'insertion : " . $e->getMessage());
        }
        
    }
    


    /*********************************** CRUD *******************************************/

    public function ajouterUtilisateur(Utilisateur $utilisateur) {
        $sql = "INSERT INTO utilisateur (login_utilisateur, mot_de_passe_utilisateur, id_role) VALUES (:login_utilisateur, :mot_de_passe_utilisateur, :id_role)";
        $stmt = $this->connexion->connect()->prepare($sql);
        $stmt->bindParam(':login_utilisateur', $utilisateur->getLogin_utilisateur());
        $stmt->bindParam(':mot_de_passe_utilisateur', $utilisateur->getMot_de_passe_utilisateur());
        $stmt->bindParam(':id_role', $utilisateur->getId_role());

        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            // Gérer les erreurs d'insertion
            return false;
        }
    }

    public function modifierUtilisateur(Utilisateur $utilisateur) {
        $sql = "UPDATE utilisateur SET login_utilisateur = :login_utilisateur, mot_de_passe_utilisateur = :mot_de_passe_utilisateur, id_role = :id_role WHERE id_utilisateur = :id_utilisateur";
        $stmt = $this->connexion->connect()->prepare($sql);
        $stmt->bindParam(':id_utilisateur', $utilisateur->getId_utilisateur());
        $stmt->bindParam(':login_utilisateur', $utilisateur->getLogin_utilisateur());
        $stmt->bindParam(':mot_de_passe_utilisateur', $utilisateur->getMot_de_passe_utilisateur());
        $stmt->bindParam(':id_role', $utilisateur->getId_role());

        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            // Gérer les erreurs de mise à jour
            return false;
        }
    }

    public function supprimerUtilisateur($id_utilisateur) {
        $sql = "DELETE FROM utilisateur WHERE id_utilisateur = :id_utilisateur";
        $stmt = $this->connexion->connect()->prepare($sql);
        $stmt->bindParam(':id_utilisateur', $id_utilisateur);

        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            // Gérer les erreurs de suppression
            return false;
        }
    }

    public function getUtilisateurParId($id_utilisateur) {
        $sql = "SELECT * FROM utilisateur WHERE id_utilisateur = :id_utilisateur";
        $stmt = $this->connexion->connect()->prepare($sql);
        $stmt->bindParam(':id_utilisateur', $id_utilisateur);

        try {
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Gérer les erreurs de récupération
            return null;
        }
    }

    public function getAllUtilisateurs() {
        $sql = "SELECT * FROM utilisateur";
        $stmt = $this->connexion->connect()->query($sql);

        try {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Gérer les erreurs de récupération
            return null;
        }
    }
}
