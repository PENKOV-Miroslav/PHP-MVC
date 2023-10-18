<?php
class Routeur {
    public function route() {
        $action = isset($_GET['action']) ? $_GET['action'] : 'accueil'; // Par défaut, l'action est 'accueil'
        $controller = new PageController();
        //$authController = new AuthController();

        switch ($action) {
            case 'bulletin_inscription':
                $controller->PageBulletin_inscription();
                break;
            case 'authentification':
                //$authController->login();
                $controller->PageAuthentification();
                break;
            case 'inscription':
                //$authController->inscription(); // Utilisez la méthode inscription de AuthController pour gérer l'inscription
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