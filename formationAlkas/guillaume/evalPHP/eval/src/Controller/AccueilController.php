<?php

use src\Controller;
use src\GestionSQL;
use src\Repository\PageRepository;

class AccueilController extends Controller
{
    public function accueil(GestionSQL $gestionSQL)
    {
        $pageRepository = new PageRepository($gestionSQL);
        $listePages = $pageRepository->listPages();

        $this->render('listePages', [
            'listePages' => $listePages,
        ]);

    }

}