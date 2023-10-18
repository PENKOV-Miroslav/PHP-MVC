<?php

// Voici comment faire une Classe
class NomDeLaClasse {

    // Attributs privés de la classe
    private $attribut1;
    private $attribut2;
    private $attribut3;
    private $attribut4;

    // Constructeur de l'objet
    public function __construct($attr1, $attr2, $attr3, $attr4) {
        $this->attribut1 = $attr1;
        $this->attribut2 = $attr2;
        $this->attribut3 = $attr3;
        $this->attribut4 = $attr4;
    }

    // Getters et Setters pour attribut1
    public function getAttribut1() {
        return $this->attribut1;
    }

    public function setAttribut1($attr1) {
        $this->attribut1 = $attr1;
    }

    // Getters et Setters pour attribut2
    public function getAttribut2() {
        return $this->attribut2;
    }

    public function setAttribut2($attr2) {
        $this->attribut2 = $attr2;
    }

    // Getters et Setters pour attribut3
    public function getAttribut3() {
        return $this->attribut3;
    }

    public function setAttribut3($attr3) {
        $this->attribut3 = $attr3;
    }

    // Getters et Setters pour attribut4
    public function getAttribut4() {
        return $this->attribut4;
    }

    public function setAttribut4($attr4) {
        $this->attribut4 = $attr4;
    }

    //////////////// -> un petit séparateur pour mieux voir les parties du code :D
}
