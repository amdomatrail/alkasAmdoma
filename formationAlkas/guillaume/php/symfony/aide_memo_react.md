## babel
convertir du html en dom
## les composants :
'<Composant /> composant simple
<TroisiemeComposant titre='Ma super page'>ici c'est mon enfant</TroisiemeComposant>
titre est la propriété
ici c'est mon enfant est le children
function TroisiemeComposant ({titre,children}) 
{
    return <>
        <article>
            <header>
                <h1>{titre}</h1>
            </header>
             {children}
        </article>
        </>
    }'
## Pour inclure React dans symfony installation de webpack
Création d'un dossier assets dans symfony
composer require symfony/webpack-encore-bundle

### Webpack.config.js retirer les commentaires de :
// configure Babel
.configureBabel((config) => {
config.plugins.push('@babel/a-babel-plugin');
})
// enables Sass/SCSS support
.enableSassLoader()
// uncomment if you use React
.enableTeactPreset()
### Installation de sass:
https://webpack.js.org/loaders/sass-loader/
npm install sass-loader sass webpack --save-dev

## Changer la config de babel
.configureBabel((config) => {
// config.plugins.push('@babel/a-babel-plugin');
config.plugins.push('@babel/plugin-proposal-class-properties');
})
## Lancer : 
npm run watch
## Installer Bootstrap
npm install bootstrap --save-dev
## Renomer le fichier app.css dans assets en app.scss
et ajouter la ligne d'import dans app.scss
@import "~bootstrap/scss/bootstrap.scss";
## Remplacer dans app.js
import './styles/app.scss'

// start the Stimulus application
import './bootstrap'
require ('bootstrap')

## 