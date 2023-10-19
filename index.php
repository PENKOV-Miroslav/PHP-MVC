<?php
require_once 'DAO/ConnexionBDD.php';
require_once 'Controller/ControllerPage.php';
require_once 'Controller/Routeur.php';

$router = new Routeur();
$router->route();