<?php

use src\Controller;
use src\Controller\PageController;
use src\GestionSQL;

require_once ('../config.php');

require_once ('../src/GestionSQL.php');
require_once ('../src/Controller.php');

require_once ('../src/Controller/AccueilController.php');
require_once('../src/Controller/PageController.php');
require_once('../src/Repository/PageRepository.php');
$title = 'Page de création';
$gestionSQL = new GestionSQL();
$create = new PageController();
$redir = new Controller();


