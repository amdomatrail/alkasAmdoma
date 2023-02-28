<?php
session_start();
require_once('boiteConnexion/manageSql.php');
require_once('boiteRequetes/userList.php');
require_once('boiteConnexion/confConnect.php');

$sql = connex();
$users = listUsers($sql);
$title = 'Can\'t Unsee';
require_once('pageHtml.php');

