<?php

require_once ('DAO/ConnexionBDD.php')

class ControllerUtilisateur{

    private $db;

    public function __construct() {
        // Remplacez ces informations par les vôtres
        $host = 'localhost';
        $db_name = 'activite2';
        $username = 'root';
        $password = 'root';

        $this->db = new Connexion($host, $db_name, $username, $password);
    }
}