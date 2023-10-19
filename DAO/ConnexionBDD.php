<?php

class ConnexionBDD {
    private $host;
    private $utilisateur;
    private $motDePasse;
    private $nomBaseDeDonnees;
    private $connexion;

    public function __construct($host, $utilisateur, $motDePasse, $nomBaseDeDonnees) {
        $this->host = $host;
        $this->utilisateur = $utilisateur;
        $this->motDePasse = $motDePasse;
        $this->nomBaseDeDonnees = $nomBaseDeDonnees;
    }

    public function connect() {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->nomBaseDeDonnees}";
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];

            $this->connexion = new PDO($dsn, $this->utilisateur, $this->motDePasse, $options);
            return $this->connexion;
        } catch (PDOException $e) {
            // Gérer les erreurs de connexion à la base de données
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }

    public function deconnect() {
        $this->connexion = null;
    }
}
