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
    public function get() {
        return $this->;
    }
    
    public function set($) {
        $this-> = $;
    }
    ////////////////
}