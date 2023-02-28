class ClassJs {
    constructor(elDeLaPage) { // en php public function __construct()
         // en php parent::__construct()
        this.elDeLaPage = elDeLaPage
        this.container = document.createElement('div')
    }

    init() {
        this.container.textContent = "mon conteneur"
    }

    show() {
        this.elDeLaPage.appendChild(this.container)
        // ClassJs.addition()
    }

    static addition(chiffre1, chiffre2) {
        return chiffre1 + chiffre2
    }
}



