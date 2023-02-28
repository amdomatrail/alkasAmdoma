// DOMContentLoaded pour charger la page Html avant de charger le script
// ...targ correspond à l'ensemble des arguments'
let body = document.querySelector('body')
let section = document.createElement("section")
let titre = document.createElement('H1')
let div = document.createElement("div")
let elButtonPierre = document.createElement("button")
let elContentButtonPierre = 'Pierre'
let elButtonFeuille = document.createElement("button")
let elContentButtonFeuille = 'Feuille'
let elButtonCiseaux = document.createElement("button")
let elContentButtonCiseaux = 'Ciseaux'
let elButtonRejouer = document.createElement("button")
let elContentButtonRejouer = 'Rejouer'
let p = document.createElement("p")
let pScore = document.createElement("p")
let pGagne = document.createElement("p")
let scoreJoueur = 0
let scoreOrdi = 0
let gagne = ''
let resultat = ''

section.append(titre)

titre.textContent = 'Jeu du Shifoumi'
elButtonRejouer.className = 'boutonRejouer'
elButtonRejouer.type = 'button'
elButtonPierre.style.backgroundColor = 'blue'
elButtonPierre.className = 'boutonPierre'
elButtonPierre.type = 'button'

div.append(elButtonPierre)

elButtonFeuille.className = 'boutonFeuille'
elButtonFeuille.type = 'button'

div.append(elButtonFeuille)

elButtonCiseaux.style.backgroundColor = 'yellow'
elButtonCiseaux.className = 'boutonCiseaux'
elButtonCiseaux.type = 'button'

div.append(elButtonCiseaux)
div.append(p)
div.append(pScore)
div.append(pGagne)

elButtonPierre.textContent = elContentButtonPierre
elButtonFeuille.textContent = elContentButtonFeuille
elButtonCiseaux.textContent = elContentButtonCiseaux
elButtonRejouer.textContent = elContentButtonRejouer

section.append(div)
body.append(section)

elButtonPierre.addEventListener('click', shifoumiPierre)
elButtonFeuille.addEventListener('click', shifoumiFeuille)
elButtonCiseaux.addEventListener('click', shifoumiCiseaux)
elButtonRejouer.addEventListener('click', shifoumiRejouer)

function shifoumiOrdi(choixJoueur) {
    let ordi = Math.floor(Math.random() * 3)
    switch (ordi) {
        case 0:
            switch (choixJoueur) {
                case 0:
                    resultat = "égalité l'ordi a joué Pierre"
                    break
                case 1:
                    resultat = "le joueur Feuille gagne sur l'ordi Pierre"
                    scoreJoueur++
                    break
                case 2:
                    resultat = "l'ordi Pierre gagne contre joueur Ciseaux"
                    scoreOrdi++
                    break
            }
            break
        case 1:
            switch (choixJoueur) {
                case 0:
                    resultat = "l'ordi Feuille gagne contre le joueur Pierre"
                    scoreOrdi++
                    break
                case 1:
                    resultat = "égalité l'ordi a joué Feuille"
                    break
                case 2:
                    resultat = "le joueur Ciseaux gagne sur l'ordi Feuille"
                    scoreJoueur++
                    break
            }
            break
        case 2:
            switch (choixJoueur) {
                case 0:
                    resultat = "le joueur Pierre gagne sur l'ordi Feuille"
                    scoreJoueur++
                    break
                case 1:
                    resultat = "l'ordi Ciseaux gagne contre le joueur Feuille"
                    scoreOrdi++
                    break
                case 2:
                    resultat = "égalité l'ordi a joué Ciseaux"
                    break
            }
            break
    }
    if (2 === scoreJoueur) {
        gagne = 'Fin de la partie, le joueur a gagné'
    } else if (2 === scoreOrdi) {
        gagne = 'Fin de la partie, l\'ordi a gagné'
    }
    affichage(resultat, scoreOrdi, scoreJoueur, gagne)
}
function shifoumiPierre() {
    let choixJoueur = 0
    shifoumiOrdi(choixJoueur)
}
function shifoumiFeuille() {
    let choixJoueur = 1
    shifoumiOrdi(choixJoueur)
}
function shifoumiCiseaux() {
    let choixJoueur = 2
    shifoumiOrdi(choixJoueur)
}
function affichage(resultat, scoreOrdi, scoreJoueur, gagne) {

    p.textContent = resultat
    pScore.textContent = "score du joueur :" + scoreJoueur + ", score de l'ordi : " + scoreOrdi
    if (gagne) {
        pGagne.textContent = gagne
        elButtonPierre.disabled = true
        elButtonFeuille.disabled = true
        elButtonCiseaux.disabled = true
        elButtonRejouer.disabled = false
        elButtonRejouer.style.color = 'black'
        elButtonRejouer.style.border = 'black'
        div.append(elButtonRejouer)
    }
}

function shifoumiRejouer() {
    elButtonPierre.disabled = false
    elButtonFeuille.disabled = false
    elButtonCiseaux.disabled = false
    elButtonRejouer.disabled = true
    elButtonRejouer.style.color = 'white'
    elButtonRejouer.style.border = 'white'
    scoreJoueur = 0
    scoreOrdi = 0
    gagne = ''
    pGagne.textContent = gagne
    p.textContent = ''
    pScore.textContent = ''

}