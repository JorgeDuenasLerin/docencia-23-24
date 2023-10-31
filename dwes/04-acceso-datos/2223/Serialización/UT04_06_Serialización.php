Serialización / Deserialización
===============================

¿Qué es?
Convertir el mundo de los objetos a una secuencia de bytes con el objetivo
de poder recuperar esa secuencia de bytes y volver a traerlos al mundo de los
objetos.

Ver imagen UT04_06_01_serialize-deserialize.png

Mundo objetos  ---  serialización  --- > Fichero
Fichero        --- deserialización --- > Mundo objetos

Mundo objetos  ---  serialización  --- > Red
Red            --- deserialización --- > Mundo objetos

Mundo objetos  ---  serialización  --- > Base de datos
Base de datos  --- deserialización --- > Mundo objetos


Serialización PHP
*****************
Por defecto php tiene un formato de serialización, cogerá la información
necesaria para reconstruir el objeto en la deserialización.


Ficheros PHP
************
Las funciones para trabajar con ficheros y algunos ejemplos los podemos
encontrar en:
https://davidwalsh.name/basic-php-file-handling-create-open-read-write-append-close-delete


Objetos - Ficheros
******************

<?php
// fichero: 01_ejemplo_array_serialize.php

/*
$arr = [1,2,3,4,5];
$arr = [1,"Hola",3,4,5];
$arr = ["hola", "mundo", "serializado"];
$arr = [
    "frutas"  => ["a" => "naranja", "b" => "plátano", "c" => "manzana"],
    "números" => [1, 2, 3, 4, 5, 6],
    "hoyos"   => ["primero", 5 => "segundo", "tercero"],
];
*/

$archivo = 'info.dat';
$manejador = fopen($archivo, 'w') or die('No se pudo abrir el fichero:  '.$archivo);

$datos = serialize($arr);

fwrite($manejador, $datos);
fclose($manejador)
?>

Mostramos el contenido del fichero con cada array de ejemplo:
$ cat 'info.dat'


SERIALIZANDO/DESERIALIZANDO OBJETOS

Código de objeto
O:6:"Alumno":3:{s:11:"Alumnopri";s:3:"PRI";s:6:"*pro";s:3:"PRO";s:3:"pub";s:3:"PUB";}



* Ejercicio 1 *
Crea un fichero 01_ejemplo_array_deserialize.php en el que reconstruyas el
objeto almacenado en 'info.dat' y muestres su contenido con un var_dump

* Ejercicio 2 *
Modifica los programas 01_ejemplo_array_deserialize.php y
 01_ejemplo_array_serialize.php para que en vez de usar siempre el fichero
'info.dat', reciban el nombre del fichero a través de los parámetros de
invocación y dejen siempre los ficheros de datos en una carpeta llamada 'data'.

Ejemplo ejecución:
$ php 01_ejemplo_array_deserialize.php 'misdatos.dat'
-> Crea si no existe el directorio data
-> Mete la información del objeto $arr serializado en 'data/misdatos.dat'

Para recoger los parámetros de invocación debes obtener la información de $argv
http://php.net/manual/es/reserved.variables.argv.php


NOTA: Si queremos realizar una ejecución como comando normal del sistemas
debemos:
1.- Establecer en la primera línea el intérprete a utilizar
#!/usr/bin/php7.2
2.- Dar permisos de ejecución
chmod u+x <fichero>


Objetos - Bases de datos
************************
Siguiendo estos ejemplos y con lo anterior visto en clase, nada nos impide crear
una tabla que tenga un campo de tipo texto que guarde la serialización de un
objeto

* Ejercicio 3 *
NOTA: Para avanzar más rápido en estos ejercicios no generes una estructura de
proyecto

Deseamos guardar la información de clases de pádel, en ellas hay 4 alumnos
De la clase se quiere guardar el nombre de la pista y dentro tendrá un array de
  alumnos.
De los alumnos se quiere guardar nombre, apellido y nivel (del 1 al 6)

1.- Crea un base de datos con una tabla clases que tenga un campo nombre
    varchar(30) y un campo alumno_serializados
    NOTA: Puedes aprovechar alguna base de datos existente
2.- Crea las clases correspondientes
3.- Crea un formulario capaz de recibir la información de la clase y los 4
    alumnos
4.- Crea una página que reciba esta información
    .- Recibirá los datos del post
    .- Creará el array de jugadores
    .- Almacenará un nuevo registro con el nombre de la pista y la serialización
       de los jugadores
5.- Crea una página de listado en la se muestren todas las clases de la base de
    datos.
    .- Recuperar información
    .- Crear objetos del tipo ClasePadel
    .- Llamar al método pintaComoTabla() a cada uno de ellos que muestre la
        información
       El método pintaComoTabla pinta una tabla con el nombre de los jugadores


Objetos - Redes
***************
El mismo concepto de convertir los objetos a flujo de bytes se puede utilizar
para enviar objetos a través de la red.

Realizar seguimiento de código de ejemplo

* Ejercicio 4 *
Crea dos programas basándote en el código de ejemplo de sockets, estos programas
intercambiarán información a través de la red.

1.- Crea la clase mensaje con la propiedad nombre y mensaje

2.- Crea un programa enviar que reciba por parámetro toda la información
    envia_info.php <dirección ip> <puerto> <nombre> <mensaje>
    envia_info.php 127.0.0.1 8080 Jorge "Hola mundo"

3.- Crea un servidor que cuando se ejecute espere recibir objetos tipo mensaje
    por cada uno que llegue muestre su contenido y conteste al cliente con 'OK'
    server_info.php 8080


Serialización distintas plataformas
***********************************
¿Qué ocurre si tenemos un cliente python y un servidor Java?
¿Qué ocurre si tenemos un servidor php y un cliente Java?
¿Es serializada la información de la misma forma?

Solución:
En este caso podemos escribir una serialización propia para adaptar las
plataformas

¿Qué ocurre si en una actualización se cambia el formato de las serializaciones?
NOTA: Muy poco frecuente

Solución:
Utilizar herramientas estándar de serialización: json, XML

* Ejercicio 5 *
Modifica los ejercicios 1 y 2 para usar json
http://php.net/manual/es/function.json-encode.php
http://php.net/manual/es/function.json-decode.php


Serialización en tráfico ASCII
******************************
Base64
