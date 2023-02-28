<?php

use src\Repository\PageRepository;

require_once ('Connect.php');
require_once ('PageRepository.php');
$gestion = new ManageSql();

$userRepository = new PageRepository($gestion);
$user= $userRepository ->findByLogin('guigui@lili.fr');

var_dump($user);