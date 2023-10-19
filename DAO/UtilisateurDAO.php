<?php
class UtilisateurDAO {
    private $connexion;

    public function __construct(ConnexionBDD $connexion) {
        $this->connexion = $connexion;
    }

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
