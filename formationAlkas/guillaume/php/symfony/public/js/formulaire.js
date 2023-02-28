let form = document.querySelector('form')
console.log(form)
form.addEventListener('submit',checkForm)

function checkForm (event)
{

    event.preventDefault()
    checkIfEmpty(event)
    let nom = document.querySelector('#nom')
    if ((nom))
    {
        document.getElementById('#nom').className = ".no_errors";
    }
    event.target.submit()
}

function checkIfEmpty(event) {
    if (event.trim() === '') {
        console.log('String is empty');
    } else {
        console.log('String is NOT empty');
    }
}