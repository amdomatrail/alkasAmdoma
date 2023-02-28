<?php


# Requête : récupération de l'id, et du nom,de la table ville
function listRoles(PDO $connexion) : array
{
    $roles = listAll($connexion, 'select * from roles');

    return $roles;
}