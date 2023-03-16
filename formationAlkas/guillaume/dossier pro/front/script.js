function toggleMenu() {
    const navbar = document.querySelector(".navbar")
    const burger= document.querySelector(".burger")
    /* En cliquant on va retirer ou activer la class show_nav qui nous permet d'afficher notre menu*/
    burger.addEventListener('click',()=> {
        navbar.classList.toggle('show_nav');
    })
}
toggleMenu();


