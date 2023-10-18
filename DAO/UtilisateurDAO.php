<?php

require_once('Model/Utilisateur.php');

class UtilisateurDAO {

    private $connexion;

    public function __construct($connexion) {
        $this->connexion = $connexion;
    }

    // Insérer un utilisateur
    public function createUtilisateur(Utilisateur $utilisateur) {
        try {
            $sql = "INSERT INTO utilisateurs (login_utilisateur, mot_de_passe_utilisateur, id_role) VALUES (:login_utilisateur, :mot_de_passe_utilisateur, :id_role)";
            $stmt = $this->connexion->getConnexion()->prepare($sql);
            $stmt->bindParam(':login_utilisateur', $utilisateur->getLogin_utilisateur());
            $stmt->bindParam(':mot_de_passe_utilisateur', $utilisateur->getMot_de_passe_utilisateur());
            $stmt->bindParam(':id_role', $utilisateur->getId_role());
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erreur lors de l'insertion : " . $e->getMessage();
            return false;
        }
    }

    // Obtenir un utilisateur par son ID
    public function getUtilisateurById($id) {
        try {
            $sql = "SELECT * FROM utilisateurs WHERE id_utilisateur = :id_utilisateur";
            $stmt = $this->connexion->getConnexion()->prepare($sql);
            $stmt->bindParam(':id_utilisateur', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération : " . $e->getMessage();
            return null;
        }
    }
    // Cette méthode permet de récupérer un utilisateur en fonction de son nom d'utilisateur (login)
    public function getUtilisateurByLogin($login) {
        try {
            $sql = "SELECT * FROM utilisateurs WHERE login_utilisateur = :login_utilisateur";
            $stmt = $this->connexion->getConnexion()->prepare($sql);
            $stmt->bindParam(':login_utilisateur', $login);
            $stmt->execute();

            // Utilisation de fetch pour récupérer un seul résultat (car le login est supposé être unique)
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            // Gérez l'erreur de base de données ici (par exemple, enregistrer le message d'erreur dans les logs)
            echo "Erreur lors de la récupération de l'utilisateur : " . $e->getMessage();
            return null;
        }
    }

    // Mettre à jour un utilisateur
    public function updateUtilisateur(Utilisateur $utilisateur) {
        try {
            $sql = "UPDATE utilisateurs SET login_utilisateur = :login_utilisateur, mot_de_passe_utilisateur = :mot_de_passe_utilisateur, id_role = :id_role WHERE id_utilisateur = :id_utilisateur";
            $stmt = $this->connexion->getConnexion()->prepare($sql);
            $stmt->bindParam(':login_utilisateur', $utilisateur->getLogin_utilisateur());
            $stmt->bindParam(':mot_de_passe_utilisateur', $utilisateur->getMot_de_passe_utilisateur());
            $stmt->bindParam(':id_role', $utilisateur->getId_role());
            $stmt->bindParam(':id_utilisateur', $utilisateur->getId_utilisateur());
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erreur lors de la mise à jour : " . $e->getMessage();
            return false;
        }
    }

    // Supprimer un utilisateur
    public function deleteUtilisateur($id) {
        try {
            $sql = "DELETE FROM utilisateurs WHERE id_utilisateur = :id_utilisateur";
            $stmt = $this->connexion->getConnexion()->prepare($sql);
            $stmt->bindParam(':id_utilisateur', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erreur lors de la suppression : " . $e->getMessage();
            return false;
        }
    }

    // Récupérer tous les utilisateurs
    public function findAllUtilisateurs() {
        try {
            $sql = "SELECT * FROM utilisateurs";
            $stmt = $this->connexion->getConnexion()->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération de tous les utilisateurs : " . $e->getMessage();
            return array(); // Retourne un tableau vide en cas d'erreur
        }
    }
}
