import ToDoList from "./class/ToDoList.js";
import CalculatriceB from "./class/CalculatriceB.js";
import Meteo from "./class/Meteo.js";
import Profil from "./class/Profil.js";

let elCalculatrice = document.querySelector('#calculatrice .card-body')

const calculatriceB = new CalculatriceB(elCalculatrice)
calculatriceB.init()
calculatriceB.show()

const toDoList = new ToDoList(document.querySelector('#toutdouxliste .card-body'))
toDoList.init()
toDoList.show()

const profil = new Profil(document.querySelector('#profil .card-body'))
profil.init()


