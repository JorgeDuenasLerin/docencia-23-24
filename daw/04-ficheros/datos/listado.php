<?php

/**
listado.php
detalle.php?id=17
detalle.php?slug=jorge-bla-blo

/listado/
/detalle/jorge-bla-blo/


 */


$info = file_get_contents('gente.csv');

print_r($info);

?>