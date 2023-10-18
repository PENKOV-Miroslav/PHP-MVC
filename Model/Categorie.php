<?php

class Categorie{

    private $id_categorie;
    private $libelle_categorie;

   // Constructeur
   public function __construct($id_categorie,$libelle_categorie) {
    $this->id_categorie = $id_categorie;
    $this->libelle_categorie = $libelle_categorie;
}
    // Getters et Setters
    public function getId_categorie() {
        return $this->id_categorie;
    }

    public function setId_categorie($id_categorie) {
        $this->id_categorie = $id_categorie;
    }
    ////////////////
    public function getLibelle_categorie() {
        return $this->libelle_categorie;
    }

    public function setLibelle_categorie($libelle_categorie) {
        $this->libelle_categorie = $libelle_categorie;
    }
    ////////////////
}