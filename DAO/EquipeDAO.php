<?php

require_once ('Model/Equipe.php');

class EquipeDAO {

    private $connexion;

    public function __construct($connexion) {
        $this->connexion = $connexion;
    }

    // Insérer une équipe
    public function createEquipe(Equipe $equipe) {
        try {
            $sql = "INSERT INTO equipes (num_dossard_equipe, id_circuit, id_categorie) VALUES (:num_dossard_equipe, :id_circuit, :id_categorie)";
            $stmt = $this->connexion->getConnexion()->prepare($sql);
            $stmt->bindParam(':num_dossard_equipe', $equipe->getNum_dossard_equipe());
            $stmt->bindParam(':id_circuit', $equipe->getId_circuit());
            $stmt->bindParam(':id_categorie', $equipe->getId_categorie());
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erreur lors de l'insertion : " . $e->getMessage();
            return false;
        }
    }

    // Obtenir une équipe par son ID
    public function getEquipeById($id) {
        try {
            $sql = "SELECT * FROM equipes WHERE id_equipe = :id_equipe";
            $stmt = $this->connexion->getConnexion()->prepare($sql);
            $stmt->bindParam(':id_equipe', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération : " . $e->getMessage();
            return null;
        }
    }

    // Mettre à jour une équipe
    public function updateEquipe(Equipe $equipe) {
        try {
            $sql = "UPDATE equipes SET num_dossard_equipe = :num_dossard_equipe, id_circuit = :id_circuit, id_categorie = :id_categorie WHERE id_equipe = :id_equipe";
            $stmt = $this->connexion->getConnexion()->prepare($sql);
            $stmt->bindParam(':num_dossard_equipe', $equipe->getNum_dossard_equipe());
            $stmt->bindParam(':id_circuit', $equipe->getId_circuit());
            $stmt->bindParam(':id_categorie', $equipe->getId_categorie());
            $stmt->bindParam(':id_equipe', $equipe->getId_equipe());
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erreur lors de la mise à jour : " . $e->getMessage();
            return false;
        }
    }

    // Supprimer une équipe
    public function deleteEquipe($id) {
        try {
            $sql = "DELETE FROM equipes WHERE id_equipe = :id_equipe";
            $stmt = $this->connexion->getConnexion()->prepare($sql);
            $stmt->bindParam(':id_equipe', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erreur lors de la suppression : " . $e->getMessage();
            return false;
        }
    }

    // Récupérer toutes les équipes
    public function findAllEquipes() {
        try {
            $sql = "SELECT * FROM equipes";
            $stmt = $this->connexion->getConnexion()->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération de toutes les équipes : " . $e->getMessage();
            return array(); // Retourne un tableau vide en cas d'erreur
        }
    }
}
