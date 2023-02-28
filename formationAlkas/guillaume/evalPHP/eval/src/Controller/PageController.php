<?php

use src\Controller;
use src\GestionSQL;
use src\Repository\PageRepository;

class PageController extends Controller
{
    public function read(GestionSQL $gestionSQL, string $slug)
    {
        $pageRepository = new PageRepository($gestionSQL);
        $page = $pageRepository->findBySlug($slug);
        $this->render('page',$page);
    }

    public function deleteSlug(GestionSQL $gestionSQL, $id)
    {
        $pageDeleteRepository = new PageRepository($gestionSQL);
        $pageDeleteRepository->deletePage($id);
        $this->headerLoc('index');

    }

    function createSlug(GestionSQL $gestionSQL,string $titre, string $description, string $dateCreation, string $dateModification, string $slug, string $contenu): bool
    {

        $pageCreateGestionSql = new PageRepository($gestionSQL);
        $id = $pageCreateGestionSql->createPage($titre, $description, $dateCreation, $dateModification, $slug, $contenu);
        $this->headerLoc('?page_admin=modif&id='.$id);


    }

    public function readModif(GestionSQL $gestionSQL, int $id)
    {
        $pageRepository = new PageRepository($gestionSQL);
        $page = $pageRepository->findById($id);

//        var_dump($page);die;
        $this->render('pageCreate',$page);


        $titre = trim($_POST['titre'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $dateCreation = trim($_POST['date_de_creation'] ?? '');
        $dateModification = trim($_POST['date_de_modification'] ?? '');
        $slug = trim($_POST['slug'] ?? '');
        $contenu = trim($_POST['contenu'] ?? '');
        if($titre && $description && $dateCreation && $dateModification && $slug && $contenu) {


                if ($pageRepository->modifPage($titre,$description, $dateModification, $slug, $contenu,$id)) {
                    $this->headerLoc('index');
                } else {
                    $message = "ça ne marche pas";
                }
            }

    }
}