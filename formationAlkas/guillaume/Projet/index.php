<?php

use src\GestionSQL;
use src\Repository\PageRepository;

require_once ('confConnect.php');

require_once ('GestionSQL.php');
require_once ('UserRepository.php');

$gestionSQL = new GestionSQL();
//$gestionSQL->
$userRepository = new PageRepository($gestionSQL);


$user = $userRepository->findByLogin("'select * from user where login = :login',['login' => 'testObj@testObj.fr']");
var_dump($user);