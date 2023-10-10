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

Instalar la librería de desarrollo:
``` 
sudo apt-get install libssl-dev
```

```c
// example.c
//
// gcc example.c -lssl -lcrypto -o example

#include <openssl/evp.h>
#include <stdio.h>
#include <string.h>

void bytes2md5(const char *data, int len, char *md5buf) {
  // Based on https://www.openssl.org/docs/manmaster/man3/EVP_DigestUpdate.html
  EVP_MD_CTX *mdctx = EVP_MD_CTX_new();
  const EVP_MD *md = EVP_md5();
  unsigned char md_value[EVP_MAX_MD_SIZE];
  unsigned int md_len, i;
  EVP_DigestInit_ex(mdctx, md, NULL);
  EVP_DigestUpdate(mdctx, data, len);
  EVP_DigestFinal_ex(mdctx, md_value, &md_len);
  EVP_MD_CTX_free(mdctx);
  for (i = 0; i < md_len; i++) {
    snprintf(&(md5buf[i * 2]), 16 * 2, "%02x", md_value[i]);
  }
}

int main(void) {
  const char *hello = "hola";
  char md5[33]; // 32 characters + null terminator
  bytes2md5(hello, strlen(hello), md5);
  printf("%s\n", md5);
}
```