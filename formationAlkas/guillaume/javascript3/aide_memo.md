### début ds le JS

```js
// Les variables

var nomVariable // à ne pas utiliser ou presque jamais
nomVariable = 1
nomVariable = "test"

// Scope
if ("test" === nomVariable) {
    let nomVariableLet = 2 // marche que dans le scope (comme en php pour les constantes)
}

const autreVariable = 'test'

let tab = [123, 123, 123]

// ancienne façon d'écrire un tableau, ici l'on voit bien que l'on crée un objet qui s'appel tab2
let tab2 = new Array(123, 123, 123)

// alert(autreVariable)

let anthony = "5"
// alert( 3434 + 12)
// let tab2 = ['bla' => 'test',67676,343434]
// console.log(tab2[123])

// Attention les fonctions n'ont pas besoin de paramètre donc il y a dangé car la fonction n'est pas maître de ce qu'elle fait
function test() {
    alert(anthony)
}

test(anthony) // affiche 5


// affiche un popup qui demande des infos
 let blabla = prompt("Tapez quelque chose")

// fonction qui affiche un popup avec du texte seul et un bouton Ok
alert(blabla)

// let monChiffre = Number(prompt("Tapez un chiffre"))
// alert(monChiffre + 1)

```

### Les chaînes et les gabarits ou templates
https://developer.mozilla.org/fr/docs/Web/JavaScript/Reference/Template_literals 
Les chaînes de caractères restent inchangée par rapport au php sauf pour les gabarits qui sont représentés, entouré par des accents grave ou backtick
```js
let maChaine = 'toto'
let maChaine = "toto"
// la version gabarit est plus puissante puisqu'elle permet d'ajouter des variables et passer à la ligne sans faire des concaténations
let texte = "Bonjour,"
let maChaine = `${texte} ceci est 
une chaine 
de caractère`
// maChaine sera égale à Bonjour, ceci est une chaine de caractère

// Si on avait du l'écrire avec des guillements ou apostrophe, il aurait fallu l'écrire comme :
let maChaine = texte + " ceci est" +
    "ma chaine" +
    "de caractère"
```

### Pour afficher les infos sur les objets JS
```js
// information du navigateur
console.log(navigator);
// information sur notre fenetre de notre navigateur
console.log(window);
// toutes les infos sur notre page html
console.log(document)
// exemple recupere une fois la page html chargé tous les enfants de body
console.log(document.body.children);
// childNodes donne tous les noeuds (les elements + texte), dans ce cas présent du body
console.log(document.body.childNodes);
```


### Evenement
````html
<p id="monParagraphe">Saisir des données et s'arrêter dès que leur somme dépasse <span id="chiffreMax">500</span></p>
````

```js
let chiffreMax = 200

// récupére un element (la balise) dont l'identifiant est : chiffreMax sur la page html, comme on le fait en CSS
// #chiffreMax {color: red}
let elChiffreMax = document.querySelector('#chiffreMax')

document.querySelectorAll() // permet de trouver une liste d'élements 

document
// ici on cherche sur le document, donc la page html en entier mais on peut faire des recherches à partir d'autres éléments

// On vérifie qu'on a bien (l'objet) l'element pour savoir s'il a été trouvé pour faire du traitement ou autre
if (elChiffreMax) {
    elChiffreMax.textContent = chiffreMax
}

let elMonParagraphe = document.querySelector('#monParagraphe')

// addEventListener permet de créer un évenement, il faudra pour qu'il marche créer une fonction pour qu'il puisse l'appeler
elMonParagraphe.addEventListener('click', monParagrapheChangeCouleur)


function monParagrapheChangeCouleur(e) {
    // console.log(e.target)
    // console.log(this)
    this.style.color = "blue"
}
```

### Recherche des éléments
```js
// façon simple
let ulListOne = document.querySelector('#ulListOne')
let listLi = ulListOne.querySelectorAll('li')

// façon selector plus avancé
let listLi = ulListOne.querySelectorAll('#ulListOne > li')

// façon la plus rapide
let ulListOne = document.getElementById('ulListOne')
let listLi = ulListOne.getElementsByTagName('li')

// la même chose en une ligne
let listLi = document.getElementById('ulListOne').getElementsByTagName('li')
```

### DOM
Création d'un élément 
```js
let elem = document.createElement('div')
```
Ajouter un élément dans une autre élément

```js
autreElement.appendChild(elem)
```

Attribut ou propriété 
```js
    // change la valeur d'un champ par ex :
    elem.value = 5

    // création ou ajout d'un attribut dans un élément
    elem.setAttribute('id', "nomID")
```

### Execution du JS retardé

```js
// document.addEventListener('DOMContentLoaded', function ()  permet de charger la fonction uniquement quand toute la page en html uniquement est chargé (sans les images / css etc.) 
    
    document.addEventListener('DOMContentLoaded', lanceMesTests)

    function lanceMesTests()
    {
        alert(document.getElementById("test"))
    }
```

Autre solution, mais de façon différé grâce à un attribut sur la balise script
```js
    <script defer src="monJs.js"></script> 
```

### Les classes 
Cet exemple montre la création d'une classe et un héritage
```js
class Schwarze extends Robot {
    elDeLaPage = null // déclaration de propriété de classe
    
    constructor(elDeLaPage) { // en php public function __construct()
        super() // en php parent::__construct()
        this.elDeLaPage = elDeLaPage
    }
    
    container() {
        let oContainer = document.createElement('div')
        container.textContent = "mon conteneur"
        return oContainer
    }

    show() {
        this.elDeLaPage.appendChild(this.container())
        
        // exemple d'appel d'une méthode statique 
        console.log(ClassJs.addition(5, 6))
    }

    // Création d'une méthode statique 
    static addition(chiffre1, chiffre2) {
        return chiffre1 + chiffre2
    }
}

class Robot {
    constructor() {

    }
}
```

### Les modules

Les modules permettent d'inclure des fichiers JS comme on peut le faire en php via require_once()

**Première étape**, il faut ajouter l'attribut type="module" dans la balise script (par défaut, il charge les fichiers en différé)
```html
<script type="module" src="exos.js"></script>
```

**Seconde étape**, il faut exporter les variables / fonctions / classes

Généralement pour nous, ça sera une classe

ex : 
```js
    export default class MaClasse {
    
    }       
```

**Troisième étape** 

Il faut dans un fichier JS qui a besoin d'importer les autres fichiers, taper import NomDeLImport from NomFicherJS
```js
    import MaClasse from "MaClasse.js";

    const maClasse = new MaClasse()
```