<?php

require_once('Model/Circuit.php');

class CircuitDAO {

    private $connexion;

    public function __construct($connexion) {
        $this->connexion = $connexion;
    }

    // Insérer un circuit
    public function createCircuit(Circuit $circuit) {
        try {
            $sql = "INSERT INTO circuits (libelle_circuit, id_raid) VALUES (:libelle_circuit, :id_raid)";
            $stmt = $this->connexion->getConnexion()->prepare($sql);
            $stmt->bindParam(':libelle_circuit', $circuit->getLibelle_circuit());
            $stmt->bindParam(':id_raid', $circuit->getId_raid());
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erreur lors de l'insertion : " . $e->getMessage();
            return false;
        }
    }

    // Obtenir un circuit par son ID
    public function getCircuitById($id) {
        try {
            $sql = "SELECT * FROM circuits WHERE id_circuit = :id_circuit";
            $stmt = $this->connexion->getConnexion()->prepare($sql);
            $stmt->bindParam(':id_circuit', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération : " . $e->getMessage();
            return null;
        }
    }

    // Mettre à jour un circuit
    public function updateCircuit(Circuit $circuit) {
        try {
            $sql = "UPDATE circuits SET libelle_circuit = :libelle_circuit, id_raid = :id_raid WHERE id_circuit = :id_circuit";
            $stmt = $this->connexion->getConnexion()->prepare($sql);
            $stmt->bindParam(':libelle_circuit', $circuit->getLibelle_circuit());
            $stmt->bindParam(':id_raid', $circuit->getId_raid());
            $stmt->bindParam(':id_circuit', $circuit->getId_circuit());
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erreur lors de la mise à jour : " . $e->getMessage();
            return false;
        }
    }

    // Supprimer un circuit
    public function deleteCircuit($id) {
        try {
            $sql = "DELETE FROM circuits WHERE id_circuit = :id_circuit";
            $stmt = $this->connexion->getConnexion()->prepare($sql);
            $stmt->bindParam(':id_circuit', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erreur lors de la suppression : " . $e->getMessage();
            return false;
        }
    }

    // Récupérer tous les circuits
    public function findAllCircuits() {
        try {
            $sql = "SELECT * FROM circuits";
            $stmt = $this->connexion->getConnexion()->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération de tous les circuits : " . $e->getMessage();
            return array(); // Retourne un tableau vide en cas d'erreur
        }
    }
}
