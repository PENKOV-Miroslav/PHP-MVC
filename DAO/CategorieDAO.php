<?php

require_once('Model/Categorie.php');

class CategorieDAO {

    private $connexion;

    public function __construct($connexion) {
        $this->connexion = $connexion;
    }

    // Insérer une catégorie
    public function createCategorie(Categorie $categorie) {
        try {
            $sql = "INSERT INTO categories (libelle_categorie) VALUES (:libelle_categorie)";
            $stmt = $this->connexion->getConnexion()->prepare($sql);
            $stmt->bindParam(':libelle_categorie', $categorie->getLibelle_categorie());
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erreur lors de l'insertion : " . $e->getMessage();
            return false;
        }
    }

    // Obtenir une catégorie par son ID
    public function getCategorieById($id) {
        try {
            $sql = "SELECT * FROM categories WHERE id_categorie = :id_categorie";
            $stmt = $this->connexion->getConnexion()->prepare($sql);
            $stmt->bindParam(':id_categorie', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération : " . $e->getMessage();
            return null;
        }
    }

    // Mettre à jour une catégorie
    public function updateCategorie(Categorie $categorie) {
        try {
            $sql = "UPDATE categories SET libelle_categorie = :libelle_categorie WHERE id_categorie = :id_categorie";
            $stmt = $this->connexion->getConnexion()->prepare($sql);
            $stmt->bindParam(':libelle_categorie', $categorie->getLibelle_categorie());
            $stmt->bindParam(':id_categorie', $categorie->getId_categorie());
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erreur lors de la mise à jour : " . $e->getMessage();
            return false;
        }
    }

    // Supprimer une catégorie
    public function deleteCategorie($id) {
        try {
            $sql = "DELETE FROM categories WHERE id_categorie = :id_categorie";
            $stmt = $this->connexion->getConnexion()->prepare($sql);
            $stmt->bindParam(':id_categorie', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erreur lors de la suppression : " . $e->getMessage();
            return false;
        }
    }

    // Récupérer toutes les catégories
    public function findAllCategories() {
        try {
            $sql = "SELECT * FROM categories";
            $stmt = $this->connexion->getConnexion()->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération de toutes les catégories : " . $e->getMessage();
            return array(); // Retourne un tableau vide en cas d'erreur
        }
    }
}
