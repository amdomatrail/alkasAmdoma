
const elTemplateItem = document.querySelector('#template-item')
const elNouvelItem = document.querySelector('#nouvel-item')
const elListe = document.querySelector('#liste')

const elForm = document.querySelector('#myForm')
elForm.addEventListener('submit', function(e) {
    e.preventDefault()
    const elLi = elTemplateItem.content.cloneNode(true)
    const nomItem = elNouvelItem.value

    const elNom = elLi.querySelector('.nom')
    elNom.textContent = nomItem

    elListe.append(elLi)

    elNouvelItem.value = ''
    elNouvelItem.focus()
})