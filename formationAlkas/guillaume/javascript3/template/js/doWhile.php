<?php
require_once('template/doctype.php');
?>
    <article class="page" role="article">
        <header><h1>Exo do while </h1></header>

        <style>
            #chiffreMax {
                color: red;
            }
        </style>





        <p id="monParagraphe">Saisir des données et s'arrêter dès que leur somme dépasse <span id="chiffreMax">500</span></p>
        <script>
            // let ulListOne = document.getElementById('ulListOne');
            let ulListOne = document.querySelector('#ulListOne');
            // let items = ulListOne.getElementsByTagName('li');
            let items = ulListOne.querySelectorAll('li');

            // ulListOne.setAttribute('type', 'circle');
            ulListOne.style.listStyleType = 'upper-roman';
            // en css list-style-type : 'upper-roman'

            for (let i = 0; i < items.length; i++) {

                // items[i].setAttribute('onClick', "alert('item : '+(i+1))");
                items[i].addEventListener('click', function () {
                    alert('item : '+(i+1));
                })

                items[i].innerText = "Blabla " + (i + 1);
            }
            // doWhile(200)

            function doWhile(max = 500) {
                let sortie = 0

                do {
                    let chiffre = Number(prompt("Tapez un chiffre", 0))

                    sortie += chiffre

                    alert("Le resultat de sortie est : " + sortie + " sur " + max)
                } while (sortie < max)
            }
        </script>
    </article>

<?php

require_once('template/footer.php');