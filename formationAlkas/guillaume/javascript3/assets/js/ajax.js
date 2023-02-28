let formAjax = document.addEventListener('submit', traitement)
let formContact = document.getElementById('formAjax')
function traitement(e) {
    e.preventDefault()
    let email = formContact.querySelector('#email')
    let message = formContact.querySelector('#message')
    if (email && email.value.trim() && message && message.value.trim()) {
        let formData = new FormData(formContact)

        fetch('index.php?js=formContact',{
            method:'post',
            body: formData
        }).then((reponse)=> {
                if(reponse.ok) {
                    reponse.json().then((json)=>{
                        console.log(json)
                        if(json.mail) {
                            let maReponse = document.getElementById('reponse')
                            maReponse.innerHTML = json.message
                        } else {
                            let maReponse = document.getElementById('reponseErreur')
                            maReponse.innerHTML = json.message
                        }

                    })
                }
        })
    } else {
        alert('le formulaire est invalid')
    }
}