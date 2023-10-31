#!/usr/bin/php7.2
<?php

echo $argv[0];

$arr = [
    "frutas"  => ["a" => "naranja", "b" => "plátano", "c" => "manzana"],
    "números" => [1, 2, 3, 4, 5, 6],
    "hoyos"   => ["primero", 5 => "segundo", "tercero"],
];

class MiClase
{
    public $asd = "Hola";
    public $dsa = "mundo";
}

$o = new MiClase();

$archivo = 'info.dat';
$manejador = fopen($archivo, 'w') or die('No se pudo abrir el fichero:  '.$archivo);

$datos = serialize($o);

fwrite($manejador, $datos);

?>
