<?php
# server.php

$colorGreen="\033[0;32m";
$colorClear="\033[0m";

/*
Otros colores de shell
Black        0;30     Dark Gray     1;30
Red          0;31     Light Red     1;31
Green        0;32     Light Green   1;32
Brown/Orange 0;33     Yellow        1;33
Blue         0;34     Light Blue    1;34
Purple       0;35     Light Purple  1;35
Cyan         0;36     Light Cyan    1;36
Light Gray   0;37     White         1;37
*/

$server = stream_socket_server("tcp://127.0.0.1:1337", $errno, $errorMessage);

if ($server === false) {
    throw new UnexpectedValueException("Could not bind to socket: $errorMessage");
}

while (true) {
    $client = stream_socket_accept($server);

    if ($client) {
        echo "Nuevo cliente!\n";
        echo "Recibiendo info de cliente...\n";
        $contenido = stream_get_contents($client);
        echo "Recibido: $colorGreen$contenido$colorClear\n";

        echo "Contestando al cliente...\n";
        stream_socket_sendto($client, "Información recibida por server");

        echo "Cerrando al cliente.\n";
        fclose($client);
        echo "Cerrando.\n\n\n";
    }
}
?>
