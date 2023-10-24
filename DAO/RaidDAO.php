<?php
require_once ('Model/Raid.php');
class RaidDAO {
    private $connexion;

    public function __construct(ConnexionBDD $connexion) {
        $this->connexion = $connexion;
    }

    public function ajouterRaid(Raid $raid) {
        $sql = "INSERT INTO raid (libelle_raid) VALUES (:libelle_raid)";
        $stmt = $this->connexion->connect()->prepare($sql);
        $stmt->bindValue(':libelle_raid', $raid->getLibelle_raid());

        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            // Gérer les erreurs d'insertion
            return false;
        }
    }

    public function modifierRaid(Raid $raid) {
        $sql = "UPDATE raid SET libelle_raid = :libelle_raid WHERE id_raid = :id_raid";
        $stmt = $this->connexion->connect()->prepare($sql);
        $stmt->bindValue(':id_raid', $raid->getId_raid());
        $stmt->bindValue(':libelle_raid', $raid->getLibelle_raid());

        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            // Gérer les erreurs de mise à jour
            return false;
        }
    }

    public function supprimerRaid($id_raid) {
        $sql = "DELETE FROM raid WHERE id_raid = :id_raid";
        $stmt = $this->connexion->connect()->prepare($sql);
        $stmt->bindParam(':id_raid', $id_raid);

        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            // Gérer les erreurs de suppression
            return false;
        }
    }

    public function getRaidParId($id_raid) {
        $sql = "SELECT * FROM raid WHERE id_raid = :id_raid";
        $stmt = $this->connexion->connect()->prepare($sql);
        $stmt->bindParam(':id_raid', $id_raid);

        try {
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Gérer les erreurs de récupération
            return null;
        }
    }

    public function getAllRaids() {
        $sql = "SELECT * FROM raid";
        $stmt = $this->connexion->connect()->query($sql);

        try {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Gérer les erreurs de récupération
            return null;
        }
    }
}
