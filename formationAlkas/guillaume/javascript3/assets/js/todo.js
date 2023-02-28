let container = document.createElement('span')

let divTask = document.createElement('div')
let task = document.createElement('input')
let button = document.createElement('button')
let list = document.createElement('ul')

divTask.classList.add("col-12")

task.type = "text"
task.classList.add('form-control')

button.textContent = "Ajouter"
button.classList.add("btn")
button.classList.add("btn-primary")
// button.classList.add("ms-3")
button.addEventListener('click', addTask)

divTask.appendChild(task)
divTask.appendChild(button)

container.appendChild(divTask)
container.appendChild(button)
container.appendChild(list)

document.querySelector("main").appendChild(container)
task.focus()

function addTask()
{
    let newTask = document.createElement("li")
    let del = document.createElement("button")

    del.textContent = "X"
    del.classList.add("btn")
    del.classList.add("btn-danger")
    del.classList.add("ms-3") // margin start (gauche ou droite suivant la langue) 3px
    del.addEventListener('click', function () {
        newTask.remove()
    })

    newTask.textContent = task.value
    newTask.appendChild(del)

    list.appendChild(newTask)

    task.value = ""
    task.focus()
}