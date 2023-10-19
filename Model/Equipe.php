<?php

class Equipe{

    private $id_equipe;
    private $num_dossard_equipe;
    private $id_circuit;
    private $id_categorie;

    // Constructeur
    public function __construct($id_equipe,$num_dossard_equipe,$id_circuit,$id_categorie) {
        $this->id_equipe = $id_equipe;
        $this->num_dossard_equipe = $num_dossard_equipe;
        $this->id_circuit = $id_circuit;
        $this->id_categorie = $id_categorie;
    }
    // Faire les Getters et Setters
    public function getId_equipe() {
        return $this->id_equipe;
    }
    
    public function setId_equipe($id_equipe) {
        $this->id_equipe = $id_equipe;
    }
    ////////////////
    public function getNum_dossard_equipe() {
        return $this->num_dossard_equipe;
    }
    
    public function setNum_dossard_equipe($num_dossard_equipe) {
        $this->num_dossard_equipe = $num_dossard_equipe;
    }
    ////////////////
    public function getId_circuit() {
        return $this->id_circuit;
    }
    
    public function setId_circuit($id_circuit) {
        $this->id_circuit = $id_circuit;
    }
    ////////////////
    public function getId_categorie() {
        return $this->id_categorie;
    }
    
    public function setId_categorie($id_categorie) {
        $this->id_categorie = $id_categorie;
    }
    ////////////////
}