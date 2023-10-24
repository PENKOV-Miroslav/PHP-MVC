<?php
require_once('Model/Categorie.php');
class CategorieDAO {
    private $connexion;

    public function __construct(ConnexionBDD $connexion) {
        $this->connexion = $connexion;
    }

    public function ajouterCategorie(Categorie $categorie) {
        $sql = "INSERT INTO categories (libelle_categorie) VALUES (:libelle_categorie)";
        $stmt = $this->connexion->connect()->prepare($sql);
        $stmt->bindValue(':libelle_categorie', $categorie->getLibelle_categorie());

        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            // Gérer les erreurs d'insertion
            return false;
        }
    }

    public function modifierCategorie(Categorie $categorie) {
        $sql = "UPDATE categories SET libelle_categorie = :libelle_categorie WHERE id_categorie = :id_categorie";
        $stmt = $this->connexion->connect()->prepare($sql);
        $stmt->bindValue(':id_categorie', $categorie->getId_categorie());
        $stmt->bindValue(':libelle_categorie', $categorie->getLibelle_categorie());

        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            // Gérer les erreurs de mise à jour
            return false;
        }
    }

    public function supprimerCategorie($id_categorie) {
        $sql = "DELETE FROM categories WHERE id_categorie = :id_categorie";
        $stmt = $this->connexion->connect()->prepare($sql);
        $stmt->bindParam(':id_categorie', $id_categorie);

        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            // Gérer les erreurs de suppression
            return false;
        }
    }

    public function getCategorieParId($id_categorie) {
        $sql = "SELECT * FROM categories WHERE id_categorie = :id_categorie";
        $stmt = $this->connexion->connect()->prepare($sql);
        $stmt->bindParam(':id_categorie', $id_categorie);

        try {
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Gérer les erreurs de récupération
            return null;
        }
    }

    public function getAllCategories() {
        $sql = "SELECT * FROM categories";
        $stmt = $this->connexion->connect()->query($sql);

        try {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Gérer les erreurs de récupération
            return null;
        }
    }
}
