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

## Cálculo del md5

Calcular el md5sum.

Necesitamos la libraría openssl de c.

```bash
sudo apt-get install libssl-dev
```

Tenemos un ejemplo mínimo:

```c
#include <stdio.h>
#include <string.h>
#include <openssl/evp.h>

#define MD5_LEN 16

void generateMD5(const char *string, unsigned char *str_result) {
    EVP_MD_CTX *ctx;
    const EVP_MD *md;
    unsigned char result[EVP_MAX_MD_SIZE];

    ctx = EVP_MD_CTX_new();
    md = EVP_md5();

    EVP_DigestInit_ex(ctx, md, NULL);
    EVP_DigestUpdate(ctx, string, strlen(string));
    EVP_DigestFinal_ex(ctx, result, NULL);

    EVP_MD_CTX_free(ctx);

    for(int i = 0; i < MD5_LEN; i++){   // MD5 result is always 16 bytes
        sprintf(str_result+(i*2),"%02x", result[i]);
    }
}

int main(int arc, char *argv[]) {
    char *string = argv[1];

    unsigned char result[EVP_MAX_MD_SIZE];
    unsigned int result_len;

    generateMD5(string, result);

    printf("MD5(\"%s\") = %s", string, result);
   
    printf("\n");

    return 0;
}
```

Para compilarlo hay que establecer que lo queremos enlazar con la librería:

```bash
gcc md5sum.c -o md5sum -lssl -lcrypto
```

Podemos comprobar que funciona:

```
>./md5sum cosa
MD5("cosa") = 12703dd1411c33587da2004a9434a400
[:~/Workspace/módulos/docencia-23-24/psp/01-procesos] main(+1/-1)* ± 
>echo -n "cosa" | md5sum
12703dd1411c33587da2004a9434a400  -
[:~/Workspace/módulos/docencia-23-24/psp/01-procesos] main(+1/-1)* ± 
```

## Fuerza brutal password

Has conseguido acceder al hash de varias contraseñas. Tendrás que explorar por fuerza bruta cuál es el texto original.

Para limitar el problema solo se han usado letras ascii minúsculas y el texto original tiene una longitud de 4 caracteres.


```
582fc884d6299814fbd4f12c1f9ae70f
74437fabd7c8e8fd178ae89acbe446f2
28ea19352381b8659df830dd6d5c90a3
90f077d7759d0d4d21e6867727d4b2bd
```

Toma tiempos de ejecución.

En las siguientes se usarán mayúsculas y minúsculas. Además tendrán 5 caracteres.

```
f4a1c8901a3d406f17af67144a3ec71a
d66e29062829e8ae0313adc5a673f863
```