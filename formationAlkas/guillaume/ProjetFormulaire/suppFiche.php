<?php

use src\GestionSQL;

session_start();
require_once('connect/manageSql.php');
require_once('connect/confConnect.php');
require_once('connect/redir.php');

$gestionSQL = new GestionSQL();
$title = 'Création Base';
$nom = trim($_POST['nom'] ?? '');
//$prenom = trim($_POST['prenom'] ?? '');
$id = intval(trim($_POST['id'] ?? ''));
//if(!isset($testpass)) {
//    $message =' ça ne marche pas';
//} else {
//    $password = password_hash($testpass,PASSWORD_ARGON2ID);
//}
if($id && $nom) {

    if($gestionSQL->suppUser($nom,$id)) {
        headerLoc('index.php');
    } else {
        $message = "ça ne marche pas";
    }
}
require_once('template/ficheid.php');
