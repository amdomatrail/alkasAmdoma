class Todo {
    constructor(el) {
        this.el = el
        this.elPut=''
        this.elementLi=''
    }

    init() {

        this.section = document.createElement("section")
        this.titre = document.createElement('H1')
        this.div = document.createElement("div")
        this.divForm = document.createElement('div')
        this.ul = document.createElement("ul")
        this.section2 = document.createElement("section")
        this.titre2 = document.createElement('H1')
        this.div2 = document.createElement('div')
        this.ul2 = document.createElement("ul")

        this.section.append(this.titre)
        this.titre.textContent = 'Tache à faire'

        this.divForm.appendChild(this.champ())
        this.divForm.appendChild(this.bouton())
        this.section.appendChild(this.divForm)
        this.div.appendChild(this.ul)
        this.section.appendChild(this.div)
        this.el.appendChild(this.section)
        this.section2.appendChild(this.titre2)
        this.div2.appendChild(this.ul2)
        this.section2.appendChild(this.div2)
        this.el.appendChild(this.section2)
    }
        elSubmit()
        {
            let elLi = document.createElement("li")

            elLi.textContent = this.elPut.value
            this.elementLi = this.elPut.value
            elLi.append(this.boutonSupp())

            elLi.append(this.boutonFait())

            this.ul.append(elLi)

            this.elPut.value = ''
            this.elPut.focus()

        }

        bouton()
        {
            let elButton = document.createElement("button")
            elButton.className = 'boutonPierre'
            elButton.type = 'button'
            elButton.textContent = 'Ajouter'
            elButton.addEventListener('click', () => {
                this.elSubmit()
            })
            return elButton
        }

        champ()
        {
            let elInput = document.createElement("input")
            elInput.className = 'input'
            elInput.type = 'text'
            elInput.placeholder = 'saisir un mot'
            elInput.focus()
            this.elPut = elInput
            return elInput
        }

        boutonSupp()
        {
            let elButtonSupprimer = document.createElement('button')
            elButtonSupprimer.style.color = 'white'
            elButtonSupprimer.style.border = '1px solid white'
            elButtonSupprimer.style.borderRadius = '30px'
            elButtonSupprimer.style.backgroundColor = 'red'
            elButtonSupprimer.type = 'button'
            elButtonSupprimer.textContent = 'supprimer'
            elButtonSupprimer.addEventListener('click', () => {
                this.elSupp()
            })
            return elButtonSupprimer
        }
        boutonFait()
        {
            let elButtonFait = document.createElement('button')
            elButtonFait.style.color = 'white'
            elButtonFait.style.border = '1px solid white'
            elButtonFait.style.borderRadius = '30px'
            elButtonFait.style.backgroundColor = 'blue'
            elButtonFait.type = 'button'
            elButtonFait.textContent = 'Fait'

            elButtonFait.addEventListener('click', () => {
                this.elFait()
            })

            return elButtonFait
        }

    elFait()
    {
        this.titre2.textContent = 'Tache faîtes'
        let li2 = document.createElement("li")
        li2.textContent = this.elementLi.value

        this.ul2.append(li2)
        this.elementLi.remove()
    }

}