# Las variables superglobales

http://php.net/manual/es/language.variables.superglobals.php

¿Qué son?

Son variables siempre disponibles que tienen información variada.
El tipo de estas variables son arrays.

Haz una página que escriba el volcado de de la variable ```$_SERVER``` en formato ```clave - valor <br />```

## 01 Dirección IP

Haz una página que diga cuál es el sistema operativo del cliente y desde qué dirección ip está haciendo la petición.

## 02 Lenguaje

Modifica el ejercicio anterior para que escriba mensajes de bienvenida dependiendo del lenguaje de Navegador del usuario.

Lenguajes: Inglés, Español o Otro.

> NOTA: Intenta que sean lenguajes difíciles.

# Obteniendo información de la url. PETICIÓN GET

¿Cómo saber si estoy recibiendo información de un formulario?
1. Escribe un formulario que envíe un dato con get
2. Observa cómo cambia la url
3. Crea una página ```procesador.php``` que obtenga ese valor del ```_GET```
4. Esta página escribirá:
  - Si nos llegan datos "Recibiendo formulario"
  - Si no escribirá un enlace al formulario


¿Cómo saber si un dato ha sido enviado?

Hay distintas formas en las que se comportan los distintos controles
de un formulario. Para saber si nos están enviando datos o no, debemos
preguntar por ellos con isset y comparándolo con los posibles valores.

5.- Modifica la página de procesador.php para que en caso de no recibir
datos que escriba que hay un error en rojo

6.- Modifica la página procesado para en caso de no recibir datos
reenvíe al navegador a la página del formulario
Ver: header
NOTA: Siempre hacer un die o exit tras redirect.

7.- Modifica el sistema para que aparezca un mensaje de error en rojo
cuando no se ha enviado el dato

¿Cómo mantengo el valor entre peticiones?
Ahora vamos a jugar con dos campos

Estructura general:

NOTA IMPORTANTE: Si en los formularios de examen se pierden los valores cuando
hay error se considerará como muy grave.

```
<?php

$variableInput = "";

if(isset($_GET['BOTÓN_ENVÍA'])) {
    // Se está enviando el formulario
    $variableInput = (isset($_GET['variable_input']))?$_GET['variable_input']:"";
}
?>
<!--- Más abajo en el html --->
<input type="text" name="variable_input" value="<?=$variableInput?>" />
```

# Obteniendo información de la entrada. PETICIÓN POST

Al procesar los datos del post tenemos la ventaja de que el tipo de
petición cambia y podemos usarlo para saber si estamos recibiendo
POST o GET

```
$variableInput = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $variableInput = (isset($_POST['variable_input']))?$_POST['variable_input']:"";

//etc...
```

# SEGURIDAD
La primera preocupación es que las cosas funcionen... pero en el mundo de Internet eso no es suficiente. El código en producción que subamos debe ser seguro.

## EJEMPLO de XSS

Es importante usar funciones de saneamiento:
```
function cleanData($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
```

# Validación

http://php.net/manual/es/book.filter.php
https://www.php.net/manual/es/filter.examples.php
https://diego.com.es/expresiones-regulares-en-php