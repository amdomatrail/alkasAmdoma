1. Que veut dire l'acronyme sql ?
- SQL Structured Query Language ou language de requête structurée

2. Comment sélectionne-t-on une base de donnée en ligne de commande ?
on regarde les bases de données disponibles avec shows databases; et on selectionne la base de données avec use nom_de_la_base

3. Comment faire un dump en ligne de commande et à quoi sert-il ?
sudo mysqldump -u root -p
nom_base > sauvegarde_de_ma_base.sql
le dump sert à sauvegarder la base de donnée.

4. Commment faire une importation en ligne de commande et à quoi ça sert ?

sudo mysql -u root -p pour ce connecter au serveur, puis use alkas2023(nom de la base de donnée),
    puis source + nom_du_fichier.sql de la table à importer.

5. Qu'est-ce qu'une colonne et que peut-elle dans une utilisation basique comporter à l'intérieur en donnant 4 exemples ?
une colonne est un champ.
exemple 1 : id type auto_increment contrainte identifiant
            nom type varchar (50)
            date_de_creation type date (10)
            adresse type varchar (255)

6. Compléter la création de cette table pour qu'elle est une clé primaire et qui s'autoincrémente,
une colonne de type entier et a pour valeur par défaut 10, une chaine de caractère de taille 50
```sql
CREATE TABLE nom_de_la_table (
id      Int  Auto_increment  NOT NULL ,
nom     Varchar (50) NOT NULL ,
code    Int DEFAULT 10,
,CONSTRAINT nom_de_la_table_PK PRIMARY KEY (id)
);

7. A quoi sert une clé primaire et quelle est son but ?
la clé primaire ou ID sert à identifier la table et sert de lien vers les autres tables.

8. Comment créer une clé étrange et quelle est son but ?
une clé étrangère ou FOREIGN KEY sert à relier des tables quand la cardinalité est de 1.1
On part de la table 1 , on lui rajoute une ligne avec un table2_id qui sera directement lié à l'id de la table 2.
CONSTRAINT table1_table2_FK FOREIGN KEY (table2_id) REFERENCES table2(id)

9. à quoi sert de faire de jointure (normale)?
la jointure sert à relier plusieurs tables entre elles.

10. Combien peut-on faire de jointure dans une requete ?
Le nombre de jointure n'est pas limitée.

11. Créez deux tables, une table voiture (à un nom : captur, clio, 208, 2008) puis une marque (comporte un nom : renault et peugeot)
Créez à partir de cette table 4 voitures et afficher les noms des voitures et leurs marques.

table voiture :
+----+--------+------------+-------+-----------+---------------+
| id | nom    | modele     | annee | id_marque | numero_modele |
+----+--------+------------+-------+-----------+---------------+
|  1 | clio   | captur     |  2008 |         1 |           208 |
|  3 | twingo | societe    |  2023 |         1 |             5 |
|  4 | boxer  | utilitaire |  2014 |         2 |          3008 |
|  5 | R5     | sw         |  1973 |         1 |             5 |
+----+--------+------------+-------+-----------+---------------+

table marque:
+----+---------+
| id | nom     |
+----+---------+
|  1 | renault |
|  2 | peugeot |
+----+---------+

select v.nom,v.modele,v.annee,v.numero_modele,m.nom  from voiture v inner join marque m on (v.id_marque = m.id);

+--------+------------+-------+---------------+---------+
| nom    | modele     | annee | numero_modele | nom     |
+--------+------------+-------+---------------+---------+
| clio   | captur     |  2008 |           208 | renault |
| twingo | societe    |  2023 |             5 | renault |
| boxer  | utilitaire |  2014 |          3008 | peugeot |
| R5     | sw         |  1973 |             5 | renault |
+--------+------------+-------+---------------+---------+

12. Créez une table moteur (comporte des chevaux : 75, 90, 110) et on voudra pouvoir afficher dans un seul champ : le nom voiture de la voiture Captur, son moteur et la marque
Creez la requete
+----+--------+------------+-------+-----------+---------------+-----------+
| id | nom    | modele     | annee | id_marque | numero_modele | moteur_id |
+----+--------+------------+-------+-----------+---------------+-----------+
|  1 | clio   | captur     |  2008 |         1 |           208 |         1 |
|  3 | twingo | societe    |  2023 |         1 |             5 |         2 |
|  4 | boxer  | utilitaire |  2014 |         2 |          3008 |         1 |
|  5 | R5     | sw         |  1973 |         1 |             5 |         3 |
+----+--------+------------+-------+-----------+---------------+-----------+

+----+---------+
| id | chevaux |
+----+---------+
|  1 |      75 |
|  2 |      90 |
|  3 |     110 |
+----+---------+
select v.nom,m.nom,mo.chevaux  from voiture v
inner join marque m on (v.id_marque = m.id)
join moteur mo on  (mo.id=v.moteur_id);
+--------+---------+---------+
| nom    | nom     | chevaux |
+--------+---------+---------+
| clio   | renault |      75 |
| twingo | renault |      90 |
| boxer  | peugeot |      75 |
| R5     | renault |     110 |
+--------+---------+---------+
13. créez une requete qui permet de chercher un modéle précis
select * from voiture v
where modele like ('cap%');


# Voir le résultat dans le dossier resultBis (sans regarder la solution dans la première évaluation)
2. Afficher les n° de conversations auxquelles a participé l'utilisateur "10" entre le '2020-1-31' et le '2021-10-11'

select distinct m.conversation_id from user u
join message m on u.id = m.user_id
and  date(m.date_creation) between  '2020-1-31' and '2021-10-11'
where user_id = 10;

3. Liste des users avec le total des msg écrits par conversation

select m.user_id, m.conversation_id, count(distinct m.id)
from message m
group by m.user_id, m.conversation_id;

4. Afficher les messages écrits par des admins inscrits en 2020 dans une conversation non terminée

SELECT *
FROM message m
JOIN user u ON m.user_id = u.id
JOIN roles r ON u.roles_id = r.id
JOIN conversation c ON m.conversation_id = c.id
WHERE r.nom = "admin"
AND YEAR(u.date_inscription) = "2020"
AND c.termine = 0;


Fin du spectacle !!!