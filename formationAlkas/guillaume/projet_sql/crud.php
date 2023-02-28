<?php
session_start();
//phpinfo(); die;
require_once('boiteConnexion/manageSql.php');
require_once('boiteRequetes/roleList.php');
require_once('boiteRequetes/userList.php');
require_once('boiteConnexion/confConnect.php');
$sql = connex();
$roles = listRoles($sql);

$roleId = trim($_POST['roles'] ?? '');
$login = trim($_POST['login'] ?? '');
$prenom = trim($_POST['prenom'] ?? '');
$nom = trim($_POST['nom'] ?? '');
$dateNaissance = trim($_POST['date_naissance'] ?? '');
$testpass = trim($_POST['password'] ?? '');
if(!isset($testpass)) {
    $message =' ça ne marche pas';
} else {
    $password = password_hash($testpass,PASSWORD_ARGON2ID);
}



if($roleId && filter_var($login, FILTER_VALIDATE_EMAIL)  && $prenom && $nom && $dateNaissance && $password) {

    if(addUser($sql, $roleId, $login, $prenom, $nom, $dateNaissance,$password)) {
        headerLoc('index.php');
    } else {
        $message = "ça ne marche pas";
    }
}
require_once('tpl/formulaire.php');
