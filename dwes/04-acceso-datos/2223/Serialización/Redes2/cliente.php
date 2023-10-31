<?php

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

$addr = gethostbyname("127.0.0.1");

$client = stream_socket_client("tcp://$addr:1337", $errno, $errorMessage);

if ($client === false) {
    throw new UnexpectedValueException("Failed to connect: $errorMessage");
    die();
}

echo "Enviando información...\n";
stream_socket_sendto($client, "Hola mundo DWES");

// Cerramos la conexión de envío
stream_socket_shutdown($client, STREAM_SHUT_WR);

$infoServer = stream_get_contents($client);
echo "Server dice: $colorGreen$infoServer$colorClear\n";

echo "Cerramos la conexión\n";
fclose($client);

?>
