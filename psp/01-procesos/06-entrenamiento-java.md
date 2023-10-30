# Enunciados

## Ejercicio compresor

Investiga el comando ```tar```de linux para crear backups de directorios.

Crea un programa que reciba por parámetro varias rutas del sistema de fichero. El programa comprimirá cada una de ellas con un proceso. Si se reciben 3 directorios creará 3 archivos comprimidos con el nombre de cada directorio y la fecha YYYY-MM-DD.

Ejemplo de ejecución:

```
java Compresor /home/jorge /var/www /etc
```

Para simplificar el problema puedes asumir que todos los directorios existen.

Creará en el directorio donde se ejecute:

```
home_jorge_2023_10_30.tar
var_www_2023_10_30.tar
etc_2023_10_30.tar
```

## Ejercicio monitor memoria

Crea un programa que ejecute cada N segundos (5seg) el comando ```free -h``` y escriba por pantalla el estado de la memoria del sistema.

## Listado de direcciones ip

Crea un programa que sea capas de mostrar un listado de todas las ```ip``` que tiene un sistema. Se debe poder ejecutar tanto en Windows como en Linux.

> Pista: Utiliza expresiones regulares.

## Listado de uso de espacio.

Crea un programa que reciba varias rutas y ejecuta por cada una de ellas ```du -h RUTA | tail -1```.

Este comando devolverá:

```txt
282G	RUTA
```

Muestra un listado de por orden de espacio utilizado de cada una de las rutas.
