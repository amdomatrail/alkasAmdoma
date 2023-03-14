export default class CalculatriceB {
    constructor(el) {

        this.el = el
    }

    init() {
        this.container = document.createElement('div')
        this.chiffrePremier = document.createElement('input')
        this.operateur = document.createElement('input')
        this.chiffreSecond = document.createElement('input')
        this.btCalcul = document.createElement('button')
        this.resultat = document.createElement('p')

        this.chiffrePremier.placeholder = "Veuillez donner un chiffre"
        this.operateur.placeholder = "Donnez un opérateur (+ - / *)"
        this.chiffreSecond.placeholder = "Veuillez donner un chiffre"
        this.btCalcul.textContent = "Calcul"
        this.btCalcul.addEventListener('click', () => {
            this.calcul()
        })

        this.container.appendChild(this.chiffrePremier)
        this.container.appendChild(this.operateur)
        this.container.appendChild(this.chiffreSecond)
        this.container.appendChild(this.btCalcul)
        this.container.appendChild(this.resultat)
    }
    calculatrice(chiffrePremier, operateur, chiffreSecond) {
        let result

        // if('+' === operateur ) {
        //     result = chiffrePremier + chiffreSecond
        // } else if('-' === operateur) {
        //     result = chiffrePremier - chiffreSecond
        // }

        switch (operateur) {
            case "+":
                result = chiffrePremier + chiffreSecond
                break
            case "-":
                result = chiffrePremier - chiffreSecond
                break
            case "*":
                result = chiffrePremier * chiffreSecond
                break
            case "/":
                result = chiffrePremier / chiffreSecond
                break
        }

        return result
    }

    calcul()
    {
        let result = this.calculatrice(Number(this.chiffrePremier.value), this.operateur.value, Number(this.chiffreSecond.value))
        this.resultat.textContent = result
    }

    show()
    {

        this.el.appendChild(this.container)
    }

}