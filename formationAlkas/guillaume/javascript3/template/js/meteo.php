<?php
$head = '
<script type="module" src="assets/js/meteo.js"></script>
';

require_once('template/doctype.php');
?>

    <article role="article" id="carteMeteo">
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card" id="meteoAlkas">
                    <h5 class="card-header">Météo Alkas</h5>

                    <div class="card-body"></div>
                </div>
            </div>
        </div>
    </article>


<?php
require_once('template/footer.php');