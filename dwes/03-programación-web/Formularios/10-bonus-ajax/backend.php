<?php 
sleep(mt_rand(1,2));

if(mt_rand(0,1) == 0) {
    header("HTTP/1.1 200 OK");
} else {
    header("HTTP/1.1 404 Error en la petición");
}

?>