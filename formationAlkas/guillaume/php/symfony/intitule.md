connexion server symfony:
symfony server:start
ou
php -S 127.0.0.1:8000 -t public
connexion mariadb :
sudo /etc/init.d/mariadb start

Création base de donnée :
symfony console doctrine:database:create

Création d'une table :
symfony console make:entity

Création de la migration:
php bin/console make:migration

Création de la migrate :
php bin/console doctrine:migrations:migrate

Création du contrôleur de la Class :
symfony console make:crud




return $this c'est un design pattern fluent pour chainer les objets

App/Controller
App est le nom de la région,
Controller est le nom de la ville
use App\Repository\UserRepository
use quand on veux utiliser un espace de nom

Affiche le contenu de l'article telquel sans les balises:
{{ article.content | raw}}

Lien qui permet d'envoyer vers la page blog_show avec l'id de l'article:
href="{{  path('blog_show', {'id': article.id}) }}"

form_row affiche un champ particulier et l'attr permet de mettre un attribut au champ:
{{ form_row(formArticle.title,{'attr':{'placeholder':"titre de l'article"}}) }}

Affiche la date de l'article sous la forme indiquée après le pipe :
{{ article.createAt | date('d/m/Y') }}

Affiche l'heure de l'article sous la forme indiquée après le pipe :
{{ article.createAt | date('H:i') }} 

permets accéder à l'image du fichier article en twig :
{{  article.image }}

faire un boucle dans un fichier twig :
{%  for article in articles %}
{% endfor %}

faire une condition if dans un fichier twig :
{%  if editMode %}
{% else %}
{% endif %}

base d'un fichier twig :
étends un modèle à un autre :
{% extends 'base.html.twig' %}

{%  block body %}
{%  endblock %}

Controller :
l'autowiring = Système d'injection de dépendances automatique par le conteneur.
l'inversion de contrôle

gang des fours ->design pattern


DataFixtures :
Les luminaires sont utilisés pour charger un "faux" ensemble de données 
dans une base de données qui peut ensuite être utilisé pour des tests ou 
pour vous aider à vous fournir des données intéressantes pendant que vous 
développez votre application

Enregistrer des données en "faux" :
$article = new Article(); création de l'objet "$article"
$article->setTitle("titre de l'aricle")
->setContent("Contenu de l'article ")
->setImage("image de l'article")
->setCreateAt(new \DateTime());
$manager->persist($article); indique à Doctrine de gérer l'objet, pas d'envoi vers la base de donnée
}
Lorsque la flush()méthode est appelée, Doctrine parcourt tous les objets qu'il gère 
pour voir s'ils doivent être conservés dans la base de données. Dans cet exemple, 
les articles de l'objet n'existent pas dans la base de données, 
donc le gestionnaire d'entités exécute un INSERT requête, créant une nouvelle ligne 
dans la table article.
$manager->flush(); 

Entity :

détails de la table avec les champs ainsi que tous les getteurs et setteurs

Repository :

$voiture est une entité
/ attribut de méthode ou de class
une interface est une class qui utilise des méthodes

#[Route('/', name: 'app_voiture_index', methods: ['GET'])]
public function findOneBy(VoitureRepository $voiture): Response
{
return $this->render('voiture/index.html.twig', [
'voitures' => $voitureRepository->findOneBy([
'id' =>'3'],[
'nom' =>'Jaguar']),
]);




