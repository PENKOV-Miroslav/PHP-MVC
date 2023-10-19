<?php
class RoleDAO {
    private $connexion;

    public function __construct(ConnexionBDD $connexion) {
        $this->connexion = $connexion;
    }

    public function ajouterRole(Role $role) {
        $sql = "INSERT INTO role (libelle_role) VALUES (:libelle_role)";
        $stmt = $this->connexion->connect()->prepare($sql);
        $stmt->bindParam(':libelle_role', $role->getLibelle_role());

        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            // Gérer les erreurs d'insertion
            return false;
        }
    }

    public function modifierRole(Role $role) {
        $sql = "UPDATE role SET libelle_role = :libelle_role WHERE id_role = :id_role";
        $stmt = $this->connexion->connect()->prepare($sql);
        $stmt->bindParam(':id_role', $role->getId_role());
        $stmt->bindParam(':libelle_role', $role->getLibelle_role());

        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            // Gérer les erreurs de mise à jour
            return false;
        }
    }

    public function supprimerRole($id_role) {
        $sql = "DELETE FROM role WHERE id_role = :id_role";
        $stmt = $this->connexion->connect()->prepare($sql);
        $stmt->bindParam(':id_role', $id_role);

        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            // Gérer les erreurs de suppression
            return false;
        }
    }

    public function getRoleParId($id_role) {
        $sql = "SELECT * FROM role WHERE id_role = :id_role";
        $stmt = $this->connexion->connect()->prepare($sql);
        $stmt->bindParam(':id_role', $id_role);

        try {
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Gérer les erreurs de récupération
            return null;
        }
    }

    public function getAllRoles() {
        $sql = "SELECT * FROM role";
        $stmt = $this->connexion->connect()->query($sql);

        try {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Gérer les erreurs de récupération
            return null;
        }
    }
}
