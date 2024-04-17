# Enunciados

## Procesos C

### Ejercicio 1

Crea un programa que acepte un número como parámetro de línea de comandos. El número recibido indicará la cantidad de números aleatorios generados.

El programa creará otro proceso con la llamada al sistema ```fork```. El proceso padre generará ```n``` números aleatorios y se los enviará al proceso hijo a través de un pipe. El padre esperará a que el hijo termine (padre usa ```wait```).

El hijo recibirá los números por el pipe e irá procesando el menor y el mayor. Cuando termine de recibir números el hijo escribirá por pantalla el número menor y el número mayor.


### Ejercicio 2

Escribe un programa que reciba por parámetro un número, este número indicará el número de procesos a crear.

Los hijos buscarán entre los números del 10000 al 99999 los números capicúas. Cada hijo buscará más o menos un número parecido de números.

Cuando encuentre un número capicúa escribirá:

```
hijo <x>: <y> (Siendo x el número de hijo e y el número capicúa)
```

El padre espera a que los hijos finalicen.

[Código necesario C](https://stackoverflow.com/a/70477879/932888)

```
sprintf is returning the bytes and adds a null byte as well:

# include <stdio.h>
# include <string.h>

int main() {
    char buf[1024];
    int n = sprintf( buf, "%d", 2415);
    printf("%s %d\n", buf, n);
}

Output:

2415 4
```


### Ejercicio 3

Escribe un programa en C que acepte un número N como parámetro de línea de comandos. Este número N representará la cantidad de procesos hijo que el proceso padre debe crear utilizando fork. Cada proceso hijo debe calcular la letra del DNI para un rango específico de números, dividiendo el espacio total (desde 0 hasta 99999999) en N partes iguales.

Especificaciones:

- Cada hijo calculará la letra del DNI para su rango asignado de números y escribirá en un archivo único los resultados en el formato "DNI - Letra", uno por línea.
- Los archivos serán nombrados dni_output_<n>.txt, donde <n> es el número del proceso hijo.
- El proceso padre debe esperar a que todos los hijos terminen su ejecución antes de imprimir en la consola "Procesado completado para todos los hijos".
- Detalles del cálculo de la letra del DNI:
- La letra del DNI en España se calcula dividiendo el número del DNI por 23 y el residuo determina la letra según una tabla predefinida de letras (por ejemplo, TRWAGMYFPDXBNJZSQVHLCKE).

Consideraciones:

- Usa wait para asegurar que el padre espere por cada hijo.
- Emplea fprintf para escribir en los archivos.
- Utiliza sprintf para construir los strings que necesitas escribir en el archivo.

### Ejercicio 4

Escribe un programa en C que implemente un sistema simple de notificaciones usando señales entre procesos. El programa tendrá un proceso padre que actúa como un monitor de eventos y varios procesos hijo que simulan eventos aleatorios.

Especificaciones:

- Al iniciar, el programa debe aceptar un número M como parámetro de línea de comandos, indicando la cantidad de procesos hijo a crear.
- Cada proceso hijo simulará la ocurrencia de un evento aleatorio (por ejemplo: temperatura alta, presión baja, etc. Son ejemplos, no hay que programar el tipo de señal. ) después de un tiempo aleatorio entre 1 y 5 segundos.
- Cuando un hijo detecta un evento, debe enviar una señal (puedes usar SIGUSR1) al proceso padre.
- El proceso padre, al recibir la señal de cualquier hijo, debe imprimir un mensaje que incluya el PID del hijo y un mensaje descriptivo del tipo de evento (el mensaje puede ser genérico, como "Evento detectado por [PID]").

Detalles adicionales:

- Los hijos deben dormir (sleep) un tiempo aleatorio antes de enviar la señal para simular el retraso en la detección de eventos.
- El proceso padre debe manejar las señales para interceptar SIGUSR1 y responder adecuadamente.
- Una vez que un proceso hijo envía su señal, debe terminar su ejecución.
- El padre espera que se ejecuten todos los hijos.

### Ejercicio 5

Crea un programa en C que simule un simple sistema de cálculo con un proceso padre que interactúa con el usuario y un proceso hijo que realiza los cálculos. El padre mostrará un menú para que el usuario seleccione entre sumar, restar o salir, y enviará los detalles de la operación al hijo a través de una tubería. El hijo procesará estos datos y enviará el resultado de vuelta al padre a través de otra tubería.

Especificaciones:

- El programa debe mostrar un menú continuamente hasta que el usuario seleccione la opción de "salir".
- El menú ofrecerá las opciones:
    - Sumar dos números.
    - Restar dos números.
    - Salir.
- El proceso padre recoge la elección del usuario. Si es una operación, también solicita dos números y los envía, junto con la operación, al hijo a través de una tubería.
- El proceso hijo recibe los datos, realiza el cálculo y envía el resultado de vuelta al padre a través de otra tubería.
- Si el usuario selecciona "salir", el padre enviará una señal de terminación (SIGKILL, es decir, señal -9) al hijo para terminar su ejecución de manera inmediata y luego el padre terminará su propia ejecución.

Detalles adicionales:
- Se deben usar dos tuberías: una para enviar datos del padre al hijo y otra para enviar el resultado de vuelta al padre.
- El padre debe manejar adecuadamente la apertura y cierre de los extremos de las tuberías para evitar bloqueos y fugas de recursos.
- Implementa una gestión adecuada de errores para la creación de procesos y tuberías.
- Asegúrate de que el padre envía la señal SIGKILL al hijo solo cuando el usuario elija salir, lo que garantiza una terminación limpia del hijo antes de que el padre también termine.

Estructura del programa:
- Menú interactivo: El padre muestra el menú y recoge la elección del usuario.
- Comunicación padre-hijo: El padre envía la operación y los números al hijo a través de una tubería, y recibe los resultados del cálculo del hijo a través de otra tubería.
- Terminación del hijo: Cuando el usuario elige salir, el padre envía una señal SIGKILL al hijo para terminar su proceso de manera inmediata.


### Ejercicio 6

Desarrolla un programa en C que cree varios procesos hijo para ejecutar tareas de determinación de primalidad, usando el estado de finalización para controlar el éxito o fallo de cada proceso hijo basado en si el número generado es primo o no.

Especificaciones:

- El programa debe aceptar un número N como parámetro de línea de comandos, que especificará el número de procesos hijo a crear.
- Cada proceso hijo generará un número aleatorio entre 1 y 100 y determinará si este número es primo.
- Un proceso hijo que determine que su número es primo terminará con exit(1) para indicar fallo, y si no es primo, con exit(0) para éxito.

Detalles adicionales:

- El proceso padre debe esperar a que todos los hijos finalicen y luego debe revisar los códigos de estado de cada uno para determinar cuántos procesos determinaron un número primo (fallidos) y cuántos no (exitosos).
- El padre debe imprimir cuántos procesos resultaron en números primos y cuántos en números no primos.

Uso del estado de finalización:
- El padre analizará el valor devuelto por cada waitpid usando macros como WIFEXITED y WEXITSTATUS para determinar si el proceso hijo terminó normalmente y cuál fue su código de salida.

Estructura del programa:
- Creación de Procesos: Crea N procesos hijo que cada uno realizará la tarea de determinar la primalidad de un número generado aleatoriamente.
- Determinación de Primalidad en los Hijos: Cada hijo genera un número aleatorio, comprueba si es primo, y termina con un código de estado adecuado.
- Recopilación de Resultados en el Padre: El padre recoge y analiza los estados de finalización para contar cuántos números eran primos y cuántos no.
- Reporte de Resultados: El padre imprime los resultados de cuántos números fueron determinados como primos y cuántos como no primos.