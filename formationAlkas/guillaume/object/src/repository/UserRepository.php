<?php
class UserRepository
{
    public PDO $con;
    public function __construct(PDO $con)
    {
    }

    function findByLogin(string $login): array
    {
        return $this->find('select * from user where login = :login', [
            'login' => $login
        ]);
    }
};