<?php

class Role{

    private $id_role;
    private $libelle_role;

    // Créer le Constructeur
    public function __construct($id_role,$libelle_role) {
        $this->id_role = $id_role;
        $this->libelle_role = $libelle_role;
    }

    // Faire les Getters et Setters Role
    public function getId_role() {
        return $this->id_role;
    }
        
    public function setId_role($id_role) {
        $this->id_role = $id_role;
    }
    ////////////////
    public function get() {
        return $this->libelle_role;
    }
        
    public function setLibelle_role($libelle_role) {
        $this->libelle_role = $libelle_role;
    }
    ////////////////

}