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
} elseif (!empty($_GET['page_admin'])) {
    switch ($_GET['page_admin']) {
        case 'create':
            $titre = trim($_POST['titre'] ?? '');
            $description = trim($_POST['description'] ?? '');
            $dateCreation = trim($_POST['date_de_creation'] ?? '');
            $dateModification = trim($_POST['date_de_modification'] ?? '');
            $slug = trim($_POST['slug'] ?? '');
            $contenu = trim($_POST['contenu'] ?? '');
            $pageController = new PageController();
            if($titre && $description && $dateCreation && $dateModification && $slug && $contenu) {

                if($pageController->createSlug($gestionSQL,$titre,$description,$dateCreation,$dateModification,$slug,$contenu)) {
                    $this->headerLoc('index');
                } else {
                    $message = "ça ne marche pas";
                }
            }
            require_once('template/pageCreate.php');

            break;

        case 'delete':
            $id = ($_GET['id']);
            $del = new PageController();
            $del->deleteSlug($gestionSQL, $id);
            break;

        case 'modif':
//
            $pageController = new PageController();
           $id = intval($_GET['id']);
            $pageController->readModif($gestionSQL, $id);

//            $id = ($_GET['id']);
//            $pageController = new PageController();
//            $pageController->readModif($gestionSQL, $id);

            break;

    }
} else {
    $index = new AccueilController();
    $index->accueil($gestionSQL);
}


