export default class ToDoList {
    elPage
    container
    fieldTask
    todoList


    constructor(elPage) {
        this.elPage = elPage
    }

    init() {
        this.container = document.createElement('span')
        let divTask = document.createElement('div')
        this.todoList = document.createElement('ul')

        this.fieldTask = this.createFieldTask()

        divTask.classList.add("col-12")
        divTask.appendChild(this.fieldTask)
        // divTask.appendChild(button)

        this.container.appendChild(divTask)
        this.container.appendChild(this.buttonAdd())
        this.container.appendChild(this.todoList)
    }

    show() {
        this.elPage.appendChild(this.container)
        this.fieldTask.focus()
    }

    buttonAdd() {
        let btAdd = document.createElement('button')
        btAdd.textContent = "Ajouter"
        btAdd.classList.add("btn")
        btAdd.classList.add("btn-primary")
// button.classList.add("ms-3")
        btAdd.addEventListener('click', () => this.addTask())

        return btAdd
    }

    createFieldTask() {
        let task = document.createElement('input')
        task.type = "text"
        task.classList.add('form-control')

        return task
    }

    addTask()
    {
        let newTask = document.createElement("li")
        newTask.textContent = this.fieldTask.value
        newTask.appendChild(this.delTask(newTask))

        this.todoList.appendChild(newTask)

        this.fieldTask.value = ""
        this.fieldTask.focus()
    }

    delTask(li) {
        let del = document.createElement("button")

        del.textContent = "X"
        del.classList.add("btn")
        del.classList.add("btn-danger")
        del.classList.add("ms-3") // margin start (gauche ou droite suivant la langue) 3px
        del.addEventListener('click', function () {
            li.remove()
        })

        return del
    }
}