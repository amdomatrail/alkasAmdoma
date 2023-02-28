<?php

use src\Controller\AccueilController;
use src\Controller\JsController;
use src\Controller\PageController;
use src\GestionSQL;

require_once('config.php');
require_once('src/GestionSQL.php');
require_once('src/Controller.php');

require_once('src/Controller/AccueilController.php');
require_once('src/Controller/JsController.php');
require_once('src/Controller/PageController.php');
require_once('src/Repository/PageRepository.php');

try {
    $gestionSQL = new GestionSQL();
} catch (Exception $exception) {
    die('Merci de revenir plus tard car nous avons un problème technique !');
}

if (!empty($_GET['admin'])) {
    $pageController = new PageController();
    switch ($_GET['admin']) {
        case 'create':
            $pageController->create($gestionSQL, $_POST);
            break;
        case 'delete':
            $pageController->delete($gestionSQL, ($_GET['slug']));
            break;
        case 'update':
            $pageController->update($gestionSQL, intval($_GET['id']));
            break;
    }
} elseif (!empty($_GET['js'])) {
    $jsController = new JsController();

    switch ($_GET['js']) {
        case 'calculatrice':
            $jsController->calculatrice();
            break;

        case 'calculatriceB':
            $jsController->calculatriceB();
            break;

        case 'doWhile':
            $jsController->doWhile();
            break;

        case 'event':
            $jsController->event();
            break;

        case 'todo':
            $jsController->todo();
            break;

        case 'shifumi':
            $jsController->shifumi();
            break;

        case 'ClassJs':
            $jsController->classJs();
            break;
    }
} else {
    $accueilController = new AccueilController();
    $accueilController->accueil();
}