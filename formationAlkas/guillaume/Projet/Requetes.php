<?php

class Requetes
{
    public function __construc()
    {
    }

    public function GetRequeteLogin(string $login):string
    {
        return $this->requeteLogin = $requeteLogin = "'select * from user where login = :login',['login' => $login ]";

    }


}