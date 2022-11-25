<?php

$dato  = filter_input(INPUT_POST, 'enviar', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
?>

<h1>El id enviado es <?=$dato?></h1>