<?php


use src\GestionSQL;
use src\Repository\PageRepository;

require_once('GestionSQL.php');
require_once('UserRepository.php');

$gestionSQL = new GestionSQL();
//$gestionSQL->
$userRepository = new PageRepository($gestionSQL);
$user = $userRepository->findByLogin('guigui@lili.fr');
var_dump($user);