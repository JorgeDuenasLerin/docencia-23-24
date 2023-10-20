# Elementos avanzados

## self vs this vs static

> OJO self y static para acceder cuando hay herencia

[https://www.php.net/manual/en/language.oop5.paamayim-nekudotayim.php](https://www.php.net/manual/en/language.oop5.paamayim-nekudotayim.php)

## Singleton

El patrón Singleton: Es un patrón software para garantizar que solo existe un objeto instanciado de una clase en cualquier momento de la aplicación.

Útil para:
- Objetos de configuración que deben ser accesibles en todo el sistema
- Objetos que implementan funcionalidad de Logging
- Elementos de acceso al sistema de ficheros y bases de datos

```
<?php
/** Example taken from http://www.webgeekly.com/tutorials/php/how-to-create-a-singleton-class-in-php/ **/
class Unico
{
    public $cosa;

    // Hold an instance of the class
    private static $instance;

    // The singleton method
    public static function singleton()
    {
        if (!isset(self::$instance)) {
            self::$instance = new Unico();
        }
        return self::$instance;
    }

    private function __construct() {}

}
$user1 = Unico::singleton();
$user2 = Unico::singleton();
$user3 = Unico::singleton();
?>
```

## Clases abstractas

Son clases que tienen un método abstracto, al tener un método no definido no se pueden instanciar objetos de esta clase.

Una clase que sea descendiente de esta, deberá definir el/los métodos abstractos o de lo contrario también será abstracta.

```
<?php

abstract class Instrumento {
    private $peso;

    public function setPeso(float $peso) {
        $this->peso = $peso;
    }

    abstract public function tocar();
}

class Guitarra extends Instrumento {
    public function tocar() {
        echo "Pon acorde en mano izquierda<br/>";
        echo "Golpea cuerdas<br/>";
    }
}

class Saxofon extends Instrumento {
    public function tocar() {
        echo "Pon nota en pulsadores<br/>";
        echo "Sopla aire<br/>";
    }
}

?>
```


## Interfaces
Las interfaces permiten especificar los métodos que debe implementar un
objeto que cumpla con la interface.

Estas herramientas de la POO no especifican ninguna parte de la
implementación. Indican solo el qué y no el cómo.

```
<?php

interface Ordenable
{
    public function estableceClave($k);
    public function obtieneClave();
    public function esMayor(Ordenable $o);
    public function esIgual(Ordenable $o);
    public function esMenor(Ordenable $o);
}

class Numero implements Ordenable
{
    private $clave;

    public function estableceClave($k)
    {
        $this->clave = k;
    }
    public function obtieneClave()
    {
        return $this->clave;
    }
    public function esMayor(Ordenable $o)
    {
        return $this->obtieneClave() > $o->obtieneClave();
    }
    public function esIgual(Ordenable $o)
    {
        return $this->obtieneClave() == $o->obtieneClave();
    }
    public function esMenor(Ordenable $o)
    {
        return $this->obtieneClave() < $o->obtieneClave();
    }
}

?>
```

## Traits (Rasgos)

Es una herramienta que permite reutilizar y agrupar código para tareas concretas y específicas.

Las funciones agrupadas se deben poder asociar a culaquier tipo de dato o deben estar autocontenidas (se puede añadir al objeto todas las propiedades y toda la funcionalidad).

Esta herramienta añade funcionalidad de forma horizontal.

Ejemplos:

```

<?php

trait DiceHola
{
    public function hola()
    {
        echo "Hola mundo!<br/>";
    }
}

class Simple
{
    use DiceHola;

    private $var;

    public function otraCosa()
    {
        echo "Otra cosa";
    }
}

$o = new Simple();
$o->hola();
$o->otraCosa();

?>
```

```
<?php
trait Imprimible
{
    public function imprime()
    {
        foreach (get_object_vars($this) as $propiedad => $valor) {
            echo "$propiedad $valor<br />";
        }
    }
}

class Persona
{
    use Imprimeble, DiceHola;

    public $nombre;
    public $apellido;
    public $edad;
}

$p = new Persona();
$p->nombre ="Jorge";
$p->apellido ="Dueñas";
$p->edad ="23";
$p->imprime();
?>
```

```
<?php
trait ArrayOrJson
{
    public function asArray() : array
    {
        return get_object_vars($this);
    }

    public function asJson() : string
    {
        return json_encode($this->asArray());
    }
}

?>
```

```
<?php

trait TieneNombre
{
    private $traitTieneNombrenombre;

    public function estableceNombre($nombre)
    {
        $this->traitTieneNombrenombre = $nombre;
    }

    public function diceNombre()
    {
        echo "Me llamo $this->traitTieneNombrenombre";
    }
}

class Perro
{
    use TieneNombre;

    public $raza;
}

$tobby = new Perro();
$tobby->estableceNombre("Tobby");
$tobby->diceNombre();

?>
```

Todo Junto

```
<?php
interface ICosa
{
    public function uno();
    public function dos();
}

abstract class Cosilla implements ICosa
{
    public function uno()
    {
        echo "Uno!<br/>";
    }

    abstract public function dos();
}

trait ImprimeNumeroMetodos
{
    function imprimeNumeroMetodos()
    {
        echo count(get_class_methods($this)) . "<br/>";
    }
}

class Cosaza extends Cosilla
{
    use ImprimeNumeroMetodos;
    public function dos()
    {
        echo "Dos!<br/>";
    }
}

class Cosota extends Cosaza
{
    public function medjaronUnTraitDeHerencia()
    {
        $this->imprimeNumeroMetodos();
    }
}

$o = new Cosaza();
$o->uno();
$o->dos();
$o->imprimeNumeroMetodos();

$on = new Cosota();
$on->medjaronUnTraitDeHerencia();
?>
```
