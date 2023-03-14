## Ecrire les tables avec leur nom et le contenu de chacune
## Définir les liaisons entre elles
## symfony new nom_du_projet --webapp
pour installer symfony avec toutes les fonctionnalités.
## créé un fichier readme.md pour savoir comment fonctionne le site
## création d'un dépot GitLab
## Pipeline d'intégration continue

## création d'un projet (commencé par créé la table user)
symfony new --full petiteannonces
# Gestion de la page d'accueil
php bin/console make:controller MainController
chnager la route avec '/' et l'id de la route en app_home
# Création de la base de donnée:alkas_2023
DATABASE_URL="mysql://root:Amdoma385651@127.0.0.1:3306/alkas_2023?serverVersion=mariadb-10.6.11&charset=utf8mb4"
php bin/console doctrine:database:create 
# création de l'entité user:
php bin/console make:user
# création de la migration et envoie de celle-ci
php bin/console make:migration
php bin/console doctrine:migrations:migrate
# Authentification de l'auth de symfony
php bin/console make:auth
choisir un nom de Class UsersAuthentificator ( en option )
dans sécurity/UsersAuthentificator changer la ligne de route
return new RedirectResponse($this->urlGenerator->generate('app_home'));(en ligne 50)
# création d'un formulaire d'enregistrement :
php bin/console make:registration-form
il est possible qu'il y est un message demandant d'intaller
(composer require symfonycasts/verify-email-bundle)
des instructions apparaissent
# Réinitialiser un mot de pass ( mot de pass oublié )
php bin/console make:reset-password
route app_login pour se reconnecter et mettre une adresse email

## inclure un fichier Css et Js :
le fichier Css doit être mis dans le dossier public
public/css/styles.css
dans la base mettre le lien à la fin de la balise head:
< link rel="stylesheet" href="{{ asset('css/styles.css') }}">

le fichier js doit être mis dans le dossier public
public/js/scripts.js
dans la base mettre le lien à la fin de la balise head:
<script src="{{ asset('js/scripts.js') }}"></script>

## vidéo n°3 Slug
composer require antishov/doctrine-extensions-bundle
creation du fichier doctrine_extensions.yaml dans config/packages/test
modifier default_locale:fr_FR
orm:
    default:
        sluggable:true
        timestampable:true
modification de l'entité
Gedmo\Slug(fields={"title"} sur le l'entité du titre
et retirer le Setslug

Gedmo\Timestampable(on="create")
et retirer le setCreatedAt
## SubmitType::class,TextType::class, TextareaType::class,EntityType::class,
    ['class' => Categorie::class]






