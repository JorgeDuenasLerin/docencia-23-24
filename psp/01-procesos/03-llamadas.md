# POSIX

Generales

## POSIX (Portable Operating System Interface)

fork(): Crea un nuevo proceso hijo duplicando el proceso padre, lo que permite la ejecución de múltiples tareas de manera concurrente.

exec(): Reemplaza la imagen del proceso actual con una nueva imagen ejecutable, generalmente utilizada después de una llamada a fork() para iniciar un programa en el proceso hijo.

wait() y waitpid(): Esperan a que un proceso hijo termine su ejecución y recuperan su estado de salida. waitpid() permite un mayor control y la espera de un proceso específico.

exit(): Termina un proceso y devuelve un código de salida al sistema operativo que puede ser recogido por el proceso padre a través de wait() o waitpid().

pipe(): Crea una tubería (pipe) que permite la comunicación unidireccional entre procesos. Se utiliza para la transferencia de datos entre procesos relacionados.

dup() y dup2(): Duplican un descriptor de archivo existente, lo que es útil para redirigir la entrada/salida estándar o establecer la entrada/salida de un proceso a través de un descriptor de archivo personalizado.

kill(): Envía una señal a un proceso o grupo de procesos, lo que permite la comunicación y el control entre procesos.

## Señales

signal(): Establece un manejador de señal personalizado para una señal específica. Esto permite que un proceso o hilo maneje señales de manera personalizada cuando se producen.

kill(): Envía una señal a un proceso o grupo de procesos desde otro proceso. Esto se utiliza para la comunicación y el control entre procesos o hilos.

```c
#include <stdio.h>
#include <stdlib.h>
#include <signal.h>
#include <unistd.h>

// Función de controlador de señal para SIGINT
void sigint_handler(int signo) {
    printf("Se recibió la señal SIGINT (Ctrl + C)\n");
    // Aquí puedes realizar acciones adicionales antes de salir si lo deseas
    exit(0);
}

int main() {
    // Registrar un manejador de señales para SIGINT usando la función signal
    signal(SIGINT, sigint_handler);

    printf("Ejecuta este programa y presiona Ctrl + C para generar una señal SIGINT.\n");

    // Mantén el programa en ejecución para recibir la señal
    while (1) {
        sleep(1);
    }

    return 0;
}
```

Utiliza control C ejecutando el proceso. ¿Qué ocurre si le quitas el exit(0)?

## Ejemplos

### Ejecución de comandos

```c
#include <stdio.h>
#include <unistd.h>

int main() {
    // El nombre del programa a ejecutar
    char *program = "ls";

    // Argumentos para el programa: el nombre del programa, "-l", "-a" y NULL al final
    char *arguments[] = {"ls", "-l", "-a", NULL};

    // Llamar a execvp para ejecutar el comando ls con argumentos
    execvp(program, arguments);

    // Si execvp falla, imprimirá un error
    perror("execvp");
    return 1;
}
```

Ejercicios:
- Crea un programa que ejecute el comando para mostrar la ip comando "ip a".
- Crea otro programa que ejecute un comando para mostrar la fecha.

### Redirección

La función dup2 en sistemas operativos basados en UNIX se utiliza para duplicar un descriptor de archivo existente a otro descriptor de archivo. Lo que hace es "redirigir" la entrada, salida o errores de un proceso a otra ubicación. Puede ser útil en situaciones como cuando quieres que un proceso escriba su salida no en la terminal (que es su comportamiento predeterminado), sino en un archivo.

Funcionamiento de dup2:
La función tiene esta forma:

```c
int dup2(int oldfd, int newfd);
````

Parámetros:
- oldfd: Es el descriptor de archivo original que ya está abierto y que quieres duplicar.
- newfd: Es el descriptor de archivo al que quieres redirigir oldfd. Si newfd ya estaba abierto, dup2 lo cerrará antes de hacer la redirección.`


```c
#include <stdio.h>
#include <unistd.h>
#include <fcntl.h>

int main() {
    // Abrir un archivo para escritura
    int file = open("output.txt", O_WRONLY | O_CREAT | O_TRUNC, 0644);
    if (file < 0) {
        perror("open");
        return 1;
    }

    // Redirigir la salida estándar al archivo
    dup2(file, STDOUT_FILENO);  // STDOUT_FILENO es una constante que representa la salida estándar

    // Ahora, cualquier cosa que escribamos usando printf irá al archivo "output.txt"
    printf("¡Hola, mundo!");

    // Cerrar el archivo
    close(file);

    return 0;
}
```

Ejercicios:
- Crea un programa que muestre el contenido del directorio ```/``` y lo escriba en un fichero.

### Comunicación entre procesos

La función pipe se utiliza para crear un "canal de comunicación" entre dos procesos en un sistema operativo. Imagina que es como un tubo: un proceso introduce información en un extremo del tubo y otro proceso recoge esa información del otro extremo. Esta "información" viaja solo en una dirección, es decir, de un proceso a otro, pero no viceversa.

En términos técnicos, pipe crea dos puntos de acceso o "descriptores de archivo": uno para leer y otro para escribir. Estos descriptores son simplemente números que representan puntos de acceso al sistema para leer o escribir datos.

Al llamar a pipe, le proporcionas un arreglo de dos elementos. pipe llenará este arreglo con dos números: el primero será el descriptor para leer y el segundo para escribir.

Puntos: 
- fd[0]: Es el descriptor que usas si quieres leer datos del pipe.
- fd[1]: Es el descriptor que usas si quieres escribir datos en el pipe.

```c
#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>

#define READ 0
#define WRITE 1

int main() {
    int fd[2];
    pid_t pid;

    // Crear un pipe
    if (pipe(fd) == -1) {
        perror("pipe");
        exit(EXIT_FAILURE);
    }

    // Bifurcar el proceso actual para crear un proceso hijo
    pid = fork();
    if (pid == -1) {
        perror("fork");
        exit(EXIT_FAILURE);
    }

    if (pid == 0) {  // Código del proceso hijo
        int numero_recibido;
        close(fd[WRITE]);  // El hijo no escribirá en el pipe, así que cerramos el descriptor de escritura

        // Leer el número del pipe
        read(fd[READ], &numero_recibido, sizeof(numero_recibido));
        close(fd[READ]);  // Cerrar el descriptor de lectura después de leer

        // Imprimir el número recibido
        printf("Proceso hijo recibió el número: %d\n", numero_recibido);
        exit(EXIT_SUCCESS);

    } else {  // Código del proceso padre
        int numero_a_enviar = 42;  // Este es el número que el padre enviará al hijo
        close(fd[READ]);  // El padre no leerá del pipe, así que cerramos el descriptor de lectura

        // Escribir el número en el pipe
        write(fd[WRITE], &numero_a_enviar, sizeof(numero_a_enviar));
        close(fd[WRITE]);  // Cerrar el descriptor de escritura después de escribir

        // Esperar a que el proceso hijo termine
        wait(NULL);
        printf("Proceso padre terminó\n");
    }

    return 0;
}
```

Ejercicios:
- Crea un programa que creee dos procesos. El proceso padre enviará al hijo una cadena de texto.
- Crea un programa que creee dos procesos. El proceso padre enviará al hijo un número que lee del usuario, el hijo lo eleva al cubo y lo escribe en salida.txt.


### Redirección entre procesos

```c
#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>

int main() {
    int fd[2];  // Descriptores de archivo para el pipe
    pid_t pid;

    // Crear un pipe
    if (pipe(fd) == -1) {
        perror("pipe");
        exit(EXIT_FAILURE);
    }

    pid = fork();
    if (pid < 0) {
        perror("fork");
        exit(EXIT_FAILURE);
    }

    if (pid == 0) {  // Proceso hijo
        close(fd[0]);  // Cerrar el extremo de lectura del pipe

        // Redirigir la salida estándar al extremo de escritura del pipe
        dup2(fd[1], STDOUT_FILENO);
        close(fd[1]);

        // Datos para execvp: comando "ls" con argumentos "-l" y "-a"
        char *cmd = "ls";
        char *args[] = {"ls", "-l", "-a", NULL};
        
        execvp(cmd, args);
        perror("execvp");  // Se ejecutará solo si execvp falla
        exit(EXIT_FAILURE);
    } else {  // Proceso padre
        char buffer[1024];
        ssize_t bytes;

        close(fd[1]);  // Cerrar el extremo de escritura del pipe

        // Leer la salida del comando
        while ((bytes = read(fd[0], buffer, sizeof(buffer)-1)) > 0) {
            buffer[bytes] = '\0';  // Asegurarse de que es una cadena terminada en NULL
            printf("%s", buffer);
        }

        close(fd[0]);  // Cerrar el extremo de lectura del pipe
        wait(NULL);    // Esperar a que el proceso hijo termine
    }

    return 0;
}
```


Esquema para leer lo que escribe un proceso.
```c
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <unistd.h>

#define BUFFER_SIZE 1024  // Definimos una constante para el tamaño del buffer

int main(int argc, char *argv[]) {
    // Comprobamos si se ha pasado un comando como argumento
    if (argc < 2) {
        fprintf(stderr, "Uso: %s <comando>\n", argv[0]);
        exit(1);
    }

    int pipefd[2];
    // Creamos un pipe (canal de comunicación unidireccional)
    // pipefd[0] es el extremo de lectura, pipefd[1] es el extremo de escritura
    if (pipe(pipefd) == -1) {
        perror("pipe");  // Imprime un mensaje de error si no se pudo crear el pipe
        exit(1);
    }

    // Creamos un proceso hijo duplicando el proceso actual
    pid_t pid = fork();
    if (pid == -1) {
        perror("fork");  // Imprime un mensaje de error si no se pudo crear el proceso hijo
        exit(1);
    }

    if (pid == 0) {  // Proceso hijo
        close(pipefd[0]);  // Cerramos el extremo de lectura, ya que no lo vamos a usar

        // Redirigimos la salida estándar (STDOUT_FILENO) al extremo de escritura del pipe
        dup2(pipefd[1], STDOUT_FILENO);
        close(pipefd[1]);  // Cerramos el extremo de escritura original, ya que ya lo hemos duplicado

        // Ejecutamos el comando pasado como argumento
        execvp(argv[1], &argv[1]);
        perror("execvp");  // Si execvp falla, imprimimos un mensaje de error
        exit(1);
    } else {  // Proceso padre
        close(pipefd[1]);  // Cerramos el extremo de escritura, ya que no lo vamos a usar

        char buffer[1024];
        ssize_t bytes;
        // Leemos la salida del comando desde el extremo de lectura del pipe
        while ((bytes = read(pipefd[0], buffer, sizeof(buffer) - 1)) > 0) {
            buffer[bytes] = '\0';  // Añadimos un carácter nulo al final para que sea una cadena válida
            printf("%s", buffer);  // Imprimimos la salida
        }
        close(pipefd[0]);  // Cerramos el extremo de lectura
    }

    return 0;
}
```


# Otros elementos avanzados

> No entran en el examen

shmget(), shmat(), shmdt(): Estas llamadas al sistema se utilizan para la creación, conexión y desconexión de segmentos de memoria compartida, lo que permite a los procesos compartir datos en la memoria.

msgget(), msgsnd(), msgrcv(): Permiten la creación, envío y recepción de mensajes en colas de mensajes, lo que facilita la comunicación entre procesos a través de mensajes.

semget(), semop(), semctl(): Estas llamadas al sistema se utilizan para la creación, operación y control de conjuntos de semáforos, que son mecanismos de sincronización utilizados para la exclusión mutua entre procesos.

## threads

pthread_create(): Crea un nuevo hilo y comienza su ejecución. Puedes especificar la función que el hilo ejecutará como su punto de entrada.

pthread_join(): Espera a que un hilo termine su ejecución y recupera su estado de salida. Es útil para sincronizar la ejecución de hilos.

pthread_detach(): Marca un hilo como "desvinculado", lo que significa que el sistema liberará automáticamente los recursos del hilo cuando termine su ejecución.

pthread_mutex_init(), pthread_mutex_lock(), pthread_mutex_unlock(): Estas funciones permiten la creación, bloqueo y desbloqueo de mutex (semáforos binarios) para lograr la exclusión mutua entre hilos.

pthread_cond_init(), pthread_cond_wait(), pthread_cond_signal(): Estas funciones se utilizan para crear y gestionar variables de condición, que son útiles para la sincronización de hilos.