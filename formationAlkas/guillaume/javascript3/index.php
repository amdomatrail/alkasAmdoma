<?php

require_once('config.php');
require_once('src/GestionSQL.php');

require_once('src/Controller.php');

require_once('src/Controller/AccueilController.php');

require_once('src/Controller/JsController.php');
require_once('src/Controller/PageController.php');
require_once('src/Repository/PageRepository.php');

try {
    $gestionSQL = new GestionSQL();
    $gestionSQL->connexion();

} catch (Exception $exception) {
    var_dump($exception);
//    die($exception);
    die('Merci de revenir plus tard car nous avons un problème technique !');
}

// si slug = accueil ou rien
// alors on fait appel à ça :
//$index = new AccueilController();
//$index->accueil($gestionSQL);

//Redirection de la liste de lien vers la page
if (!empty($_GET['page'])) {
    $pageController = new PageController();
    $pageController->show($gestionSQL, $_GET['page']);
} elseif (!empty($_GET['admin'])) {
    $pageController = new PageController();

    switch ($_GET['admin']) {
        case 'creation':
            $pageController->create($gestionSQL, $_POST);
            break;

        case 'list':
            $pageController->list($gestionSQL);
            break;

        case 'modif':
            $pageController->update($gestionSQL, intval($_GET['id']), $_POST);
            break;

        case 'eff':
            $pageController->delete($gestionSQL, intval($_GET['id']));
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
        case 'meteo':
            $jsController->meteo();
            break;
        case 'carte':
            $jsController->carte();
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

        case 'tousExos':
            $jsController->tousExos();
            break;

        case 'formulaire':
            $jsController->formulaire();
            break;

        case 'json':
            $jsController->json();
            break;
        case 'liste':
            $jsController->liste();
            break;
        case 'ajax':
            $jsController->ajax();
            break;
        case 'formContact':
            $jsController->formContact($_POST);
            break;
        case 'shifu':
            $jsController->shifu();
            break;

    }
} else {
    $accueilController = new AccueilController();
    $accueilController->accueil($gestionSQL);
}

// sinon éventuellement on fait appel ou pas à un autre contrôleur ...