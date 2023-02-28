<?php

use src\GestionSQL;

class PageRepository
{
    public function __construct(private GestionSQL $gestionSQL)
    {
    }

    /**
     * Cherche un utilisateur via son login
     *
     * @param string $login
     * @return array
     */
    function findById(int $id): array
    {
        return $this->gestionSQL->find('
            select *
            from pages
            where id = :id', [
            'id' => $id
        ]);
    }

    function listPages(): array
    {
        return $this->gestionSQL->findAll('select * from pages');

    }

    function findBySlug(string $slug): array
    {
        return $this->gestionSQL->find('
            select *
            from pages
            where slug = :slug', [
            'slug' => $slug
        ]);
    }

    public function deletePage(int $id): array
    {
        return $this->gestionSQL->find('
            delete from pages
            where id = :id', [
            'id' => $id
        ]);
    }

    function createPage(string $titre,string $description,string $dateCreation,string $dateModification,string $slug,string $contenu):bool
    {
        $id = $this->gestionSQL->create(' insert into pages (titre,description,slug,contenu,date_creation,date_modification) values 
                  (:titre,:description,:slug,:contenu,:date_creation,:date_modification)', [
            ':titre' =>$titre,
            ':description' =>$description,
            ':slug' =>$slug,
            ':date_creation' =>$dateCreation,
            ':contenu' =>$contenu,
            ':date_modification' =>$dateModification,
        ]);

        return $id;
    }
    public function modifPage(string $titre,string $description,string $dateModification,string $slug,string $contenu,int $id):bool
    {
        /*$this->gestionSQL->modif('
            UPDATE pages p SET p.titre = :titre,
                   p.description = :description,
                   p.slug = :slug,
                   p.contenu = :contenu,
                   p.date_modification = :dateModification
                   WHERE p.id =:id ',
            [
            'titre' =>$titre,
            'description' =>$description,
            'slug' =>$slug,
            'contenu' =>$contenu,
            'date_modification' =>$dateModification,
            'id' => $id,
        ]);*/

        $this->gestionSQL->modif('
            UPDATE pages SET titre = :titre,
                   description = :description,
                    contenu = :contenu,
                    date_modification = :date,
                            slug = :slug
                   WHERE id =:id ',
            [
            'titre' =>$titre,
                'slug' =>$slug,
                'contenu' =>$contenu,
                'description' =>$description,
                'date' =>$dateModification,
            'id' => $id,
        ]);

        return $id;
    }

}