<?php
require_once('Model/Epreuve.php');
class EpreuveDAO {
    private $connexion;

    public function __construct(ConnexionBDD $connexion) {
        $this->connexion = $connexion;
    }

    public function ajouterEpreuve(Epreuve $epreuve) {
        $sql = "INSERT INTO epreuves (libelle_epreuve, id_circuit) VALUES (:libelle_epreuve, :id_circuit)";
        $stmt = $this->connexion->connect()->prepare($sql);
        $stmt->bindParam(':libelle_epreuve', $epreuve->getLibelle_epreuve());
        $stmt->bindParam(':id_circuit', $epreuve->getId_circuit());

        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            // Gérer les erreurs d'insertion
            return false;
        }
    }

    public function modifierEpreuve(Epreuve $epreuve) {
        $sql = "UPDATE epreuves SET libelle_epreuve = :libelle_epreuve, id_circuit = :id_circuit WHERE id_epreuve = :id_epreuve";
        $stmt = $this->connexion->connect()->prepare($sql);
        $stmt->bindParam(':id_epreuve', $epreuve->getId_epreuve());
        $stmt->bindParam(':libelle_epreuve', $epreuve->getLibelle_epreuve());
        $stmt->bindParam(':id_circuit', $epreuve->getId_circuit());

        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            // Gérer les erreurs de mise à jour
            return false;
        }
    }

    public function supprimerEpreuve($id_epreuve) {
        $sql = "DELETE FROM epreuves WHERE id_epreuve = :id_epreuve";
        $stmt = $this->connexion->connect()->prepare($sql);
        $stmt->bindParam(':id_epreuve', $id_epreuve);

        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            // Gérer les erreurs de suppression
            return false;
        }
    }

    public function getEpreuveParId($id_epreuve) {
        $sql = "SELECT * FROM epreuves WHERE id_epreuve = :id_epreuve";
        $stmt = $this->connexion->connect()->prepare($sql);
        $stmt->bindParam(':id_epreuve', $id_epreuve);

        try {
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Gérer les erreurs de récupération
            return null;
        }
    }

    public function getAllEpreuves() {
        $sql = "SELECT * FROM epreuves";
        $stmt = $this->connexion->connect()->query($sql);

        try {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Gérer les erreurs de récupération
            return null;
        }
    }
}
