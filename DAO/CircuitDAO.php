<?php
require_once('Model/Circuit.php');
class CircuitDAO {
    private $connexion;

    public function __construct(ConnexionBDD $connexion) {
        $this->connexion = $connexion;
    }

    public function ajouterCircuit(Circuit $circuit) {
        $sql = "INSERT INTO circuits (libelle_circuit, id_raid) VALUES (:libelle_circuit, :id_raid)";
        $stmt = $this->connexion->connect()->prepare($sql);
        $stmt->bindParam(':libelle_circuit', $circuit->getLibelle_circuit());
        $stmt->bindParam(':id_raid', $circuit->getId_raid());

        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            // Gérer les erreurs d'insertion
            return false;
        }
    }

    public function modifierCircuit(Circuit $circuit) {
        $sql = "UPDATE circuits SET libelle_circuit = :libelle_circuit, id_raid = :id_raid WHERE id_circuit = :id_circuit";
        $stmt = $this->connexion->connect()->prepare($sql);
        $stmt->bindParam(':id_circuit', $circuit->getId_circuit());
        $stmt->bindParam(':libelle_circuit', $circuit->getLibelle_circuit());
        $stmt->bindParam(':id_raid', $circuit->getId_raid());

        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            // Gérer les erreurs de mise à jour
            return false;
        }
    }

    public function supprimerCircuit($id_circuit) {
        $sql = "DELETE FROM circuits WHERE id_circuit = :id_circuit";
        $stmt = $this->connexion->connect()->prepare($sql);
        $stmt->bindParam(':id_circuit', $id_circuit);

        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            // Gérer les erreurs de suppression
            return false;
        }
    }

    public function getCircuitParId($id_circuit) {
        $sql = "SELECT * FROM circuits WHERE id_circuit = :id_circuit";
        $stmt = $this->connexion->connect()->prepare($sql);
        $stmt->bindParam(':id_circuit', $id_circuit);

        try {
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Gérer les erreurs de récupération
            return null;
        }
    }

    public function getAllCircuits() {
        $sql = "SELECT * FROM circuits";
        $stmt = $this->connexion->connect()->query($sql);

        try {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Gérer les erreurs de récupération
            return null;
        }
    }
}
