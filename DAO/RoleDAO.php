<?php

require_once('Model/Role.php');

class RoleDAO {

    private $connexion;

    public function __construct($connexion) {
        $this->connexion = $connexion;
    }

    // Insérer un rôle
    public function createRole(Role $role) {
        try {
            $sql = "INSERT INTO roles (libelle_role) VALUES (:libelle_role)";
            $stmt = $this->connexion->getConnexion()->prepare($sql);
            $stmt->bindParam(':libelle_role', $role->getLibelle_role());
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erreur lors de l'insertion : " . $e->getMessage();
            return false;
        }
    }

    // Obtenir un rôle par son ID
    public function getRoleById($id) {
        try {
            $sql = "SELECT * FROM roles WHERE id_role = :id_role";
            $stmt = $this->connexion->getConnexion()->prepare($sql);
            $stmt->bindParam(':id_role', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération : " . $e->getMessage();
            return null;
        }
    }

    // Mettre à jour un rôle
    public function updateRole(Role $role) {
        try {
            $sql = "UPDATE roles SET libelle_role = :libelle_role WHERE id_role = :id_role";
            $stmt = $this->connexion->getConnexion()->prepare($sql);
            $stmt->bindParam(':libelle_role', $role->getLibelle_role());
            $stmt->bindParam(':id_role', $role->getId_role());
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erreur lors de la mise à jour : " . $e->getMessage();
            return false;
        }
    }

    // Supprimer un rôle
    public function deleteRole($id) {
        try {
            $sql = "DELETE FROM roles WHERE id_role = :id_role";
            $stmt = $this->connexion->getConnexion()->prepare($sql);
            $stmt->bindParam(':id_role', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erreur lors de la suppression : " . $e->getMessage();
            return false;
        }
    }

    // Récupérer tous les rôles
    public function findAllRoles() {
        try {
            $sql = "SELECT * FROM roles";
            $stmt = $this->connexion->getConnexion()->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération de tous les rôles : " . $e->getMessage();
            return array(); // Retourne un tableau vide en cas d'erreur
        }
    }
}
