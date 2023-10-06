# Objetos PHP

## Declaración básica.

### Libros

Ejemplo básico. Todos los atributos son públicos para facilitar el trabajo.
Propiedades: título, autor, ISBN, precio.
Métodos: mostrarInformacion(), cambiarPrecio().
Uso en página: Una página de detalles de un libro donde se muestre la información del libro y se permita cambiar el precio.

```php
/**
 * Clase para representar un Libro
 */
class Libro {
    /** @var string $titulo Título del libro */
    public $titulo;
    
    /** @var string $autor Autor del libro */
    public $autor;
    
    /** @var string $ISBN Número ISBN del libro */
    public $ISBN;
    
    /** @var float $precio Precio del libro */
    public $precio;

    /**
     * Muestra la información del libro.
     * @return string Información del libro.
     */
    public function mostrarInformacion() {
        return "Título: $this->titulo, Autor: $this->autor, ISBN: $this->ISBN, Precio: $this->precio";
    }

    /**
     * Cambia el precio del libro.
     * @param float $nuevoPrecio Nuevo precio del libro.
     */
    public function cambiarPrecio($nuevoPrecio) {
        $this->precio = $nuevoPrecio;
    }
}
```

Añade a la anterior clase los métodos save y load. Estos métodos guardaran la información del objeto en un fichero.


### Cuenta bancaria

Objeto "CuentaBancaria":

Propiedades: titular, saldo.
Métodos: depositar(), retirar(), consultarSaldo().
Uso en página: Una página de banca en línea para gestionar una cuenta bancaria.


```php
/**
 * Clase para representar una Cuenta Bancaria
 */
class CuentaBancaria {
    /** @var string $titular Titular de la cuenta */
    private $titular;
    
    /** @var float $saldo Saldo de la cuenta */
    private $saldo;

    /**
     * Constructor de la clase CuentaBancaria.
     * @param string $titular Titular de la cuenta.
     * @param float $saldoInicial Saldo inicial de la cuenta (opcional).
     */
    public function __construct($titular, $saldoInicial = 0) {
        $this->titular = $titular;
        $this->saldo = $saldoInicial;
    }

    /**
     * Deposita una cantidad a la cuenta.
     * @param float $cantidad Cantidad a depositar.
     */
    public function depositar($cantidad) {
        $this->saldo += $cantidad;
    }

    /**
     * Retira una cantidad de la cuenta.
     * @param float $cantidad Cantidad a retirar.
     * @return string Mensaje de éxito o error.
     */
    public function retirar($cantidad) {
        if ($this->saldo >= $cantidad) {
            $this->saldo -= $cantidad;
        } else {
            return "Saldo insuficiente";
        }
    }

    /**
     * Consulta el saldo de la cuenta.
     * @return float Saldo actual.
     */
    public function consultarSaldo() {
        return $this->saldo;
    }

    /**
     * Representación en cadena de texto del objeto.
     * @return string Representación en cadena del objeto.
     */
    public function __toString() {
        return "Titular: $this->titular, Saldo: $this->saldo";
    }
}
```

Crea el método fusionar.

> Este método recibiré por parámetro otra cuenta bancaria. El objeto cuentabancaria pasado por parámetro será integrado en el objeto que recibe el mensaje. Esto implica que el objeto cuanta bancaria pasado por parámetro tendrá su saldo a cero y el objeto que recibe el mensaje obtendrá su saldo. Ambos objetos modificarán la información de titular para reflejar este hecho. Siguiendo el ejemplo:

```php
$destino = new CuentaBancaria("Jorge");
$origen = new CuentaBancaria("Milloneti", 3000000);
$destino->fusionar($origen);
echo $origen."<br>";
echo $destino."<br>";
```

Mostrará:

```
Titular: (deshabilitada) Milloneti, Saldo: 0
Titular: Jorge (Milloneti), Saldo: 3000000
```

## Ejercicios

Crea el objeto Planeta con:
- nombre
- masa
- diametro
- distancia al sol

El objeto planeta tendrá los métodos:

- Muestra como div-span
- Muestra para editar
- Muestra para crear. Método estático
- Muestra como fila-tabla


Crear una clase SistemaSolar con:
- lista privada de planetas

Métodos:
- guardar en fichero
- cargar en fichero
- mostrar como tabla
- añadir planeta

Para reducir el tamaño de la práctica no es necesario hacer la gestión completa del sistema solar.

## Página

Crea una página para gestionar un listado de planetas, solo se podrán añadir y el usuario siempre pondrá la información bien.