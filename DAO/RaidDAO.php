<?php
require_once('Model/Raid.php');

class RaidDAO {

    private $connexion;

    public function __construct($connexion) {
        $this->connexion = $connexion;
    }

    // Insérer un raid
    public function createRaid(Raid $raid) {
        try {
            $sql = "INSERT INTO raids (libelle_raid) VALUES (:libelle_raid)";
            $stmt = $this->connexion->getConnexion()->prepare($sql);
            $stmt->bindParam(':libelle_raid', $raid->getLibelle_raid());
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erreur lors de l'insertion : " . $e->getMessage();
            return false;
        }
    }

    // Obtenir un raid par son ID
    public function getRaidById($id) {
        try {
            $sql = "SELECT * FROM raids WHERE id_raid = :id_raid";
            $stmt = $this->connexion->getConnexion()->prepare($sql);
            $stmt->bindParam(':id_raid', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération : " . $e->getMessage();
            return null;
        }
    }

    // Mettre à jour un raid
    public function updateRaid(Raid $raid) {
        try {
            $sql = "UPDATE raids SET libelle_raid = :libelle_raid WHERE id_raid = :id_raid";
            $stmt = $this->connexion->getConnexion()->prepare($sql);
            $stmt->bindParam(':libelle_raid', $raid->getLibelle_raid());
            $stmt->bindParam(':id_raid', $raid->getId_raid());
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erreur lors de la mise à jour : " . $e->getMessage();
            return false;
        }
    }

    // Supprimer un raid
    public function deleteRaid($id) {
        try {
            $sql = "DELETE FROM raids WHERE id_raid = :id_raid";
            $stmt = $this->connexion->getConnexion()->prepare($sql);
            $stmt->bindParam(':id_raid', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erreur lors de la suppression : " . $e->getMessage();
            return false;
        }
    }

    // Récupérer tous les raids
    public function findAllRaids() {
        try {
            $sql = "SELECT * FROM raids";
            $stmt = $this->connexion->getConnexion()->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération de tous les raids : " . $e->getMessage();
            return array(); // Retourne un tableau vide en cas d'erreur
        }
    }
}
