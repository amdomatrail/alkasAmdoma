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
    function findCategories(): array
    {
        return $this->gestionSQL->findAll('select * from categories');
    }
    function findByIdCategories(int $id): array
    {
        return $this->gestionSQL->find('select * from categories where id = :id', [
            'id' => $id ]);

    }
    public function delete(int $id): int
    {
        return $this->gestionSQL->updateOrDelete('
            delete from pages
            where id = :id', [
            'id' => $id
        ]);
    }

    public function insert(array $data): int
    {
        return $this->gestionSQL->insert(
            "insert into pages  (`titre`, `description`, `slug`,`contenu`,`date_creation`,`date_modification`,`id_categorie`) 
                    VALUES 
                    (:titre, :description, :slug, :contenu, now(),now(),:id_categorie)", $data);

    }
    public function update(string $titre,string $description,string $slug,string $contenu,int $id_catego,int $id):bool
    {

        $this->gestionSQL->updateOrDelete('
            UPDATE pages SET id_categorie = :id_catego,
                             titre = :titre,
                   description = :description,
                    slug = :slug,
                     contenu = :contenu,
                    date_modification = now()
                   WHERE id =:id ',
            [
                'id_catego' =>$id_catego,
            'titre' =>$titre,
                'description' =>$description,
                'slug' =>$slug,
                'contenu' =>$contenu,
            'id' => $id,
        ]);

        return $id;
    }

}