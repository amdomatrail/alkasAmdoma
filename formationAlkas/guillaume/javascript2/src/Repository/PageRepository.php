<?php

use src\GestionSQL;

class PageRepository
{
    public function __construct(private GestionSQL $gestionSQL)
    {
    }

    public function find(int $id): array
    {
        return $this->gestionSQL->find('select * from page where id=:id', [
            'id' => $id
        ]);
    }

    public function findAll(): array
    {
        return $this->gestionSQL->findAll('select * from page');
    }

    /**
     * Cherche un utilisateur via son login
     *
     * @param string $slug
     * @return array
     */
    public function findBySlug(string $slug): array
    {
        return $this->gestionSQL->find('
            select *
            from page
            where slug = :slug', [
            'slug' => $slug
        ]);
    }

    public function insert(array $data): int
    {
        return $this->gestionSQL->insert(
            "insert into page  (`slug`, `titre`, `description`, `date_creation`, `menu`, `content`) 
                    VALUES 
                    (:slug, :titre, :description, now(), :menu, :content)", $data);

    }

    public function update(array $data): int
    {
        var_dump($data);
        return $this->gestionSQL->updateOrDelete(
            "
            update page set 
                `slug` = :slug, 
                `titre` = :titre, 
                `description` = :description, 
                `date_modification` = now(), 
                `menu` = :menu, 
                `content` = :content
            where 
                id = :id
            ", $data);

    }

    public function delete(int $id): int
    {
        return $this->gestionSQL->updateOrDelete(
            "delete from page where id=:id", ['id' => $id]);
    }

}