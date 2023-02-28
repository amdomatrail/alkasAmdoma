<?php

use src\GestionSQL;
use src\Repository\PageRepository;

session_start();
require_once('connect/manageSql.php');
require_once('connect/confConnect.php');
require_once('requetes/Rclients.php');

$gestionSQL = new GestionSQL();
$userRepository = new PageRepository($gestionSQL);
$users = $userRepository->listClients();

$title = 'Création Base';
require_once('template/pageHtml.php');


