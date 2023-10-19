<?php
class Routeur {
    public function route() {
        $action = isset($_GET['action']) ? $_GET['action'] : 'accueil'; // Par défaut, l'action est 'accueil'
        $controller = new PageController();

        switch ($action) {
            case 'bulletin_inscription':
                $controller->PageBulletin_inscription();
                break;
            case 'authentification':
                $controller->PageAuthentification();
                break;
            case 'inscription':
                $controller->PageInscription();
                break;
            case 'rfid':
                $controller->PageRFID();
                break;
            default:
                $controller->Accueil();
                break;
        }
    }
}
