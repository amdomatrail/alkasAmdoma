let listLi = ulListOne.querySelectorAll('#ulListOne > li')

let resultDiv = document.createElement('div')
// resultDiv.setAttribute("id", "result")


for (let i = 0; i < listLi.length; i++) {
    listLi[i].textContent = "Blabla "+ (i + 1)

    listLi[i].addEventListener('click', clicList)

    function clicList()
    {
        resultDiv.textContent = "Item " + (i + 1)
    }
}

document.querySelector("article[role=article]").appendChild(resultDiv)