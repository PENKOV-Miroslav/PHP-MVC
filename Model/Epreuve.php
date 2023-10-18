<?php

class Epreuve{

     // Attributs privées du Epreuve
     private $id_epreuve;
     private $libelle_epreuve;
     private $id_circuit;
 
     // Constructeur de l'objet Epreuve
     public function __construct($id_epreuve, $libelle_epreuve,$id_circuit) {
         $this->id_epreuve = $id_epreuve;
         $this->libelle_epreuve = $libelle_epreuve;
         $this->id_circuit = $id_circuit;
     }
 
     //getters et setters Epreuve
     public function getId_epreuve() {
         return $this->id_epreuve;
     }

     public function setId_epreuve($id_epreuve) {
         $this->id_epreuve = $id_epreuve;
     }
     ////////////////
     public function getLibelle_epreuve() {
         return $this->libelle_epreuve;
     }
 
     public function setLibelle_epreuve($libelle_epreuve) {
         $this->libelle_epreuve = $libelle_epreuve;
     }
     ////////////////
     public function getId_circuit() {
         return $this->id_circuit;
     }
 
     public function setId_circuit($id_circuit) {
         $this->id_circuit = $id_circuit;
     }
}