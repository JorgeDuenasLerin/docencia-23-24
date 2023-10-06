# Proyecto php

Necesitamos ver algo de objetos antes.

Estructura:

- https://github.com/php-pds/skeleton
- https://www.nikolaposa.in.rs/blog/2017/01/16/on-structuring-php-projects/

## Autocarga

### Cada clase en un fichero

Si vamos a programar la clase ```Perrito```estará en el fichero ```Perrito.php```


### Común hacer require de cada fichero

```
  Nos lleva a tener en el index un montón de require
  require 'File1.php';
  require 'File2.php';
  require 'File3.php';
```

### Si no existe ocurre un error

```
$product = new Product();
         |
         v
  ¿Product existe?
  Sí /        \ No
Creo el      ERROR
objeto
```

## 4.- Capturamos el error

```
$product = new Product();
         |
         v
  ¿Product existe?
  Sí /        \ No
Creo el      Ejecuta autoload
objeto        ¿Sabemos crearlo?
              Sí /      \ No
            creamos       ERROR

```

Crea un fichero ```index.php```

```
<?php
spl_autoload_register(function ($class) {
    $classPath = "./";
    echo "Autoload llamado";
    // en nuestros proyectos
    // ../src/
    // o la ruta a la raíz del proyecto
    require("$classPath${class}.php");
});

$p = new Product();
echo $p->id;
?>
```

Error. No existe la clase. Vamos a crear un fichero ```Producto.php``` con la clase

```
creamos Producto.php
<?php
class Producto
{
  public $id = 42;
}
?>
```

Al volver a ejecutar el código que usa Product ahora funcionará.


### Cuando el proyecto es muy grande

Se suelen meter las clases en espacios de nombres. Similar a los paquetes Java

¿Cómo lo cargamos?

```
Estructura de ficheros
src/
  NS1
    Clase1
    Clase2
  NS2
    Clase1
    Clase2

CARPETA_AUTOLOAD/
  \- src
    \- Pack1
      \- Product.php
    \- Pack2
      \- User.php
  \- public
    index.php
```

Fichero en src/Pack1/Product.php

```
<?php
namespace Pack1;
class Product
{
    public $id = 42;
}
?>
```

Fichero en src/App2/User.php

```
<?php
namespace Pack2;
class User
{
    public $id = 17;
}
?>
```

Fichero en public/index.php

```
<?php
spl_autoload_register(function ($class) {
    $classPath = "../src/";
    $file = str_replace('\\', '/', $class);
    require("$classPath${file}.php");
});

$p = new Pack1\Product();
$u = new Pack2\User();
echo $p->id . "    " $u->id;

?>
```


### Pregunta abierta

¿Por qué no tiene un comportamiento por defecto?

Filosofía
[https://es.wikipedia.org/wiki/Convenci%C3%B3n_sobre_configuraci%C3%B3n](https://es.wikipedia.org/wiki/Convenci%C3%B3n_sobre_configuraci%C3%B3n)
[https://en.wikipedia.org/wiki/Convention_over_configuration](https://en.wikipedia.org/wiki/Convention_over_configuration)
