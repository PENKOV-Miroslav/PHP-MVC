<?php

class ConnexionBDD {

    //Attributs privées de la classe ConnexionBDD qui vont être utiliser pour définir les paramètres de la connexion PDO
    private $host;
    private $db_name;
    private $username;
    private $password;
    private $conn;

    //Constructeur
    public function __construct($host, $db_name, $username, $password) {
        $this->host = $host;
        $this->db_name = $db_name;
        $this->username = $username;
        $this->password = $password;
    }

    //Méthode permetiant la connexion
    public function getConnexion() {
        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch(PDOException $e) {
            echo "Erreur de connexion : " . $e->getMessage();
            return null;
        }
    }
    //Méthode Fermant la connexion a la BDD
    public function closeConnexion() {
        $this->conn = null;
    }
}