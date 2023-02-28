<?php
require_once('boiteConnexion/redir.php');
require_once('boiteConnexion/manageSql.php');
require_once('boiteRequetes/userList.php');
require_once('boiteConnexion/confConnect.php');
session_start();
$sql = connex();
$tableUser =[];
$login = trim($_POST['login'] ?? '');
$passwordSaisie = trim($_POST['password'] ?? '');

if((filter_var($login, FILTER_VALIDATE_EMAIL) && $passwordSaisie )) {
    $tableUser = loginLog($sql, $login);

    if (password_verify($passwordSaisie,$tableUser['mot_de_passe'])) {
        $messages = 'connexion ok';
        $_SESSION['user'] = $tableUser['login'];
        headerLoc('ficheU.php?login='.$_SESSION['user']);
    } else {
        $messages = 'Connexion Impossible';
        $messageInfo = 'login ou Mot de passe Incorrect';
    }
}

require_once('tpl/connexion.php');
