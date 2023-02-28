<?php
require_once('doctype.php');
?>
    <article class="page" role="article">
        <header><h1>Calculatrice</h1></header>

        <script>
            let chiffrePremier = Number(prompt("Veuillez donner un chiffre"))
            let operateur = prompt("Donnez un opérateur (+ - / *)")
            let chiffreSecond = +prompt("Veuillez donner un chiffre")
            let result = calculatrice(chiffrePremier, operateur, chiffreSecond)
            alert(chiffrePremier + operateur + chiffreSecond + " = " + result)

            function calculatrice(chiffrePremier, operateur, chiffreSecond) {
                let result

                // if('+' === operateur ) {
                //     result = chiffrePremier + chiffreSecond
                // } else if('-' === operateur) {
                //     result = chiffrePremier - chiffreSecond
                // }

                switch (operateur) {
                    case "+":
                        result = chiffrePremier + chiffreSecond
                        break
                    case "-":
                        result = chiffrePremier - chiffreSecond
                        break
                    case "*":
                        result = chiffrePremier * chiffreSecond
                        break
                    case "/":
                        result = chiffrePremier / chiffreSecond
                        break
                }

                return result
            }
        </script>
    </article>

<?php

require_once('footer.php');