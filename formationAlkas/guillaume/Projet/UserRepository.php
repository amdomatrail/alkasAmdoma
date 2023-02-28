<?php

use src\GestionSQL;

class UserRepository
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
    function findByLogin(string $requeteLogin): array
    {
        return $this->gestionSQL->find($requeteLogin);
    }


}