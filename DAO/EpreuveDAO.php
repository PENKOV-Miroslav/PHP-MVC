<?php

require_once ('Model/Epreuve.php');

class EpreuveDAO {

    private $connexion;

    public function __construct($connexion) {
        $this->connexion = $connexion;
    }

    // Insérer une épreuve
    public function createEpreuve(Epreuve $epreuve) {
        try {
            $sql = "INSERT INTO epreuves (libelle_epreuve, id_circuit) VALUES (:libelle_epreuve, :id_circuit)";
            $stmt = $this->connexion->getConnexion()->prepare($sql);
            $stmt->bindParam(':libelle_epreuve', $epreuve->getLibelle_epreuve());
            $stmt->bindParam(':id_circuit', $epreuve->getId_circuit());
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erreur lors de l'insertion : " . $e->getMessage();
            return false;
        }
    }

    // Obtenir une épreuve par son ID
    public function getEpreuveById($id) {
        try {
            $sql = "SELECT * FROM epreuves WHERE id_epreuve = :id_epreuve";
            $stmt = $this->connexion->getConnexion()->prepare($sql);
            $stmt->bindParam(':id_epreuve', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération : " . $e->getMessage();
            return null;
        }
    }

    // Mettre à jour une épreuve
    public function updateEpreuve(Epreuve $epreuve) {
        try {
            $sql = "UPDATE epreuves SET libelle_epreuve = :libelle_epreuve, id_circuit = :id_circuit WHERE id_epreuve = :id_epreuve";
            $stmt = $this->connexion->getConnexion()->prepare($sql);
            $stmt->bindParam(':libelle_epreuve', $epreuve->getLibelle_epreuve());
            $stmt->bindParam(':id_circuit', $epreuve->getId_circuit());
            $stmt->bindParam(':id_epreuve', $epreuve->getId_epreuve());
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erreur lors de la mise à jour : " . $e->getMessage();
            return false;
        }
    }

    // Supprimer une épreuve
    public function deleteEpreuve($id) {
        try {
            $sql = "DELETE FROM epreuves WHERE id_epreuve = :id_epreuve";
            $stmt = $this->connexion->getConnexion()->prepare($sql);
            $stmt->bindParam(':id_epreuve', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erreur lors de la suppression : " . $e->getMessage();
            return false;
        }
    }

    // Récupérer toutes les épreuves
    public function findAllEpreuves() {
        try {
            $sql = "SELECT * FROM epreuves";
            $stmt = $this->connexion->getConnexion()->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération de toutes les épreuves : " . $e->getMessage();
            return array(); // Retourne un tableau vide en cas d'erreur
        }
    }
}
