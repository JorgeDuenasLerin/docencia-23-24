# Enunciados

## Procesos C

### Ejercicio 1

Crea un programa que acepte un número como parámetro de línea de comandos. El número recibido indicará la cantidad de números aleatorios generados.

El programa creará otro proceso con la llamada al sistema ````fork```. El proceso padre generará ```n``` números aleatorios y se los enviará al proceso hijo a través de un pipe. El padre esperará a que el hijo termine (padre usa ```wait```).

El hijo recibirá los números por el pipe e irá procesando el menor y el mayor. Cuando termine de recibir número el hijo escribirá por pantalla el número menor y el número mayor.


### Ejercicio 2

Escribe un programa que reciba por parámetro un número, este número indicará el número de procesos a crear.

Los hijos buscarán entre los números del 10000 al 99999 los números capicúas. Cada hijo buscará más o menos un número parecido de números.

Cuando encuentre un número capicúa escribirá:

```
hijo <x>: <y> (Siendo x el número de hijo e y el número capicúa)
```