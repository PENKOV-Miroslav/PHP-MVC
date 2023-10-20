<?php

require_once ('Model/Temps.php');

class TempsDAO {
    private $connexion;

    public function __construct(ConnexionBDD $connexion) {
        $this->connexion = $connexion;
    }

    public function ajouterTemps(Temps $temps) {
        $sql = "INSERT INTO temps (duree_temps, id_participant, id_epreuve) VALUES (:duree_temps, :id_participant, :id_epreuve)";
        $stmt = $this->connexion->connect()->prepare($sql);
        $stmt->bindParam(':duree_temps', $temps->getDuree_temps());
        $stmt->bindParam(':id_participant', $temps->getId_participant());
        $stmt->bindParam(':id_epreuve', $temps->getId_epreuve());

        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            // Gérer les erreurs d'insertion
            return false;
        }
    }

    public function modifierTemps(Temps $temps) {
        $sql = "UPDATE temps SET duree_temps = :duree_temps, id_participant = :id_participant, id_epreuve = :id_epreuve WHERE id_temps = :id_temps";
        $stmt = $this->connexion->connect()->prepare($sql);
        $stmt->bindParam(':id_temps', $temps->getId_temps());
        $stmt->bindParam(':duree_temps', $temps->getDuree_temps());
        $stmt->bindParam(':id_participant', $temps->getId_participant());
        $stmt->bindParam(':id_epreuve', $temps->getId_epreuve());

        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            // Gérer les erreurs de mise à jour
            return false;
        }
    }

    public function supprimerTemps($id_temps) {
        $sql = "DELETE FROM temps WHERE id_temps = :id_temps";
        $stmt = $this->connexion->connect()->prepare($sql);
        $stmt->bindParam(':id_temps', $id_temps);

        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            // Gérer les erreurs de suppression
            return false;
        }
    }

    public function getTempsParId($id_temps) {
        $sql = "SELECT * FROM temps WHERE id_temps = :id_temps";
        $stmt = $this->connexion->connect()->prepare($sql);
        $stmt->bindParam(':id_temps', $id_temps);

        try {
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Gérer les erreurs de récupération
            return null;
        }
    }

    public function getAllTemps() {
        $sql = "SELECT * FROM temps";
        $stmt = $this->connexion->connect()->query($sql);

        try {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Gérer les erreurs de récupération
            return null;
        }
    }
}
