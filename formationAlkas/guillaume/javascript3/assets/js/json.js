let contactJson = {

    "contacts": [
        {
            "nom" : "Durand",
            "prenom" : "Guillaume",
            "mail" : "amdoma@jojo.fr",
        },
        {
            "nom" : "Dufour",
            "prenom" : "Jojo",
            "mail" : "amdi@yahoo.com",
        },

    ]
}
let card = document.getElementById('carte')
let cat =['nom','prenom','mail']

for (let jojo in contactJson.contacts)
{

    card.innerHTML +=
                `
<div  class="col-auto">
    <div class="card">
      <div class="card-header">
        Fiche contact :
      </div>
      <div class="card-body">
        <h5 class="card-title">${contactJson.contacts[jojo].nom}</h5>
        <p class="card-text">${contactJson.contacts[jojo].prenom}</p>
        <a href="#" class="btn btn-primary">${contactJson.contacts[jojo].mail}</a>
      </div>
    </div>
</div>
          `

}
