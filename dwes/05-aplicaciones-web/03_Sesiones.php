Sesiones
========

PHP implementa la gestión de sesiones haciendo todo el trabajo por nosotros.
Existen distintas configuraciones para gestionar las sesiones pero lo general
es que exista un cookie de sesión y la información se guarde en ficheros.

NOTA: Para modificar este comportamiento mira
http://php.net/manual/es/session.configuration.php#ini.session.save-handler
http://php.net/manual/es/session.configuration.php#ini.session.save-path
http://php.net/manual/es/session.configuration.php#ini.session.use-trans-sid


Tras realizar la práctica anterior las sesiones nos resultarán fáciles de usar.
El proceso para trabajar con sesiones es:

1.- Crear la sesión
2.- Usar la sesión, a través del array asociativo $_SESSION
3.- Guardar la información

NOTA: Ahora tenemos dos mecanismo para gestionar nuestra relación con los
clientes.
COOKIES -> Información que caduca, que es insegura y es pequeña
SESIONES -> Información que reside en el servidor en la que podemos confiar
            y que podemos almacenar distintos valores. Estas se implementan
            haciendo uso de cookies pero son conceptos distintos, su propósito
            también es distinto.
            Esta información dura mientras el navegador esté abierto.


Crear, iniciar o cargar la sesión
*********************************
Para realizar esta acción debemos llamar a una función

<?php
session_start();

//Código que usa la sesión $_SESSION
?>

NOTA: existe una configuración del servidor en la que esto se realiza
automáticamente con cada petición.
http://php.net/manual/es/session.configuration.php#ini.session.auto-start


Utiliza la sesión
*****************
Una vez inicializada tendremos a nuestra disposición un array asociativo con
las variables de la sesión y su valor. Para crear variables podemos acceder
al ínidice nuevo y para borrarlas podremos usar la función unsset()

<?php

session_start();

if(!isset($_SESSION['nombre'])){
  $_SESSION['nombre'] = "Jorge";
}

echo "<h1>$_SESSION['nombre']</h1>";

?>


Guardar la información
**********************
Por defecto la sesión se guarda automáticamente cuando se deja de ejecutar el
script. De forma general no hay que hacer nada, la siguiente vez que hagamos
un session_start y el usuario presenta su cookie el array $_SESSION tendrá los
valores adecuados.

NOTA: Cuando php inicia una sesión bloquea el fichero hasta que se escribe, esto
puede dar problemas cuando hacemos peticiones AJAX. Si hacemos una aplicación
con muchas peticiones AJAX puede estar procesando una mientras se realiza otra,
en estos caso puede que queramos forzar la escritura de fichero tan pronto como
hayamos consultado/modificado la información de sesión. Para ello usamos:
http://php.net/manual/es/function.session-write-close.php

¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡ NOTA IMPORTANTE DE SEGURIDAD !!!!!!!!!!!!!!!!!!!!!!!!!!!!!
Las peticiones AJAX a elementos sensibles también deben estar protegidas por
las sesiones. Se verá este tema y otros en los servicios web.
¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡¡ NOTA IMPORTANTE DE SEGURIDAD !!!!!!!!!!!!!!!!!!!!!!!!!!!!!


Tarea 1
=======
Realiza una web con dos páginas:
sin_sesion.php -> Escribe hola mundo de las sesiones e imprime $_COOKIE
con_sesion.php -> Inicia una sesión y escribe "sesión iniciada"

Visita primero sin_sesion.php, observa las cookies que tienes, visita ahora
con_sesion.php, observa las cookies que tienes.
¿Qué sucede?


¿Cómo podemos manipular los valores por defecto?
************************************************
Existen distintas funciones para manipular la información
Cambia la web con_sesion.php, llama antes a las siguientes funciones y contesta
a la pregunta de qué hacen.

session_name
http://php.net/manual/es/function.session-name.php

session_id
http://php.net/manual/es/function.session-id.php


¿Cómo podemos tener control sobre los parámetros de la cookie de sesión?
************************************************************************
Si nos fijamos en la cabecera de la función session_start podemos pasar un array
con opciones, dentro de estas opciones tenemos los parámetros de las cookies:
http://php.net/manual/es/session.configuration.php


Tarea 2
=======
Analiza el valor de las cookies y los nombres cuando se ejecuta el siguiente
código. Observa el valor de las cookies y contesta a la pregunta: ¿Por qué no
 funciona según lo esperado?

<?php

/* Multiples sesiones */
session_name("ASD");
session_start();
if(!isset($_SESSION['valor'])) {
  $_SESSION['valor'] = 20;
}
$tmp1 = $_SESSION['valor'];

session_write_close();


session_name("DSA");
/*
Importante
session_id(session_create_id());
*/
session_start();

if(!isset($_SESSION['valor'])) {
  $_SESSION['valor'] = 10;
}
$tmp2 = $_SESSION['valor'];

echo "Sesión ASD tiene valor $tmp1<br>";
echo "Sesión DSA tiene valor $tmp2<br>";
?>

Descomenta el comentario marcado con importante, observa cómo cambiar la cookie
¿Por qué ahora funciona?


Tarea 3
=======
Modifica el código de la tarea 2 para que en cada visita se vaya alternando el
valor de la variable "valor" dentro de las sesiones.

Visita 1, en sesión ASD valor 10 y en sesión DSA valor 20
Visita 2, en sesión ASD valor 20 y en sesión DSA valor 10
etc...


Tarea 4
=======
Crea un página que lleve un contador con el número de visitas realizadas en la
página hasta que el usuario cierre el navegador.
NOTA: Algunos navegadores se quedan residentes en memoria y aunque cierres el último
      Navegador y pestaña el proceso mantiene las sesiones. Hay que cerrarlo por completo
      Por ejemplo: chrome

Tarea 5
=======
Modifica las 3 páginas realizadas en la sección anterior donde utilizábamos
nuestras propias sesiones para utilizar las sesiones PHP





****** NO Todavía. es necesario ver las funciones de login ********
Tarea 6
=======
Cambia tu código de login para utilizar sesiones, integra el login con las 3
páginas de preferencias.
En vez de tener una página de premio tendremos las 3 páginas de preferencias y
solo serán accesibles por usuarios logueados

NOTA: Haced esta práctica en varias páginas si no lo hacéis no os enfrentaréis
      al problema real que tendréis que resolver en un login.

Ficheros:
    login.php
    preferncia1.php
    preferncia2.php
    preferncia3.php


Próximamente: Teoría
