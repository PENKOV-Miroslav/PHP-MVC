<?php
require_once 'Controller/ControllerPage.php';
require_once 'Controller/AuthController.php';
require_once 'Controller/Routeur.php';

$router = new Routeur();
$router->route();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);