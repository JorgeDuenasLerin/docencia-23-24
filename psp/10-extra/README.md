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


## Java

### Mayo s3

#### Programa de Sincronización de Threads para una Tienda de Productos Online:

Desarrolla un sistema en Java para una tienda de productos online donde múltiples usuarios pueden agregar o quitar productos de su carrito de compras simultáneamente. Para evitar inconsistencias de datos debido a accesos concurrentes, implementa un mecanismo de sincronización de threads.

Crea una clase CarritoCompras que maneje una lista de Productos. Utiliza métodos sincronizados para añadir y eliminar productos del carrito. Implementa una simulación donde varios threads representan diferentes usuarios que modifican el carrito al mismo tiempo. Asegúrate de que los cambios en el carrito de compras reflejen correctamente la suma y eliminación concurrente de productos sin errores de sincronización.

Ten en cuenta que en esta tienda especial varios usuarios comparten el carrito. El carrito tendrá capacidad para 10 elementos. Los usuario añaden 4 elementos y eliminan 2, estas operaciones están entremezcladas de forma aleatoria. De esta forma el número total de productos que cada usuario aporta es de 2. Cuando un usuario quiere añadir un elemento y el carrito está lleno, el usuario se bloquea hasta que se libere un hueco. Entre acción cada usuario espera un tiempo aleatorio entre 500 y 1500 milisegundos.

Crea un programa principal con un carrito para 10 elementos y 5 usuarios. NOTA: Al finalizar el programa el carrito debe estar lleno.

#### Programa de Comunicación UDP para un Sistema de Conducción Autónoma:

En un sistema de conducción autónoma, diferentes componentes del sistema (como sensores y procesadores de imagen) necesitan comunicarse en tiempo real. Implementa un sistema de comunicaciones UDP en Java que permita la transmisión de datos críticos, como la distancia a obstáculos, entre estos componentes.

Desarrolla un programa en Java utilizando sockets UDP para permitir la comunicación entre un sensor de distancia y un sistema de procesamiento central en un vehículo autónomo. El sensor debe enviar periódicamente la información de la distancia a obstáculos al procesador central. Implementa tanto el cliente (sensor) como el servidor (procesador) y asegura que los datos se transmitan.

Crea un programa principal en el que haya 5 sensores y un procesador. El procesador escribirá en un log la distancia recibida, el identificador del sensor y la hora.

#### Programa HTTP para un Servicio de Música:

Un servicio de streaming de música permite a los usuarios acceder a una amplia biblioteca de canciones a través de la web. Desarrolla un sistema en Java que utilice HTTP para manejar solicitudes de los usuarios, permitiendo buscar canciones y recibir información sobre ellas. Las canciones están en un directorio que se especifica por línea de comandos.

Implementa un servidor web en Java multithread que maneje solicitudes HTTP de clientes buscando canciones en el directorio. El servidor debe poder recibir solicitudes que contengan la cadena a buscar. El servidor generará un listado de canciones.

El servidor también permite descargar la canción.

### Junio

#### Fábrica de coches

En una fábrica de coches, se utilizan múltiples líneas de ensamblaje que operan en paralelo para ensamblar diferentes partes de un coche. Cada línea de ensamblaje está gestionada por un thread en Java. De forma infinita "Comienza ensamblaje de coche", espera un tiempo aleatorio entre 2 y 3 segundos y "Finaliza ensamblado de coche".

Para garantizar que cada coche ensamblado pase por una inspección de calidad antes de salir de la fábrica, se utiliza un thread inspector que revisa los coches ensamblados. El inspector tiene acceso a un array de líneas de ensamblado, irá una a una intentando realizar la inspección. Si al llegar a una no hay coche que revisar esperará a que haya un coche terminado.

Implementa un sistema en Java que gestione la sincronización entre las líneas de ensamblaje y el inspector. Utiliza synchronized, wait, notify o notifyAll para resolver el problema de sincronización.

Ejemplo de Ejecución:

- Tres threads (líneas de ensamblaje) ensamblan coches.
- Un thread (inspector) revisa los coches ensamblados.
- Una vez que un coche está ensamblado, el thread de la línea de ensamblaje debe notificar al inspector.
- Si una línea ha terminado pero el coche no ha sido revisado debe esperar.

#### Almacenamiento de Ramos y Peticiones UDP

En una floristería, varios empleados están encargados de preparar ramos de flores para los pedidos de los clientes. La floristería tiene espacio para almacenar hasta 30 ramos de flores generados. Cada empleado (thread) prepara los ramos y los coloca en el almacenamiento. Si el almacenamiento está lleno, el empleado espera hasta que haya espacio disponible.

Las peticiones de ramos llegan a través de UDP. Un thread servidor atiende estas peticiones, verificando si hay suficientes ramos en el almacenamiento. Si hay suficientes ramos, se quitan del almacenamiento y se notifica a los generadores. El servidor devuelve al cliente el número de ramos que se le han dado, o -1 si no hay suficientes ramos disponibles.

Problema:
- Genere ramos en threads empleados con tiempos de generación entre 3 y 4 segundos.
- Mantenga un almacenamiento con capacidad para 30 ramos.
- Utilice UDP para recibir peticiones de ramos de los clientes y responder con la cantidad de ramos entregados (o -1 si no hay suficientes).
- Sincronice los threads utilizando synchronized, wait, notify o notifyAll.