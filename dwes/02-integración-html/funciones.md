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
$a = "hola";

function imprime() 
{
    global $a;
    echo $a;
}

imprime();
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

Invocar métodos con los nombres de los parámetros. Se pueden poner el nombre del parámetro para especificar que valor pasar.

```php
function paramNames(mixed $element, int $n = 10)
{
    $arr = [];
    for($i=0;$i<$n;$i++){
        $arr[]=$element;
    }
    return $arr;
}

echo "<pre>";
print_r(paramNames(element:"WTF"));
print_r(paramNames(n: 3,element:"Ah!"));
echo "</pre>";
```

## Ejercicios

Usa los parámetros por defecto y la lista variable de parámetros.

- Crea una función que reciba como primer parámetro una cadena representando una etiqueta HTML, después vendrá una lista variable de parámetros. El primer parámetro por defecto es li. Devolverá una cadena con la etiqueta tantas veces como parámetros con el contenido de estos.
```php
magia('li', "Hola mundo", 3, 3.14)
<li>Hola mundo</li>
<li>3</li>
<li>3.14</li>

magia('li', "esto solo")
<li>esto solo</li>
```
- Escribe una función concatenarPalabras que tome una serie de palabras como argumentos y las concatene en una sola cadena separada por espacios.
- Escribe una función concatenaCon. Recibe un primer paŕametro la cadena con la que concatenar y una lista variable de parámetros. Devuelve la cadena concatenada. Por defecto se concatena con " ". Usar nombres de parámetros.



Funciones anónimas y callbacks:

- Declara una función anónima que acepte dos números y los multiplique. Invócala con el número 3 y 4
- Implementa una función llamada aplicarOperacion que tome una función de operación y 2 números. Devuelva el resultado de aplicar la operación a esos números. Define las funciones suma, resta y multiplicación.


Modificar variables:

- Crea una función que reciba una cadena y la modifique invirtiéndola.
- Crea una función que reciba una variable acumulador y un array de enteros. Cambiará el valor de la primera variable con la sum
- Crea una versión de la anterior función para que reciba una lista variables de parámetros.
- Crea una función combinada de las dos anteriores que le dé igual lo que reciba.




Combinando todo:

- Crea una función que reciba una función como primer parámetro y después un número variable de números. La primera función debe devolver un valor boolean, es una función de filtro. La función devolverá un array con los valores que han pasado el filtro:

```php
$impar = function(){};

print_r(filtra_array($impar, 1, 4, 56, 7, 8));

// Array con [1, 7]
```

- Crea la función esPrimo y utiliza la función anterior para hacer un filtrado.

- Crea una función al_cubo_array que reciba un array de enteros y lo modifique elevándolos al cubo.


Algo de forms:

- Estas desarrollando una aplicación web para la gestión de eventos festivos, un evento tiene: nombre, fecha, localización y un checkbox de si habrá piñata o no. Haz 3 funciones: mostrar_evento, editar_evento y mostrar_tabla_evento. La primera mostrará la información en un div, la segunda generará un formulario relleno con los datos del evento y la tercera generará una fila de una tabla. (tr con varios tds)