<?php

use src\Controller\AccueilController;
use src\Controller\PageController;
use src\GestionSQL;

require_once('config.php');
require_once('src/GestionSQL.php');
require_once('src/Controller.php');
require_once('src/Controller/AccueilController.php');
require_once('src/Controller/PageController.php');
require_once('src/Repository/PageRepository.php');

$gestionSQL = new GestionSQL();
if (!empty($_GET['page'])) {
    $pageController = new PageController();
    $pageController->read($gestionSQL, $_GET['page']);
} elseif (!empty($_GET['admin'])) {
    $pageController = new PageController();
    switch ($_GET['admin']) {
        case 'create':
            $pageController->create($gestionSQL, $_POST);
            break;
        case 'delete':
            $pageController->delete($gestionSQL, ($_GET['slug']));
            break;
        case 'update':
            $pageController->update($gestionSQL,intval($_GET['id']));
            break;
    }
} else {
    $index = new AccueilController();
    $index->accueil($gestionSQL);
}
// sinon éventuellement on fait appel ou pas à un autre contrôleur ...