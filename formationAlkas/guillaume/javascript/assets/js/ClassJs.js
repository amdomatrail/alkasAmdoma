class ClassJs extends Controller {

    constructor(elDeLaPage) {
        super()
        this.elDeLaPage = elDeLaPage
        this.container = document.createElement('div')

    }
    init() {
        this.container.textContent = "mon conteneur"
    }
    show() {
        this.elDeLaPage.appendChild(this.container)
    }

}
class Controller {
    constructor () {

    }
}