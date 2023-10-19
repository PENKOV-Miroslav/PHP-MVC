<?php
class EquipeDAO {
    private $connexion;

    public function __construct(ConnexionBDD $connexion) {
        $this->connexion = $connexion;
    }

    public function ajouterEquipe(Equipe $equipe) {
        $sql = "INSERT INTO equipe (num_dossard_equipe, id_circuit, id_categorie) VALUES (:num_dossard_equipe, :id_circuit, :id_categorie)";
        $stmt = $this->connexion->connect()->prepare($sql);
        $stmt->bindParam(':num_dossard_equipe', $equipe->getNum_dossard_equipe());
        $stmt->bindParam(':id_circuit', $equipe->getId_circuit());
        $stmt->bindParam(':id_categorie', $equipe->getId_categorie());

        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            // Gérer les erreurs d'insertion
            return false;
        }
    }

    public function modifierEquipe(Equipe $equipe) {
        $sql = "UPDATE equipe SET num_dossard_equipe = :num_dossard_equipe, id_circuit = :id_circuit, id_categorie = :id_categorie WHERE id_equipe = :id_equipe";
        $stmt = $this->connexion->connect()->prepare($sql);
        $stmt->bindParam(':id_equipe', $equipe->getId_equipe());
        $stmt->bindParam(':num_dossard_equipe', $equipe->getNum_dossard_equipe());
        $stmt->bindParam(':id_circuit', $equipe->getId_circuit());
        $stmt->bindParam(':id_categorie', $equipe->getId_categorie());

        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            // Gérer les erreurs de mise à jour
            return false;
        }
    }

    public function supprimerEquipe($id_equipe) {
        $sql = "DELETE FROM equipe WHERE id_equipe = :id_equipe";
        $stmt = $this->connexion->connect()->prepare($sql);
        $stmt->bindParam(':id_equipe', $id_equipe);

        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            // Gérer les erreurs de suppression
            return false;
        }
    }

    public function getEquipeParId($id_equipe) {
        $sql = "SELECT * FROM equipe WHERE id_equipe = :id_equipe";
        $stmt = $this->connexion->connect()->prepare($sql);
        $stmt->bindParam(':id_equipe', $id_equipe);

        try {
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Gérer les erreurs de récupération
            return null;
        }
    }

    public function getAllEquipes() {
        $sql = "SELECT * FROM equipe";
        $stmt = $this->connexion->connect()->query($sql);

        try {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Gérer les erreurs de récupération
            return null;
        }
    }
}
