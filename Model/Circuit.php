<?php

class Circuit{

     // Attributs privées du circuit
    private $id_circuit;
    private $libelle_circuit;
    private $id_raid;

    // Constructeur de l'objet circuit
    public function __construct($id_circuit, $libelle_circuit,$id_raid) {
        $this->id_circuit = $id_circuit;
        $this->libelle_circuit = $libelle_circuit;
        $this->id_raid = $id_raid;
    }

    //getters et setters circuit
    public function getId_circuit() {
        return $this->id_circuit;
    }

    public function setId_circuit($id_circuit) {
        $this->id_circuit = $id_circuit;
    }
    ////////////////
    public function getId_raid() {
        return $this->libelle_circuit;
    }

    public function setId_raid($libelle_circuit) {
        $this->libelle_circuit = $libelle_circuit;
    }
    ////////////////
    public function getId_raid() {
        return $this->id_raid;
    }

    public function setId_raid($id_raid) {
        $this->id_raid = $id_raid;
    }
    ////////////////
}