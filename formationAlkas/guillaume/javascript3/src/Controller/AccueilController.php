<?php



class AccueilController extends Controller
{
    public function accueil(GestionSQL $gestionSQL)
    {
        $pageRepository = new PageRepository($gestionSQL);
        $pages = $pageRepository->findAll();

        $this->render('accueil', [
            'pages' => $pages
        ]);
    }
}