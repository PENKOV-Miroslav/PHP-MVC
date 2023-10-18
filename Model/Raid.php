<?php
class Raid{

    // Attributs privées du raid
    private $id_raid;
    private $libelle_raid;

    // Constructeur de l'objet raid
    public function __construct($id_raid, $libelle_raid) {
        $this->id_raid = $id_raid;
        $this->libelle_raid = $libelle_raid;
    }

    //getters et setters raid
    public function getId_raid() {
        return $this->id_raid;
    }

    public function setId_raid($id_raid) {
        $this->id_raid = $id_raid;
    }
    ////////////////
    public function getLibelle_raid() {
        return $this->libelle_raid;
    }

    public function setLibelle_raid($libelle_raid) {
        $this->libelle_raid = $libelle_raid;
    }
    ////////////////
}