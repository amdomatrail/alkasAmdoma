<?php
# Requête : récupération de l'id, du nom, du prénom et du login de la table user
function listUsers(PDO $connexion)
{
    return  listAll($connexion, 'select u.id,u.nom,u.prenom,u.login from user u
                                        
                                    order by id desc');

};
function utilisateur(PDO $connexion,int $id)
{
    return listAll($connexion, 'select u.id,u.nom,u.prenom,r.nom nom_role from user u
                           join roles r on r.id = u.roles_id
                           where u.id =:id',[
    ':id' => $id,
    ]);
};
function connexUser(PDO $connexion,string $login)
{
    return listAll($connexion, 'select u.id,u.nom,u.prenom,u.login,u.mot_de_passe from user u
                           where u.login =:login',[
        ':login' => $login,
    ]);
};

function login(PDO $connexion,string $login)
{
    return listAll($connexion, 'select * from user u
                                where u.login =:login',[
        ':login' => $login,
    ]);
};

function loginLog(PDO $connexion,string $login)
{
    return find($connexion, 'select * from user u
                                where u.login =:login',[
        ':login' => $login
    ]);
};
function motPasse(PDO $connexion,string $login)
{
    return listAll($connexion, 'select u.mot_de_passe from user u
                                where u.login =:login',[
        ':login' => $login,
    ]);
};