# Arrays

Se definen con ```[]``` o con ```array()```. PAra gustos, colores.

## ejemplos

1. Información de una frutería (Arrays sencillos con índice numérico):

```php
$frutas = array("Manzana", "Plátano", "Naranja", "Uva");
$precios = array(1.2, 0.8, 1.0, 2.5);

$frutas = ["Manzana", "Plátano", "Naranja", "Uva"];
$precios = [1.2, 0.8, 1.0, 2.5];
```



2. Información de eventos deportivos (Arrays con índice por clave):

```php
$evento = array(
    "nombre" => "Partido de fútbol",
    "fecha" => "2023-10-15",
    "deporte" => "Fútbol",
    "ubicacion" => "Estadio XYZ",
);
$evento = [
    "nombre" => "Partido de fútbol",
    "fecha" => "2023-10-15",
    "deporte" => "Fútbol",
    "ubicacion" => "Estadio XYZ",
];
```

3. Información de alumnos (Arrays de arrays):

```php
$alumnos = array(
    array("nombre" => "Juan", "edad" => 20, "curso" => "Matemáticas"),
    array("nombre" => "Ana", "edad" => 19, "curso" => "Historia"),
    array("nombre" => "Carlos", "edad" => 21, "curso" => "Inglés"),
);
$alumnos = [
    ["nombre" => "Juan", "edad" => 20, "curso" => "Matemáticas"],
    ["nombre" => "Ana", "edad" => 19, "curso" => "Historia"],
    ["nombre" => "Carlos", "edad" => 21, "curso" => "Inglés"],
];
```

4. Información de bibliotecas (Arrays multidimensionales):

```php
$biblioteca = array(
    "nombre" => "Biblioteca Central",
    "ubicacion" => "Calle Principal",
    "libros" => array(
        array("titulo" => "La Odisea", "autor" => "Homero", "cantidad" => 5),
        array("titulo" => "Cien años de soledad", "autor" => "Gabriel García Márquez", "cantidad" => 8),
    ),
    "personal" => array(
        array("nombre" => "María", "puesto" => "Bibliotecaria"),
        array("nombre" => "Luis", "puesto" => "Asistente"),
    ),
);
$biblioteca = [
    "nombre" => "Biblioteca Central",
    "ubicacion" => "Calle Principal",
    "libros" => [
        ["titulo" => "La Odisea", "autor" => "Homero", "cantidad" => 5],
        ["titulo" => "Cien años de soledad", "autor" => "Gabriel García Márquez", "cantidad" => 8],
    ],
    "personal" => [
        ["nombre" => "María", "puesto" => "Bibliotecaria"],
        ["nombre" => "Luis", "puesto" => "Asistente"],
    ],
];
```

5. Información de productos en un carrito de compras (Arrays con índice numérico y asociativo):

```php
$carrito = [
    ["producto" => "Camiseta", "precio" => 19.99, "cantidad" => 2],
    ["producto" => "Zapatillas", "precio" => 49.99, "cantidad" => 1],
    ["producto" => "Pantalones", "precio" => 29.99, "cantidad" => 3],
];
```

## funciones

En php hay funciones sobre arrays:

[Documentación](https://www.php.net/manual/es/ref.array.php)

## ejercicios

1. Ejercicio 1 - For Loop:

    1. Dado el array $frutas, utiliza un bucle for para imprimir cada fruta en una lista numerada.
    2. Imprime la información en una tabla.
    3. Imprime la información en una tabla sin usar bucles.

2. Ejercicio 2 - While Loop:

    1. Dado el array $alumnos, utiliza un bucle while para encontrar al alumno más joven y mostrar su nombre y edad.
    2. Realiza la anterior tarea sin bucle.
    3. Muestra una tabla de los alumnos ordenados por edad

3. Ejercicio 3 - If Statement:

    1. Genera un array con varios eventos. Imprime una tabla con los eventos que han pasado en cursiva y color rojo (fecha anterior a hoy). Los futuros en negrita y verde.

4. Ejercicio 4 - Funciones de Arrays:
    1. Dado el array $carrito, utiliza array_map para calcular el precio por ítem vendido, luego utiliza la función array_sum() para calcular el precio total de todas las frutas en el carrito y luego muestra el resultado.

5. Ejercicio 5 - ForEach Loop:
    1. Añade un array cantidades en kilos. Calcula el precio anterior teniendo en cuenta la cantidad
    2. Repite el a sin el uso de bucles.
    3. Pinta un tabla con nombre, cantidad, precio unitario, precio total por producto y una última fila con row span con el gasto total del carrito.

6. Ejercicio 6 - If y Funciones de Arrays:
    1. Genera información de 10 libros dentro de la biblioteca. Haz una página que muestre la información de la biblio y una tabla con los libros.
    2. Realiza un pequeño buscador con un formulario. Se pasará en nombre del libro a buscar. Se mostrará el formulario y una tabla, si el libro buscado está aparecerá subrayado y un mensaje "El libro está disponible", si no se encuentra aparecerá un mensaje de "El libro NO está disponible". Siempre aparecerá el listado de libros. array_search

7. Ejercicio 7 - Manipulación de Arrays:
Dado el array $frutas, agrega una nueva fruta, como "Pera", al final del array utilizando la función array_push(). Luego, muestra el array actualizado.

8. Ejercicio 8 - While Loop y Funciones de Arrays:

Dado el array $alumnos, utiliza un bucle while para encontrar al alumno con el nombre "Ana" y muestra su información (nombre, edad y curso). Puedes usar la función array_shift() para eliminar elementos del array mientras lo recorres.

9. Ejercicio 9 - Persistencia en ficheros

Explicación de serialización de información
```php
// Dentro
$s = serialize($a);
file_put_contents('store.dat', $s);  

// Fuera
$s = file_get_contents('store.dat');
$a = unserialize($s);
```
Crea una web con un listado de cosas por hacer, se añadirán al final del fichero. Tendrá un formulario y una tabla.

10. Ejercicio 10 - Persistencia JSON

```php
$cars = ["Volvo", "BMW", "Toyota"];
echo json_encode($cars);



$jsonobj = '{"Peter":35,"Ben":37,"Joe":43}';
var_dump(json_decode($jsonobj));
var_dump(json_decode($jsonobj, true));

$arr = json_decode($jsonobj, true);

echo $arr["Peter"];
echo $arr["Ben"];
echo $arr["Joe"];
```
Utilizando json, crea una web para almacenar películas/series de TV. También almacenarás un rating de cada una de ellas, si no tiene rating es que la quieres ver.


11. Reto de arrays.

Escribe una función ```aplastalo()```, recibe un número variable de parámetros que pueden ser a su vez arrays con subarrays, con subarrays, con subarrays, ... ¡no hay límite!. La función devolverá un array con todos los elementos.

```php
$lista = aplastalo([0,3],42, [2]);
// $lista tiene [0,3,42,2]
$lista = aplastalo([0,3],42,[0,4,5,[2,4,[5,6,7]]]);
// $lista tiene [0,3,42,0,4,5,2,4,5,6,7]

```