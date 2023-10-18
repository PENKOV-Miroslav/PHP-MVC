<?php

class Temps{

    //Attributs privées du Temps
    private $id_temps;
    private $duree_temps;
    private $id_participant;
    private $id_epreuve;

    // Constructeur de l'objet Temps
    public function __construct($id_temps, $duree_temps,$id_participant,$id_epreuve) {
        $this->id_temps = $id_temps;
        $this->duree_temps = $duree_temps;
        $this->id_participant = $id_participant;
        $this->id_epreuve = $id_epreuve;
    }

    //getters et setters Temps
    public function getId_temps() {
        return $this->id_temps;
    }

    public function setId_temps($id_temps) {
        $this->id_temps = $id_temps;
    }
    ////////////////
    public function getDuree_temps() {
        return $this->duree_temps;
    }
    
    public function setDuree_temps($duree_temps) {
        $this->duree_temps = $duree_temps;
    }
    ////////////////
    public function getId_participant() {
        return $this->id_participant;
    }
    
    public function setId_participant($id_participant) {
        $this->id_participant = $id_participant;
    }
    ////////////////
    public function getId_epreuve() {
        return $this->id_epreuve;
    }
    
    public function setId_epreuve($id_epreuve) {
        $this->id_epreuve = $id_epreuve;
    }
}