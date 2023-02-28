<?php

class ManageSql
{
    private PDO $con;
    public function __construct()
    {
        $this->connexion();
    }
    public function connexion ():void
    {
        // connexion à la db
        $this ->con = new PDO('mysql:dbname='.PDO_DBNAME.';host=localhost', PDO_USERNAME,PDO_PASSWORD, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function find(string $req,array $tab=[]):array
    {
        $prepare = $this->con->prepare($req);
        $prepare->execute($tab);
        return $prepare->fetch();

    }

}
