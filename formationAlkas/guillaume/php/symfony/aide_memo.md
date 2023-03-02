# Symfony

Création projet symfony :

1 - se mettre sous le bon répertoire d'installation
si le projet s'appelle montagne tapez :

symfony new montagne --version=5.4

se mettre sous le répertoire du projet créé
composer req maker --dev

composer req profiler --dev

composer req symfony/orm-pack -W

symfony console doctrine:database:create

php bin/console doctrine:migrations:migrate

composer require form validator security-csrf annotations

php bin/console make:crud

symfony console make:entity

php bin/console make:migration

php bin/console doctrine:migrations:migrate

## pour lancer un deuxième symfony :
se mettre dans le répertoire public de symfony et taper :
php -S 127.0.0.1:8001 -t public


### Installer l'outil symfony

https://symfony.com/download

### Installer composer

https://getcomposer.org/download/

Sous windows, il faut créer un fichier dans **Utilisateurs\SonNomD'Utilisateur\composer.bat** et taper 

    php composer.phar %1 %2 %3 %4 %5 %6

Puis ajouter une variable d'environnement windows

### Installer un projet symfony

https://symfony.com/doc/current/setup.html#symfony-lts-versions

    symfony new my_project_name (dernière version minimum)

Options que l'on peut ajouter

    --version=5.4 (version précise 5.4)
    --version=lts (version long time support)
    --full (version de complète pour le web par exemple, mais lourd si on n'a pas besoin de toutes les dépendances)

ou via composer 

	composer create-project symfony/skeleton my_project  (version de minimum)
	composer create-project symfony/skeleton:"^5.4" my_project_name
	composer create-project symfony/website-skeleton my_project  (version de complète)
	composer create-project symfony/website-skeleton:”^5.4” my_project_name (version de complète 5.4)

### Ajouter deux bundles symfony
    
    composer req maker --dev
    composer req profiler --dev

***--dev*** precise à composer lors d'un déploiment en production que ces bundles ne seront pas installés

### Création d'un contrôleur symfony
    symfony console make:controller
ou

    php bin/console make:controller

### Éxecuter un projet
    symfony server:start
ou

    php -S 127.0.0.1:8000 -t public

(
-S serveur
ip local
: port
-t dossier ou se trouve son fichier principal php
)

### Quand on partage un projet symfony sur git et que l'on veut le tester ou le mettre en production, le dossier ***var*** et ***vendor*** n'existe plus
Il va falloir obligatoirement taper ça:

    composer i
Ça permet de réinstaller toutes les dépendances du projet

Pour faire une mise à jour des dépendances on pourra taper

    composer u 

### Ajouter le bundle formulaire dans son projet

    composer req form

Documentation sur les formulaires (création, type, validation, etc.) https://symfony.com/doc/current/forms.html


## PhpUnit
PhpUnit permet de tester son code complétement

    composer require --dev phpunit/phpunit

Dans le dossier tests, il faut créer une classe qui a pour suffixe Test, ex : CalculeTest

Les méthodes doivent avoir pour préfixes Test, TestMultiplication


## Base de donnée

### Ajouter le bundle doctrine 
    composer req symfony/orm-pack -W

### Cloner le fichier .env en .env.local
Ça sert à sécuriser les données sensibles telles que le **login** et **password** de sa base de donnée ou le **app_secret** de symfony 

etc. 

### Créer ma base de donnée via symfony
    symfony console doctrine:database:create
ou

    php bin/console doctrine:database:create

### Créer une entité
    symfony console make:entity
ou

    php bin/console make:entity

### Ajouter dans notre base de donnée toutes les modifications précédentes
Crée un fichier php avec les requêtes sql

    symfony console make:migration
ou

    php bin/console make:migration

Lance-les requêtes sql

    symfony console doctrine:migrations:migrate
ou

    php bin/console doctrine:migrations:migrate

Autre possibilité de mettre à jour sa base de donnée

    symfony console doctrine:schema:update --dump-sql
ou

    php bin/console doctrine:schema:update --dump-sql

### Créer un CRUD (Create Read Update Delete) après avoir créé son entité
    symfony console make:crud
ou

    php bin/console make:crud	


**--dump-sql** permet de voir toutes les requêtes qu'il va faire
une fois qu'on a vérifié alors on peut exécuter les requêtes 

    symfony console doctrine:schema:update --force
ou

    php bin/console doctrine:schema:update --force

**--force** force la mise à jour

### Création d'utilisateur
Création d'un utilisateur en utilisant les paramètres par défaut

    symfony console make:user
ou

    php bin/console make:user

Authentification

    symfony console make:auth
ou

    php bin/console make:auth

Création du formulaire d'enregistrement

    symfony console make:registration-form
ou

    php bin/console make:registration-form

Modifier le premier role dans la base donnée, dans la table user 

    ["ROLE_ADMIN"]

Requête SQL pour le modifier directement 

    UPDATE user SET roles = ["ROLE_ADMIN"] WHERE id=1;

Pour permettre de vérifier un type d'utilisateur dans twig, il faudra installer extra-bundle

    composer require twig/extra-bundle

en twig
    
    {% if is_granted('ROLE_ADMIN') %} blabla {% endif %}


# API RestFul (client)
Il faut installer 

     composer require symfony/http-client

Ça va nous permettre d'avoir accès à des api restful distante comme Google maps ou de météo ou récupération des informations sur github ou autre

Voir ce site pour plus d'information 

https://symfony.com/doc/current/http_client.html
    
doc api restful

https://www.gekko.fr/blog/les-bonnes-pratiques-a-suivre-pour-developper-des-apis-rest


# Upload de fichier
Voir doc symfony (https://symfony.com/doc/current/controller/upload_file.html)

Analyser le format mime
    
    composer req symfony/mime


# Configuration d'un serveur apache
C'est obligatoire pour accéder aux routes de symfony en prod

    composer req symfony/apache-pack


# SSL (HTTPS)
Configurer en mode https plutôt que http en local (https://symfony.com/doc/current/setup/symfony_server.html#enabling-tls)

    symfony server:ca:install

## tester son role :

## Return this
sert à chainer avec le design patern fluent.

## #[IsGranted('ROLE_USER')]

Permet d'autoriser un accès en controlant la connexion d'un utilisateur 