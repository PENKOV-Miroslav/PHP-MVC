<?php

class Utilisateur{

    // Attributs privés d'Utilisateur
    private $id_utilisateur;
    private $login_utilisateur;
    private $mot_de_passe_utilisateur;
    private $id_role;

    // Constructeur d'Utilisateur
    public function __construct($id_utilisateur,$login_utilisateur,$mot_de_passe_utilisateur,$id_role) {
        $this->id_utilisateur = $id_utilisateur;
        $this->login_utilisateur = $login_utilisateur;
        $this->mot_de_passe_utilisateur = $mot_de_passe_utilisateur;
        $this->id_role = $id_role;
    }
    // getters et setters Utilisateur
    public function getId_utilisateur() {
        return $this->id_utilisateur;
    }
    
    public function setId_utilisateur($id_utilisateur) {
        $this->id_utilisateur = $id_utilisateur;
    }
    ////////////////////////
    public function getLogin_utilisateur() {
        return $this->login_utilisateur;
    }
    
    public function setLogin_utilisateur($login_utilisateur) {
        $this->login_utilisateur = $login_utilisateur;
    }
    ////////////////////////
    public function getMot_de_passe_utilisateur() {
        return $this->mot_de_passe_utilisateur;
    }
    
    public function setMot_de_passe_utilisateur($mot_de_passe_utilisateur) {
        $this->mot_de_passe_utilisateur = $mot_de_passe_utilisateur;
    }
    ////////////////////////
    public function getId_role() {
        return $this->id_role;
    }
    
    public function setId_role($id_role) {
        $this->id_role = $id_role;
    }
    ////////////////////////
}