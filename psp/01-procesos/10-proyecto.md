# Prácticas

En estas dos prácticas vamos a realizar un programa en versión monoproceso y otro en version multiproceso (2 procesos y n procesos).

## Toma de tiempos en C

```c
#include <stdio.h>
#include <time.h>

#define NUM_CALC 24

// Función para calcular el factorial de un número
long long factorial(int n) {
    if (n == 0) return 1;
    return n * factorial(n - 1);
}

int main() {
    int num = NUM_CALC;  // Número para calcular el factorial

    // Variables para almacenar el tiempo de inicio y fin
    clock_t start, end;
    double cpu_time_used;

    start = clock();  // Guardamos el tiempo de inicio

    // Ejecutamos la tarea cuyo tiempo de ejecución queremos medir
    long long result = factorial(num);

    end = clock();  // Guardamos el tiempo de finalización

    // Calculamos el tiempo de ejecución en segundos
    // Tomamos la diferencia entre el tiempo de finalización y el tiempo de inicio
    // Luego dividimos por CLOCKS_PER_SEC para obtener el tiempo en segundos
    cpu_time_used = ((double) (end - start)) / CLOCKS_PER_SEC;

    printf("Factorial de %d es %lld\n", num, result);
    printf("Tiempo de ejecución: %f segundos\n", cpu_time_used);

    return 0;
}
```

## Cálculo de números primos.



## Verificación de passwords.

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