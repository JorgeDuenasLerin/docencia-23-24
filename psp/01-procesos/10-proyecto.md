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

## Fuerza brutal password

Calcular el md5sum

```c
#include <stdio.h>
#include <string.h>
#include <openssl/md5.h>

void compute_md5(char *str, unsigned char *result) {
    MD5_CTX ctx;
    MD5_Init(&ctx);
    MD5_Update(&ctx, str, strlen(str));
    MD5_Final(result, &ctx);
}

int main() {
    char *input = "Hello, world!";
    unsigned char result[MD5_DIGEST_LENGTH];  // MD5_DIGEST_LENGTH es generalmente 16
    int i;

    compute_md5(input, result);

    printf("MD5(\"%s\") = ", input);
    for (i = 0; i < MD5_DIGEST_LENGTH; i++)
        printf("%02x", result[i]);
    printf("\n");

    return 0;
}
```