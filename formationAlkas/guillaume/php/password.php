<?php

const PWO = 'àlacon';

$test = password_hash(PWO,PASSWORD_ARGON2ID);
var_dump(password_verify(PWO,($test)));
