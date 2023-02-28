<?php
function connex ():PDO
{

    // connexion à la db
    $connexion = new PDO('mysql:dbname='.PDO_DBNAME.';host=localhost', PDO_USERNAME,PDO_PASSWORD, [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    return $connexion;
};

function listAll(PDO $connexion, string $req,array $tab =[]):array
{
    $prepare = $connexion->prepare($req);
    $prepare->execute($tab);
    return $prepare->fetchAll();

};

function find(PDO $connexion, string $req,array $tab =[]):array
{
    $prepare = $connexion->prepare($req);
    $prepare->execute($tab);
    return $prepare->fetch();

};

function addUser (PDO $connexion,int $roleId,string $login,string $prenom,string $nom,string $dateNaissance,string $password) : bool
{
    $prepare = $connexion->prepare(' insert into user (roles_Id,login,prenom,nom,date_naissance,date_inscription,mot_de_passe) values 
                  (:roles_id,:login,:prenom,:nom,:date_naissance,now(),:mot_de_passe)');
    $result = $prepare->execute([
        ':roles_id' =>$roleId,
        ':login' =>$login,
        ':prenom' =>$prenom,
        ':nom' =>$nom,
        ':date_naissance' =>$dateNaissance,
        ':mot_de_passe' =>$password,
    ]);
    return $result;
}

