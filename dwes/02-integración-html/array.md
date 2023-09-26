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

Ejercicio 1 - For Loop:
a) Dado el array $frutas, utiliza un bucle for para imprimir cada fruta en una lista numerada.
b) Imprime la información en una tabla.
c) Imprime la información en una tabla sin usar bucles.

Ejercicio 2 - While Loop:
a) Dado el array $alumnos, utiliza un bucle while para encontrar al alumno más joven y mostrar su nombre y edad.
b) Realiza la anterior tarea sin bucle.
c) Muestra una tabla de los alumnos ordenados por edad

Ejercicio 3 - If Statement:
a) Genera un array con varios eventos. Imprime una tabla con los eventos que han pasado en cursiva y color rojo (fecha anterior a hoy). Los futuros en negrita y verde.

Ejercicio 4 - Funciones de Arrays:
a) Dado el array $precios de las frutas, utiliza la función array_sum() para calcular el precio total de todas las frutas en el carrito y luego muestra el resultado.


Ejercicio 5 - ForEach Loop:
a) Añade un array cantidades en kilos. Calcula el precio anterior teniendo en cuenta la cantidad
b) Repite el a sin el uso de bucles.
c) Pinta un tabla con nombre, cantidad, precio unitario, precio total por producto y una última fila con row span con el gasto total del carrito.

Ejercicio 6 - If y Funciones de Arrays:
a) Genera información de 10 libros dentro de la biblioteca. Haz una página que muestre la información de la biblio y una tabla con los libros.
b) Realiza un pequeño buscador con un formulario. Se pasará en nombre del libro a buscar. Se mostrará el formulario y una tabla, si el libro buscado está aparecerá subrayado y un mensaje "El libro está disponible", si no se encuentra aparecerá un mensaje de "El libro NO está disponible". Siempre aparecerá el listado de libros. array_search

Ejercicio 7 - Manipulación de Arrays:
Dado el array $frutas, agrega una nueva fruta, como "Pera", al final del array utilizando la función array_push(). Luego, muestra el array actualizado.

Ejercicio 8 - While Loop y Funciones de Arrays:
Dado el array $alumnos, utiliza un bucle while para encontrar al alumno con el nombre "Ana" y muestra su información (nombre, edad y curso). Puedes usar la función array_shift() para eliminar elementos del array mientras lo recorres.

Ejercicio 9 - Persistencia en ficheros

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

Ejercicio 10 - Persistencia JSON

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
