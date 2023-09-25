# Funciones

Declaración de funciones: Puedes definir funciones personalizadas utilizando la palabra clave function, seguida del nombre de la función y sus parámetros.

```php
function miFuncion($parametro1, $parametro2) {
    // Código de la función
}
```

Argumentos y parámetros: Las funciones pueden aceptar argumentos (valores que se pasan cuando se llama a la función) y parámetros (variables que se utilizan dentro de la función para realizar tareas).

Valores de retorno: Las funciones pueden devolver un valor utilizando la palabra clave return. Pueden devolver cualquier tipo de dato, incluyendo números, cadenas, matrices, objetos, etc.

```php
function suma($a, $b) {
    return $a + $b;
}
```

Funciones con número variable de parámetros: Puedes definir funciones que acepten un número variable de argumentos utilizando el operador ... (spread) en la lista de parámetros. Estos argumentos se recogen en un arreglo dentro de la función.

```php
function sumarTodos(...$numeros) {
    $suma = 0;
    foreach ($numeros as $numero) {
        $suma += $numero;
    }
    return $suma;
}
```


Funciones anónimas (cierres): PHP admite la creación de funciones anónimas que se pueden asignar a variables y utilizar como argumentos en otras funciones.

```php
$miFuncionAnonima = function ($parametro) {
    // Código de la función anónima
};
```

Parámetros por defecto: Puedes establecer valores predeterminados para los parámetros de una función, lo que permite que la función se llame con menos argumentos de los especificados en la declaración.

```php
function saludar($nombre = "Invitado") {
    echo "Hola, $nombre";
}
// Llamada sin argumento
saludar(); // Imprimirá "Hola, Invitado"
```

Ámbito de variables: PHP permite definir variables locales, globales y estáticas dentro de las funciones, lo que afecta la visibilidad y el tiempo de vida de esas variables.

```php
TODO
```

Funciones recursivas: Puedes crear funciones que se llamen a sí mismas para resolver problemas recursivos.

```php
function factorial($n) {
    if ($n <= 1) {
        return 1;
    } else {
        return $n * factorial($n - 1);
    }
}
```

Funciones con referencias: Puedes pasar parámetros por referencia utilizando el operador &. Esto permite que una función modifique el valor de una variable fuera de su ámbito local.

```php
function cubetea(int &$num){
    $num = $num * $num * $num;
}
$n = 3;
cubetea($n);
echo $n;
```

Funciones de retorno de llamada (callbacks): PHP permite el uso de funciones como argumentos para otras funciones, lo que es útil para implementar patrones como el de "llamada de vuelta" en la programación.

```php
function a(){ echo "Ah!"; }
$callback="a";

$callback();
// Imprime: Ah!
```

## Ejercicios

> ¡SIN REVISAR! GPT raw

Nivel de dificultad 1: Conceptos Básicos de Funciones

Escribe una función llamada saludo que imprima "¡Hola, mundo!" cuando se la llame.
Define una función suma que acepte dos parámetros y devuelva la suma de esos números.
Crea una función esPar que tome un número como argumento y devuelva true si es par y false si es impar.
Nivel de dificultad 2: Parámetros por Defecto y Argumentos

Define una función saludoPersonalizado que acepte un nombre como parámetro y, si no se proporciona un nombre, muestre "¡Hola, Invitado!".
Crea una función calcularAreaTriangulo que acepte la base y la altura como parámetros, y si no se proporcionan, asume valores predeterminados de 5 para la base y 3 para la altura.
Escribe una función concatenarPalabras que tome una serie de palabras como argumentos y las concatene en una sola cadena separada por espacios.
Nivel de dificultad 3: Funciones Anónimas y Callbacks

Declara una función anónima que acepte dos números y los multiplique.
Implementa una función llamada aplicarOperacion que tome una función de operación y dos números, y devuelva el resultado de aplicar la operación a esos números.
Crea una función filtrarNumerosPares que tome un arreglo de números y una función de filtro como argumentos, y devuelva un arreglo con solo los números pares que pasan el filtro.
Nivel de dificultad 4: Funciones Recursivas

Define una función recursiva llamada calcularFactorial que calcule el factorial de un número dado.
Implementa una función recursiva para calcular el término n-ésimo de la serie de Fibonacci.
Escribe una función que use recursión para encontrar el máximo común divisor (MCD) de dos números.
Nivel de dificultad 5: Referencias y Ámbito de Variables

Crea una función duplicarArray que tome un arreglo como argumento y lo duplique modificándolo directamente.
Define una función que acepte una variable por referencia y la incremente en 10 unidades.
Escribe una función que tome un arreglo por referencia y lo ordene de forma ascendente.
Nivel de dificultad 6: Funciones de Orden Superior

Crea una función map que tome un arreglo y una función de transformación como argumentos, y aplique la función a cada elemento del arreglo, devolviendo un nuevo arreglo con los resultados.
Implementa una función reduce que tome un arreglo, una función de acumulación y un valor inicial, y reduzca el arreglo a un solo valor acumulado.
Define una función filtrar que tome un arreglo y una función de filtro como argumentos, y devuelva un nuevo arreglo con los elementos que pasan el filtro.


Ejercicio 1: Lista de Compras

Contexto: Estás desarrollando una aplicación de lista de compras en línea. Crea una función llamada agregarItemAListaHTML que tome un nombre de artículo como parámetro y lo agregue a una lista de compras en formato HTML.

Ejercicio 2: Galería de Imágenes

Contexto: Estás creando un sitio web para mostrar una galería de imágenes. Define una función generarGaleriaHTML que tome una matriz de URLs de imágenes y genere una galería de miniaturas en formato HTML.

Ejercicio 3: Calendario de Eventos

Contexto: Necesitas desarrollar una página de calendario de eventos. Escribe una función generarCalendarioHTML que tome un arreglo de eventos y genere un calendario mensual en HTML.

Ejercicio 4: Generador de Tarjetas de Presentación

Contexto: Estás creando un sitio web que permite a los usuarios generar tarjetas de presentación en línea. Crea una función generarTarjetaPresentacionHTML que tome información personal (nombre, cargo, empresa) y genere una tarjeta de presentación en formato HTML.

Ejercicio 5: Registro de Usuarios

Contexto: Estás construyendo un formulario de registro de usuarios. Define una función formularioRegistroHTML que genere un formulario de registro en HTML con campos para nombre, correo electrónico y contraseña.

Ejercicio 6: Blog de Artículos

Contexto: Estás creando un blog en línea. Crea una función generarArticuloHTML que tome un título, contenido y fecha de publicación como parámetros y genere un artículo en formato HTML.

Ejercicio 7: Menú de Navegación

Contexto: Estás diseñando la navegación de un sitio web. Define una función menuNavegacionHTML que tome un arreglo de enlaces y genere un menú de navegación en formato HTML.

Ejercicio 8: Tabla de Clasificación de Juegos

Contexto: Estás desarrollando una aplicación de juegos en línea. Escribe una función generarTablaClasificacionHTML que tome un arreglo de jugadores y puntajes y genere una tabla de clasificación en HTML.

Ejercicio 9: Generador de Citas

Contexto: Estás creando una página de citas inspiradoras. Define una función generarCitaHTML que tome una cita y un autor como parámetros y genere una cita en formato HTML.

Ejercicio 10: Calculadora de Propinas

Contexto: Estás creando una calculadora de propinas en una página web. Crea una función calculadoraPropinasHTML que genere un formulario en HTML con campos para el monto de la factura y el porcentaje de propina, y muestre el resultado de la propina calculada.

Ejercicio 11: Conversor de Moneda

Contexto: Estás desarrollando una aplicación para convertir monedas. Crea una función llamada convertirMonedaHTML que tome una cantidad de dinero en una moneda base, una tasa de cambio y una moneda de destino como parámetros. La función debe calcular la cantidad convertida y mostrarla en formato HTML.

Ejercicio 12: Contador de Visitas

Contexto: Necesitas rastrear el número de visitas a una página web. Define una función llamada contadorVisitasHTML que tome un nombre de página como parámetro. La función debe incrementar el contador de visitas para esa página y mostrarlo en formato HTML.

Ejercicio 13: Generador de Tarjetas de Presentación (con Parámetros Opcionales)

Contexto: Mejora el ejercicio anterior del generador de tarjetas de presentación. Modifica la función generarTarjetaPresentacionHTML para que los campos de información personal (nombre, cargo, empresa) sean opcionales. Si no se proporciona información para alguno de los campos, la función debe mostrar un valor predeterminado en HTML.

Ejercicio 14: Blog de Artículos (con Parámetros Opcionales)

Contexto: Amplía el ejercicio del blog de artículos. Modifica la función generarArticuloHTML para que el campo de fecha de publicación sea opcional. Si no se proporciona una fecha, la función debe mostrar "Fecha desconocida" en lugar de una fecha en el artículo generado en HTML.