<?php
# Requête : récupération du nom, du prénom, de la table user, du nom du rôle dans la table role et du contenu et de la date de création dans la table message
function listMessagesFromUserID(PDO $connexion,$id):array
{
    return listAll($connexion, 'select m.contenu,m.date_creation from message m
where user_id =\''.$id.'\'');


}