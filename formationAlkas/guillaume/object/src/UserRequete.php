<?php

use src\GestionSQL;

class UserRequete
{

    public function __construct(private GestionSql $gestionSql)
    {
    }
    function findByLogin(string $login): array
    {
        return $this->gestionSql->find('select * from user where login = :login', [
            'login' => $login
        ]);
    }
};