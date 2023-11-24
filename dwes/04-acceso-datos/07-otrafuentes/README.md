# Datos de internet

Es común utilizar fuentes de datos de otras páginas web. Para ello se utilizan librerías.

## Librería

Libraría:
- [Instalación](https://docs.guzzlephp.org/en/stable/overview.html#installation)
- [Ejemplo de uso](https://docs.guzzlephp.org/en/stable/quickstart.html)

Procesa la siguiente página y obtén el listado de noticias de portada:

- [Meneame] (https://www.meneame.net/)

## XPATH (Repaso)

Repaso de conceptos:
- [Chuleta](https://devhints.io/xpath)
- [La cena](https://topswagcode.com/xpath/)

## Introduce en la base de datos todas las setas

https://www.fungipedia.org/hongos.html

```text
CREATE TABLE setas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    sinonimo VARCHAR(100),
    nombrecomun VARCHAR(100),
);
```

## Ejemplo

```php
<?php
require('vendor/autoload.php');

use GuzzleHttp\Client;

$client = new Client([
    'base_uri' => 'http://meneame.net',
    'timeout'  => 2.0,
]);

$response = $client->request('GET', '/');

print_r($response);

$content =  $response->getBody();

libxml_use_internal_errors(true);
$doc = new DOMDocument();
$doc->loadHTML($content);
$xpath = new DOMXPath($doc);

$titles = $xpath->query('//*/h2');
foreach ($titles as $title) {
        echo $title->nodeValue."\n";
}

?>

```