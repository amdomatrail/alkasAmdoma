


let container = document.createElement('div')
let choix = document.createElement('input')
let valid = document.createElement('button')
let resultat = document.createElement('p')
let scoreFinal = document.createElement('p')
let possibilite = ['pierre', 'feuille', 'ciseaux']
let score

initScore()

container.innerHTML = `<h1>Jeu du ShiFuMi</h1>`
valid.textContent = 'Jouer'
choix.placeholder = possibilite.join(', ')

// valid.addEventListener('click', function ()  {alert(this)})
// valid.addEventListener('click', () => {alert(3)})
valid.addEventListener('click', jouer)

container.appendChild(choix)
container.appendChild(valid)
container.appendChild(resultat)
container.appendChild(scoreFinal)

document.querySelector('main').appendChild(container)
choix.focus()

function initScore() {
    score = [0, 0]
}

function jouer() {

    try {

        let resultatDesJoueurs = ['égalité', 'Vous avez perdu espece de naze', 'I am the winnnnnnnnnner']

        let choixPersonne = personne(choix.value.toLowerCase(), possibilite)
        let choixOrdi = ordi()

        // console.warn(choixOrdi)
        // console.error(analyse(0, 0))
        // console.error(analyse(0, 1))
        // console.log(analyse(0, 2))

        let resultatDuConcours = analyse(choixPersonne, choixOrdi)

        resultat.innerHTML = `Vous avez choisi : ${possibilite[choixPersonne]}<br>
                          L'ordi a choisi : ${possibilite[choixOrdi]}<br>
                          ${resultatDesJoueurs[resultatDuConcours]}`

        scoreFinal.innerHTML = `Votre score est ${score[0]} vs le score de l'ordi ${score[1]}`

        if (score[0] > 1) {
            initScore()
            scoreFinal.innerHTML += `<br>Vous avez gagné la partie`
            resultat.innerHTML = ''
        } else if (score[1] > 1) {
            initScore()

            resultat.innerHTML = ''
            scoreFinal.innerHTML += `<br>Vous avez perdu la partie`
        }
    } catch (e) {
        alert(e)
    }
}

function analyse(choixPersonne, choixOrdi) {
    // let result = 0

    // if (choixPersonne !== choixOrdi) {
    //     result = 1 // perdu

    // 0 = pierre, 1 = feuille, 2 = ciseaux
    // switch (choixPersonne) {
    //     case 0:
    //         if(2 === choixOrdi) {
    //             result = 2 // gagne
    //         }
    //         break
    //
    //     case 1:
    //         if(0 === choixOrdi) {
    //             result = 2
    //         }
    //
    //         break
    //
    //     case 2:
    //         if(1 === choixOrdi) {
    //             result = 2
    //         }
    //
    //         break
    // }

    if (choixPersonne === choixOrdi) {
        result = 0 // egalite
    } else if (
        0 === choixPersonne && 2 === choixOrdi ||
        1 === choixPersonne && 0 === choixOrdi ||
        2 === choixPersonne && 1 === choixOrdi
    ) {
        result = 2 // on gagne
        score[0]++
        // score[0] = score[0] +1
    } else {
        result = 1 // on perd
        score[1]++
    }

    // }

    return result
}

function ordi() {
    return Math.round(Math.random() * 2)
}

function personne(choix, possibilite) {
    let result = -1

    for (let i = 0; i < possibilite.length; i++) {
        if (choix === possibilite[i]) {
            result = i
            break
        }
    }

    if (-1 === result) {
        throw "Veuillez choisir un choix entre (" + possibilite.join(', ') + ')'
    }

    return result
}