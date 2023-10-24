<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'DAO/ConnexionBDD.php';
require_once('DAO/UtilisateurDAO.php');
require_once('DAO/ParticipantDAO.php');
require_once('DAO/EquipeDAO.php');
require_once 'Controller/ControllerPage.php';
require_once 'Controller/Routeur.php';

$router = new Routeur();
$router->route();