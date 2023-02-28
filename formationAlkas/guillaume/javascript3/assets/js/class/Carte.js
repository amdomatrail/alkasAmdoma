export default class Carte {

    cat = 'https://api.thecatapi.com/v1/images/search'

    constructor(elPage)
    {
        this.elPage = elPage
    }
    carteP()
    {
        fetch(this.cat).then((reponse) => {
            if (reponse.ok) {
                reponse.json().then(data => this.carte(data))
            }
        })

    }

    carte(data)
    {

        this.elPage.innerHTML = `
<div class="d-flex justify-content-between">
    <span>
         <img src="${data[0].url}" alt="" style="width: 350px" >
    </span>
</div>
`
    }

    init()
    {
        this.carteP()
    }

}