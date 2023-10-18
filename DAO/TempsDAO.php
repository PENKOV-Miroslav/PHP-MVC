<?php

require_once('Model/Temps.php');

class TempsDAO {

    private $connexion;

    public function __construct($connexion) {
        $this->connexion = $connexion;
    }

    // Insérer un temps
    public function createTemps(Temps $temps) {
        try {
            $sql = "INSERT INTO temps (duree_temps, id_participant, id_epreuve) VALUES (:duree_temps, :id_participant, :id_epreuve)";
            $stmt = $this->connexion->getConnexion()->prepare($sql);
            $stmt->bindParam(':duree_temps', $temps->getDuree_temps());
            $stmt->bindParam(':id_participant', $temps->getId_participant());
            $stmt->bindParam(':id_epreuve', $temps->getId_epreuve());
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erreur lors de l'insertion : " . $e->getMessage();
            return false;
        }
    }

    // Obtenir un temps par son ID
    public function getTempsById($id) {
        try {
            $sql = "SELECT * FROM temps WHERE id_temps = :id_temps";
            $stmt = $this->connexion->getConnexion()->prepare($sql);
            $stmt->bindParam(':id_temps', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération : " . $e->getMessage();
            return null;
        }
    }

    // Mettre à jour un temps
    public function updateTemps(Temps $temps) {
        try {
            $sql = "UPDATE temps SET duree_temps = :duree_temps, id_participant = :id_participant, id_epreuve = :id_epreuve WHERE id_temps = :id_temps";
            $stmt = $this->connexion->getConnexion()->prepare($sql);
            $stmt->bindParam(':duree_temps', $temps->getDuree_temps());
            $stmt->bindParam(':id_participant', $temps->getId_participant());
            $stmt->bindParam(':id_epreuve', $temps->getId_epreuve());
            $stmt->bindParam(':id_temps', $temps->getId_temps());
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erreur lors de la mise à jour : " . $e->getMessage();
            return false;
        }
    }

    // Supprimer un temps
    public function deleteTemps($id) {
        try {
            $sql = "DELETE FROM temps WHERE id_temps = :id_temps";
            $stmt = $this->connexion->getConnexion()->prepare($sql);
            $stmt->bindParam(':id_temps', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erreur lors de la suppression : " . $e->getMessage();
            return false;
        }
    }

    // Récupérer tous les temps
    public function findAllTemps() {
        try {
            $sql = "SELECT * FROM temps";
            $stmt = $this->connexion->getConnexion()->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération de tous les temps : " . $e->getMessage();
            return array(); // Retourne un tableau vide en cas d'erreur
        }
    }
}
