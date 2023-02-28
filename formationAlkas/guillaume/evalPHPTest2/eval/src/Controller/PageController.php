<?php

use src\Controller;
use src\GestionSQL;
use src\Repository\PageRepository;

class PageController extends Controller
{
    public function read(GestionSQL $gestionSQL, string $slug)
    {
        $pageRepository = new PageRepository($gestionSQL);
        //        chargement de la requête de la page par son slug sur la table pages
        $page = $pageRepository->findBySlug($slug);
        //        chargement de la requête de la catégorie de la page par l'id sur la table categorie
        $cat = $pageRepository-> findByIdCategories($page['id_categorie']);

        $this->render('page',['page'=> $page,'cat'=>$cat,'titre' => $page['titre'],'description' => $page['description']]);
    }

    public function delete(GestionSQL $gestionSQL,string $slug)
    {
        $pageRepository = new PageRepository($gestionSQL);
        //        chargement de la requête de la page par son slug sur la table pages
        $page = $pageRepository->findBySlug($slug);
        $this->render('pageDelete', ['page'=> $page,'titre' => $page['titre'],'description' => $page['description']]);
        $supprimer = trim($_POST['supprimer'] ?? '');
        $annuler = trim($_POST['annuler'] ?? '');
        if (!empty($supprimer))
        {
            $pageRepository->delete($page['id']);
            echo "vous avez utilisé le bouton supprimer";
            $this->headerLoc('index');
        }
        elseif  (!empty($annuler))
        {
            echo "vous avez utilisé le bouton annuler";
            $this->headerLoc('index');
        }
    }


    function create(GestionSQL $gestionSQL,array $dataForm): void
    {

        try {

            if ($dataForm) {

                $data = [
                    'titre' => htmlspecialchars(trim($dataForm['titre'])),
                    'description' => htmlspecialchars(trim($dataForm['description'])),
                    'slug' => $this->slugify(trim($dataForm['titre'])),
                    'contenu' => htmlspecialchars(trim($dataForm['contenu'])),
                    'id_categorie' => htmlspecialchars(trim($dataForm['categorie'])),
                ];
                if($this->checkAllDataTrue($data)) {
                    $pageRepository = new PageRepository($gestionSQL);

                    $id = $pageRepository->insert($data);

                    if($id) {
                        $this->headerLoc('index');
                    } else {
                        throw new Exception('Problème de lors de la création d\'une page');
                    }
                } else {
                    throw new Exception("Veuillez remplir le formulaire complétement");
                }
            }
            $pageRepository = new PageRepository($gestionSQL);
            $categories = $pageRepository->findCategories();

            $this->render('pageCreate',['categories' => $categories]);

        } catch (Exception $exception) {
            die($exception->getMessage());
        }
    }

    public function update(GestionSQL $gestionSQL, int $id): void
    {
        $pageRepository = new PageRepository($gestionSQL);
        //        chargement de la requête de la page par l'id sur la table pages
        $page = $pageRepository->findById($id);
        //        chargement de la table catégorie
        $categories = $pageRepository->findCategories();
        //        chargement de la requête de la catégorie de la page par l'id sur la table categorie
        $cat = $pageRepository->findByIdCategories($page['id_categorie']);

        $this->render('pageUpdate',['page'=> $page,'cat'=>$cat,'categories'=>$categories,'titre' => $page['titre'],'description' => $page['description']]);
        $titre = htmlspecialchars(trim($_POST['titre'] ?? ''));
        $slug = $this->slugify(trim($_POST['titre'] ?? ''));
        $description = htmlspecialchars(trim($_POST['description'] ?? ''));
        $id_catego = htmlspecialchars(trim($_POST['id_catego'] ?? ''));
        $contenu = htmlspecialchars(trim($_POST['contenu'] ?? ''));

        if($titre && $description && $contenu && $id_catego && $id) {

                if ($pageRepository->update($titre,$description,$slug,$contenu,$id_catego,$id)) {
                    $this->headerLoc('index');
                } else {
                    $message = "ça ne marche pas";
                }
            }

    }
}