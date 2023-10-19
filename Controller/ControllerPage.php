<?php
class PageController {

    // Méthodes qui permettent d'afficher le contenu dans la template suivant le choix séléctionner par l'utilisateur

    public function Accueil() {
        $pageTitle = 'Accueil';
        $contentFile = 'View/accueil.php';
        include 'View/template.php';
    }

    public function PageBulletin_inscription() {
        $pageTitle = 'Bulletin d\'inscription';
        $contentFile = 'View/bulletin_inscription.php';
        include 'View/template.php';
    }

    public function PageAuthentification() {
        $pageTitle = 'Authentification';
        $contentFile = 'View/authentification.php';
        include 'View/template.php';
    }

    public function PageInscription() {
        $pageTitle = 'Enregistrer';
        $contentFile = 'View/inscription.php';
        include 'View/template.php';
    }

    public function PageRFID() {
        $pageTitle = 'Pointage';
        $contentFile = 'View/pointageRfid.php';
        include 'View/template.php';
    }
}