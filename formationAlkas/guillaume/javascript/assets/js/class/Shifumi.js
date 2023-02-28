class Shifumi {
    constructor(el) {
        this.el = el
        this.scoreJoueur = 0
        this.scoreOrdi = 0
        this.btFeuille = ''
        this.btPierre = ''
        this.btCiseaux = ''
        this.btRejouer = ''
    }
    init() {

        let titreDuJeu = document.createElement('H1')
        titreDuJeu.textContent = 'Jeu du Shifumi'

        this.section = document.createElement("section")
        this.div = document.createElement("div")
        this.p = document.createElement("p")
        this.pScore = document.createElement("p")
        this.pGagne = document.createElement("p")

        this.div.appendChild(titreDuJeu)

        this.div.appendChild(this.boutonFeuille())
        this.div.appendChild(this.boutonPierre())
        this.div.appendChild(this.boutonCiseaux())
        this.boutonRejouer()

        this.div.appendChild(this.p)
        this.div.appendChild(this.pScore)
        this.div.appendChild(this.pGagne)
        this.section.appendChild(this.div)
        this.el.appendChild(this.section)
    }

    analyse(choixJoueur) {
        let ordi = Math.floor(Math.random() * 3)
        let resultat = ''
        let gagne = ''
        let shifumiTab = ['pierre', 'feuille', 'ciseaux']
        if (ordi === choixJoueur) {
            resultat = `égalité : vous avez joué ${shifumiTab[choixJoueur]} et l'ordi ${shifumiTab[ordi]}`
        } else if (1 === ordi && 0 === choixJoueur || 0 === ordi && 2 === choixJoueur || 2 === ordi && 1 === choixJoueur) {
            resultat = `perdu : vous avez joué ${shifumiTab[choixJoueur]} et l'ordi ${shifumiTab[ordi]}`
            this.scoreOrdi++
        } else {
            resultat = `gagné : vous avez joué ${shifumiTab[choixJoueur]} et l'ordi ${shifumiTab[ordi]}`
            this.scoreJoueur++
        }
        if (2 === this.scoreJoueur) {
            gagne = 'Fin de la partie, le joueur a gagné'
        } else if (2 === this.scoreOrdi) {
            gagne = 'Fin de la partie, l\'ordi a gagné'
        }

        this.affichage(resultat, gagne)
    }
    shifoumiPierre() {
        let choixJoueur = 0
        this.analyse(choixJoueur)
    }
    shifoumiFeuille() {
        let choixJoueur = 1
        this.analyse(choixJoueur)
    }
    shifoumiCiseaux() {
        let choixJoueur = 2
        this.analyse(choixJoueur)
    }
    affichage(resultat,gagne) {

        this.p.textContent = resultat
        this.pScore.textContent = "score du joueur :" + this.scoreJoueur + ", score de l'ordi : " + this.scoreOrdi
        if (gagne) {
            this.pGagne.textContent = gagne
            this.btPierre.disabled = true
            this.btCiseaux.disabled = true
            this.btFeuille.disabled = true
            this.btRejouer.disabled = false
            this.btRejouer.style.color = 'black'
            this.btRejouer.style.border = 'black'
            this.div.append(this.elButtonRejouer)
        }
    }
    shifoumiRejouer() {
        this.btPierre.disabled = false
        this.btFeuille.disabled = false
        this.btCiseaux.disabled = false
        this.btRejouer.disabled = true
        this.btRejouer.style.color = 'white'
        this.btRejouer.style.border = 'white'
        scoreJoueur = 0
        scoreOrdi = 0
        gagne = ''
        this.pGagne.textContent = gagne
        this.p.textContent = ''
        this.pScore.textContent = ''
    }
    boutonPierre() {
        let elButtonPierre = document.createElement("button")
        elButtonPierre.style.backgroundColor = 'blue'
        elButtonPierre.className = 'boutonPierre'
        elButtonPierre.type = 'button'
        elButtonPierre.textContent = 'Pierre'
        elButtonPierre.addEventListener('click', () => {
            this.shifoumiPierre()
        })
        this.btPierre = elButtonPierre
        return elButtonPierre
    }
    boutonCiseaux() {
        let elButtonCiseaux = document.createElement("button")
        elButtonCiseaux.style.backgroundColor = 'yellow'
        elButtonCiseaux.className = 'boutonCiseaux'
        elButtonCiseaux.type = 'button'
        elButtonCiseaux.textContent = 'Ciseaux'
        elButtonCiseaux.addEventListener('click', () => {
            this.shifoumiCiseaux()
        })
        this.btCiseaux = elButtonCiseaux
        return elButtonCiseaux
    }
    boutonFeuille() {
        let elButtonFeuille = document.createElement("button")
        elButtonFeuille.className = 'boutonFeuille'
        elButtonFeuille.type = 'button'
        elButtonFeuille.textContent = 'Feuille'
         elButtonFeuille.addEventListener('click', () => {
            this.shifoumiFeuille()
        })
        this.btFeuille = elButtonFeuille
        return elButtonFeuille
    }
    boutonRejouer() {
        let elButtonRejouer = document.createElement("button")
        elButtonRejouer.className = 'boutonRejouer'
        elButtonRejouer.type = 'button'
        elButtonRejouer.textContent = 'Rejouer'
        elButtonRejouer.addEventListener('click', () => {
            this.shifoumiRejouer()
        })
        this.btRejouer = elButtonRejouer
        return elButtonRejouer
    }
}


