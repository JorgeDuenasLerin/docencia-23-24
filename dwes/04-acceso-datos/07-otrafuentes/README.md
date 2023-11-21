# Datos de internet

Es común utilizar fuentes de datos de otras páginas web. Para ello se utilizan librerías.

## Librería

[Instalación](https://docs.guzzlephp.org/en/stable/overview.html#installation)
[Ejemplo de uso](https://docs.guzzlephp.org/en/stable/quickstart.html)


Procesa la siguiente página y obtén el listado de noticias de portada:

[Meneame] (https://www.meneame.net/)

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