<?php

use src\GestionSQL;

session_start();
require_once('connect/manageSql.php');
require_once('connect/confConnect.php');
require_once('connect/redir.php');


$gestionSQL = new GestionSQL();

$title = 'Création Base';

$prenom = trim($_POST['prenom'] ?? '');
$nom = trim($_POST['nom'] ?? '');
$dateNaissance = trim($_POST['date_de_naissance'] ?? '');
$testpass = trim($_POST['password'] ?? '');
if(!isset($testpass)) {
    $message =' ça ne marche pas';
} else {
    $password = password_hash($testpass,PASSWORD_ARGON2ID);
}



if($nom && $prenom && $dateNaissance && $password) {

    if($gestionSQL->addUser($nom, $prenom,$dateNaissance,$password)) {
        headerLoc('index.php');
    } else {
        $message = "ça ne marche pas";
    }
}
require_once('template/fiche.php');
