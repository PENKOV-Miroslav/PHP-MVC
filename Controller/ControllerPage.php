<?php
class PageController {

    public function Accueil() {
        $pageTitle = 'Accueil';
        $contentFile = 'View/accueil.php';
        include 'View/template.php';
    }

    public function TraitementFormulaireInscription() {
        $pageTitle = 'Traitement Inscription';
        $contentFile = 'View/bulletin_inscription.php';
        include 'View/template.php';
    }
    

    public function PageAuthentification() {
        $pageTitle = 'Authentification';
        $contentFile = 'View/authentification.php';
        include 'View/template.php';
    }
    

    public function PageInscription() {
        $pageTitle = 'Inscription';
        $contentFile = 'View/inscription.php';
        include 'View/template.php';
    }
    

    public function PageRFID() {
        $pageTitle = 'Pointage';
        $contentFile = 'View/pointageRfid.php';
        include 'View/template.php';
    }
}