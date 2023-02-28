export default class Profil {

    fauxProfil = 'https://randomuser.me/api/?format=json&nat=fr&results=10'

    constructor(elPage) {
        this.elPage = elPage
    }

    carteP() {
        fetch(this.fauxProfil).then((reponse) => {
            if (reponse.ok) {
                reponse.json().then(data => this.profil(data))

            }
        })
    }

    profil(data) {
        let array = []


        let newDiv = document.createElement("div")
        let article = document.getElementById('profil')
        this.afficher(array)
        for (let i = 0; i < 10; i++) {
            array[i] = data['results'][i]['name']['last']
            array[i] = array[i].toLowerCase()

            let genre = ''
            let genreData = data['results'][i]['gender']
            if ('female' === genreData) {
                genre = 'femme'
            } else {
                genre = 'homme'
            }
            article.innerHTML += `
                    <div class="card">
                            <h5 class="card-header" id="elHeader">
                                <div >
                                    <span>
                                    nom : ${data['results'][i]['name']['last']}
                                    prenom : ${data['results'][i]['name']['first']}<br>
                                    </span>
                                </div>
                            </h5>
                        
                            <div class="card-body">
                                <span>
                                    genre : ${genre}<br>
                                    tel : ${data['results'][i]['phone']}<br>
                                    email : ${data['results'][i]['email']}<br>
                                </span>
                                 <span>
                                 <img src="${data['results'][i]['picture']['large']}" alt="" style="width: 100px" >
                                </span>
                            </div>
                    </div>
`
            newDiv.append(article)
            document.body.append(newDiv)
        }


    }

    init() {
        this.carteP()
    }

    afficher(array) {

        let saisie = ''

        saisie = document.getElementById('affiche')
        document.addEventListener('keypress', logKey);

        function logKey(e) {

             alert(saisie.value)
                }
            }

    }
