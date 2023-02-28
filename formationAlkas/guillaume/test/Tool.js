
class Tool {

        constructor() {

        }
        monBouton() {
        let styles = `
            button {
            display: inline-block;
            background-color: #0d6efd;
            border-radius: 10px;
            border: 1px double #cccccc;
            color: #eeeeee;
            text-align: center;
            font-size: 1rem;
            padding: 12px;
            width: 97px;
            height: 42px;
            transition: all 0.5s;
            cursor: pointer;
            margin: 2px;
            }
            button span {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
            }
            button:hover {
            background-color: #0a58ca;
            }`

                let container = document.createElement("div")
                container.innerHTML = `<button>
            <span>Envoyer</span>
            </button>`
                body.appendChild(container)
        }
}

