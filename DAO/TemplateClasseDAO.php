<?php
require_once('chemin/vers/modelDeLaClasse');
class NomDeLaClasseDAO {

private $connexion;

public function __construct($connexion) {
    $this->connexion = $connexion;
}

// Méthode pour insérer un nouvel objet NomDeLaClasse dans la base de données
public function create(NomDeLaClasse $objet) {
    try {
        // Requête SQL pour l'insertion avec des paramètres nommés
        $sql = "INSERT INTO nom_de_la_table (attribut1, attribut2, attribut3, attribut4) VALUES (:attribut1, :attribut2, :attribut3, :attribut4)";
        $stmt = $this->connexion->prepare($sql);

        // Liaison des paramètres nommés avec les valeurs de l'objet
        $stmt->bindParam(':attribut1', $objet->getAttribut1());
        $stmt->bindParam(':attribut2', $objet->getAttribut2());
        $stmt->bindParam(':attribut3', $objet->getAttribut3());
        $stmt->bindParam(':attribut4', $objet->getAttribut4());

        // Exécution de la requête
        $stmt->execute();
        return true; // Renvoie vrai si l'opération s'est bien déroulée
    } catch (PDOException $e) {
        echo "Erreur lors de l'insertion : " . $e->getMessage();
        return false; // Renvoie faux en cas d'erreur
    }
}

// Méthode pour lire un objet NomDeLaClasse à partir de la base de données par son ID
public function read($id) {
    try {
        // Requête SQL pour la sélection avec un paramètre nommé
        $sql = "SELECT * FROM nom_de_la_table WHERE id = :id";
        $stmt = $this->connexion->prepare($sql);

        // Liaison du paramètre nommé avec la valeur de l'ID
        $stmt->bindParam(':id', $id);

        // Exécution de la requête
        $stmt->execute();

        // Renvoie les données sous forme de tableau associatif
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erreur lors de la récupération : " . $e->getMessage();
        return null; // Renvoie null en cas d'erreur
    }
}

// Méthode pour mettre à jour un objet NomDeLaClasse dans la base de données
public function update(NomDeLaClasse $objet) {
    try {
        // Requête SQL pour la mise à jour avec des paramètres nommés
        $sql = "UPDATE nom_de_la_table SET attribut1 = :attribut1, attribut2 = :attribut2, attribut3 = :attribut3, attribut4 = :attribut4 WHERE id = :id";
        $stmt = $this->connexion->prepare($sql);

        // Liaison des paramètres nommés avec les valeurs de l'objet
        $stmt->bindParam(':attribut1', $objet->getAttribut1());
        $stmt->bindParam(':attribut2', $objet->getAttribut2());
        $stmt->bindParam(':attribut3', $objet->getAttribut3());
        $stmt->bindParam(':attribut4', $objet->getAttribut4());

        // Liaison du paramètre nommé avec l'ID de l'objet
        $stmt->bindParam(':id', $objet->getId()); // Supposons que votre classe ait une méthode getId() pour obtenir l'ID

        // Exécution de la requête
        $stmt->execute();

        // Renvoie vrai si au moins une ligne a été mise à jour
        return $stmt->rowCount() > 0;
    } catch (PDOException $e) {
        echo "Erreur lors de la mise à jour : " . $e->getMessage();
        return false; // Renvoie faux en cas d'erreur
    }
}

// Méthode pour supprimer un objet NomDeLaClasse de la base de données par son ID
public function delete($id) {
    try {
        // Requête SQL pour la suppression avec un paramètre nommé
        $sql = "DELETE FROM nom_de_la_table WHERE id = :id";
        $stmt = $this->connexion->prepare($sql);

        // Liaison du paramètre nommé avec la valeur de l'ID
        $stmt->bindParam(':id', $id);

        // Exécution de la requête
        $stmt->execute();

        // Renvoie vrai si au moins une ligne a été supprimée
        return $stmt->rowCount() > 0;
    } catch (PDOException $e) {
        echo "Erreur lors de la suppression : " . $e->getMessage();
        return false; // Renvoie faux en cas d'erreur
    }
}
}
