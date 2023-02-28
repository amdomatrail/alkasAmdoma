export default class Shifu {
    elPage = null
    container = null
    valid = null
    choix = null
    resultat = null
    scoreFinal = null
    possibilite = ['pierre', 'feuille', 'ciseaux']
    choixPersonne = null
    choixOrdi = null
    score = null
    resultatDesJoueurs =[]
    resultatDuConcours

    constructor(elPage)
    {
        this.elPage = elPage
    }

    init()
    {
        this.container = document.createElement('div')
        this.choix = document.createElement('input')
        this.valid = document.createElement('button')
        this.resultat = document.createElement('p')
        this.scoreFinal = document.createElement('p')
        initScore()
        this.container.innerHTML = `<h1>Jeu du ShiFuMi</h1>`
        this.valid.textContent = 'Jouer'
        this.choix.placeholder = this.possibilite.join(', ')
        this.valid.addEventListener('click', jouer)
        this.container.appendChild(this.choix)
        this.container.appendChild(this.valid)
        this.container.appendChild(this.resultat)
        this.container.appendChild(this.scoreFinal)
        document.querySelector('main').appendChild(this.container)
        this.choix.focus()
    }
}
initScore()
{
    return this.score = [0, 0]
}

jouer()
{
        this.resultatDesJoueurs = ['égalité', 'Vous avez perdu espece de naze', 'I am the winnnnnnnnnner']

        this.choixPersonne = personne(this.choix.value.toLowerCase(), this.possibilite)
        this.choixOrdi = Math.round(Math.random() * 2)

        this.resultatDuConcours = analyse(this.choixPersonne, this.choixOrdi)

        this.resultat.innerHTML = `Vous avez choisi : ${this.possibilite[this.choixPersonne]}<br>
                          L'ordi a choisi : ${this.possibilite[this.choixOrdi]}<br>
                          ${this.resultatDesJoueurs[this.resultatDuConcours]}`

        this.scoreFinal.innerHTML = `Votre score est ${this.score[0]} vs le score de l'ordi ${this.score[1]}`

        if (this.score[0] > 1) {
            initScore()
            this.scoreFinal.innerHTML += `<br>Vous avez gagné la partie`
            this.resultat.innerHTML = ''
        } else if (this.score[1] > 1) {
            initScore()
            this.resultat.innerHTML = ''
            this.scoreFinal.innerHTML += `<br>Vous avez perdu la partie`
        }
}

analyse(this.choixPersonne, this.choixOrdi)
{
    if (this.choixPersonne === this.choixOrdi) {
        this.result = 0 // egalite
    } else if
    (
        0 === this.choixPersonne && 2 === this.choixOrdi ||
        1 === this.choixPersonne && 0 === this.choixOrdi ||
        2 === this.choixPersonne && 1 === this.choixOrdi
    ) {
        this.result = 2 // on gagne
        this.score[0]++
        // score[0] = score[0] +1
    } else {
        this.result = 1 // on perd
        this.score[1]++
    }

    // }

    return this.result
}

personne(this.choix, this.possibilite)
{
    this.result = -1

    for (let i = 0; i < this.possibilite.length; i++) {
        if (this.choix === this.possibilite[i]) {
            this.result = i
            break
        }
    }

    if (-1 === this.result) {
        throw "Veuillez choisir un choix entre (" + this.possibilite.join(', ') + ')'
    }

    return this.result
}