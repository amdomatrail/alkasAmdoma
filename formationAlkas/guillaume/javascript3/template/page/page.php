<?php
require_once('template/doctype.php');
?>
<article class="page" role="article">
    <header>
        <h1><?=$titre?></h1>
    </header>

    <?=$content?>
</article>

<?php

require_once('template/footer.php');