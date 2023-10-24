<?php

class Participant{

    // Attributs privées du Participant
    private $id_participant;
    private $nom_participant;
    private $prenom_participant;
    private $date_naissance_participant;
    private $adresse_participant;
    private $code_postal_participant;
    private $ville_participant;
    private $telephone_participant;
    private $certificat_valider_participant;
    private $club_participant;
    private $id_rfid;
    private $email_participant;
    private $id_equipe;
    private $id_utilisateur;

    // Constructeur de l'objet Participant
    public function __construct($nom_participant,$prenom_participant,$date_naissance_participant,$adresse_participant,$code_postal_participant,$ville_participant,$telephone_participant,$certificat_valider_participant,$club_participant,$id_rfid,$email_participant,$id_equipe) {
        $this->nom_participant = $nom_participant;
        $this->prenom_participant = $prenom_participant;
        $this->date_naissance_participant = $date_naissance_participant;
        $this->adresse_participant = $adresse_participant;
        $this->code_postal_participant = $code_postal_participant;
        $this->ville_participant = $ville_participant;
        $this->telephone_participant = $telephone_participant;
        $this->certificat_valider_participant = $certificat_valider_participant;
        $this->club_participant = $club_participant;
        $this->id_rfid = $id_rfid;
        $this->email_participant = $email_participant;
        $this->id_equipe = $id_equipe;
    }

    //getters et setters circuit
    public function getId_participant() {
        return $this->id_participant;
    }

    public function setId_participant($id_participant) {
        $this->id_participant = $id_participant;
    }

    /////////////////////////////
    public function getNom_participant() {
        return $this->nom_participant;
    }

    public function setNom_participant($nom_participant) {
        $this->nom_participant = $nom_participant;
    }

    /////////////////////////////
    public function getPrenom_participant() {
        return $this->prenom_participant;
    }

    public function setPrenom_participant($prenom_participant) {
        $this->prenom_participant = $prenom_participant;
    }
    /////////////////////////////
    public function getDate_naissance_participant() {
        return $this->date_naissance_participant;
    }

    public function setDate_naissance_participant($date_naissance_participant) {
        $this->date_naissance_participant = $date_naissance_participant;
    }
    /////////////////////////////
    public function getAdresse_participant() {
        return $this->adresse_participant;
    }

    public function setAdresse_participant($adresse_participant) {
        $this->adresse_participant = $adresse_participant;
    }
    /////////////////////////////
    public function getCode_postal_participant() {
            return $this->code_postal_participant;
        }
    
    public function setCode_postal_participant($code_postal_participant) {
            $this->code_postal_participant = $code_postal_participant;
        }
        /////////////////////////////
    public function getVille_participant() {
            return $this->ville_participant;
        }
    
    public function setVille_participant($ville_participant) {
            $this->ville_participant = $ville_participant;
        }
        /////////////////////////////
    public function getTelephone_participant() {
            return $this->telephone_participant;
        }
    
    public function setTelephone_participant($telephone_participant) {
            $this->telephone_participant = $telephone_participant;
        }
        /////////////////////////////
    public function getCertificat_valider_participant() {
            return $this->certificat_valider_participant;
        }
    
    public function setCertificat_valider_participant($certificat_valider_participant) {
            $this->certificat_valider_participant = $certificat_valider_participant;
        }
        /////////////////////////////
    public function getClub_participant() {
            return $this->club_participant;
        }
    
    public function setClub_participant($club_participant) {
            $this->club_participant = $club_participant;
        }
        /////////////////////////////
    public function getId_rfid() {
            return $this->id_rfid;
        }
    
    public function setId_rfid($id_rfid) {
            $this->id_rfid = $id_rfid;
        }
        /////////////////////////////
    public function getEmail_participant() {
            return $this->email_participant;
        }
    
    public function setEmail_participant($email_participant) {
            $this->email_participant = $email_participant;
        }
        /////////////////////////////
    public function getId_equipe() {
            return $this->id_equipe;
        }
    
    public function setId_equipe($id_equipe) {
            $this->id_equipe = $id_equipe;
        }
        /////////////////////////////
    public function getId_utilisateur() {
            return $this->id_utilisateur;
        }
    
    public function setId_utilisateur($id_utilisateur) {
            $this->id_utilisateur = $id_utilisateur;
        }
        /////////////////////////////
}