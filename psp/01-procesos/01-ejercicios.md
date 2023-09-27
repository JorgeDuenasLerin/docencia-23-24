# Ejercicios C

## Calculadora de Suma Simple

Enunciado: Crea un programa que solicite al usuario ingresar dos números enteros y muestre la suma de esos números en pantalla.

Posibles Soluciones:
1. Utiliza la función scanf de la biblioteca <stdio.h> para leer los números y luego suma los valores.
2. Usa la función fgets para leer las entradas como cadenas y luego convierte las cadenas a enteros utilizando atoi de la biblioteca <stdlib.h>.
3. Utiliza la función getchar para leer caracteres y calcula la suma acumulativa hasta que se ingrese un carácter especial, como 'q' para salir.

Conversión de Grados Celsius a Fahrenheit

## Enunciado: Escribe un programa que permita al usuario ingresar una temperatura en grados Celsius y lo convierta a grados Fahrenheit utilizando la fórmula: Fahrenheit = (Celsius * 9/5) + 32.

Posibles Soluciones:
1. Usa scanf para leer la temperatura en grados Celsius, luego aplica la fórmula y muestra el resultado.
2. Utiliza la función fgets para leer la entrada como cadena, conviértela a flotante con atof y realiza la conversión.
3. Crea una tabla de conversión previamente definida y busca la temperatura en grados Fahrenheit correspondiente en la tabla.

## Números Primos

Enunciado: Crea un programa que solicite al usuario ingresar un número entero positivo y determine si es un número primo o no.

Posibles Soluciones:
1. Utiliza un bucle for para verificar si el número es divisible por algún número entre 2 y la raíz cuadrada del número.
2. Implementa una función que verifique la primalidad y llámala desde el programa principal.

## Cálculo de Factorial

Enunciado: Desarrolla un programa que permita al usuario ingresar un número entero no negativo y calcule su factorial. Asegúrate de manejar adecuadamente los casos de entrada inválida.

Posibles Soluciones:
1. Utiliza un bucle for para calcular el factorial.
2. Implementa una función recursiva para calcular el factorial.


## Cifrado César

Enunciado: Crea un programa que permita al usuario ingresar una cadena de texto y un valor de desplazamiento. Luego, cifra la cadena utilizando el cifrado César y muestra el resultado. Asegúrate de manejar mayúsculas, minúsculas y caracteres especiales.

Posibles Soluciones:
a. Utiliza bucles y condicionales para cifrar cada carácter de la cadena según el desplazamiento ingresado.
b. Implementa una función que realice el cifrado César y llámala desde el programa principal.
c. Utiliza la función strcat de la biblioteca <string.h> para concatenar caracteres cifrados a una nueva cadena mientras recorres la entrada original.

# Ejercicios C cadenas

En C, una cadena es una secuencia de caracteres terminada por un carácter nulo ('\0'). Los caracteres en una cadena pueden ser letras, números, símbolos u otros caracteres especiales. Las cadenas en C son representadas como arrays de caracteres, donde cada carácter se almacena en un elemento del array y el carácter nulo ('\0') marca el final de la cadena. 

Declaración y asignación de cadenas:

```c
char miCadena[] = "Hola, mundo!";  //Longitud 13
char miCadena[12] = "Hola, mundo!";//No entra. Falta un espacio para el \0

```

```c
#include <stdio.h>

int main() {
    char miCadena[] = "Hola, mundo!";
    printf("%s\n", miCadena);
    return 0;
}
```

```c
#include <stdio.h>
#include <string.h>

int main() {
    char miCadena[] = "Hola, mundo!";
    int longitud = strlen(miCadena);
    printf("Longitud de la cadena: %d\n", longitud);
    return 0;
}
```

```c
#include <stdio.h>
#include <string.h>

int main() {
    char cadena1[] = "Hola";
    char cadena2[] = "Hola";

    if (strcmp(cadena1, cadena2) == 0) {
        printf("Las cadenas son iguales.\n");
    } else {
        printf("Las cadenas son diferentes.\n");
    }

    return 0;
}
```

## Ejercicio 1: Contar vocales
Escribe un programa en C que le pida al usuario ingresar una cadena de caracteres y luego cuente y muestre en pantalla el número de vocales (mayúsculas y minúsculas) presentes en la cadena. El programa debe ser sensible a mayúsculas y minúsculas.

## Ejercicio 2: Palíndromo
Crea un programa en C que determine si una palabra o frase ingresada por el usuario es un palíndromo o no. Un palíndromo es una palabra o frase que se lee igual de izquierda a derecha y de derecha a izquierda, ignorando espacios y signos de puntuación. El programa debe eliminar los espacios y considerar solo las letras en la verificación.

# Ejercicios C parámetros 

argumentos pasados en la línea de comandos. Cada elemento del array apunta a una cadena que contiene un argumento. El primer elemento (argv[0]) siempre es una cadena que contiene el nombre del programa en sí, y los argumentos adicionales se almacenan en los elementos subsiguientes (argv[1], argv[2], etc.).

A continuación, te muestro un ejemplo de cómo se utilizan argc y argv en la función main():

```c
#include <stdio.h>

int main(int argc, char *argv[]) {
    // El primer argumento (argv[0]) es el nombre del programa
    printf("Nombre del programa: %s\n", argv[0]);

    // Verificar si se proporcionaron argumentos adicionales
    if (argc > 1) {
        printf("Argumentos adicionales:\n");
        // Recorrer los argumentos adicionales y mostrarlos
        for (int i = 1; i < argc; i++) {
            printf("Argumento %d: %s\n", i, argv[i]);
        }
    } else {
        printf("No se proporcionaron argumentos adicionales.\n");
    }

    return 0;
}
```

En este ejemplo, argc contendrá el número total de argumentos (incluyendo el nombre del programa) y argv será un array de punteros a las cadenas que representan esos argumentos. Puedes acceder a los argumentos individuales utilizando los índices en argv. Si no se proporcionan argumentos adicionales, el programa mostrará un mensaje indicando que no se proporcionaron argumentos adicionales.

## Ejercicio Calculadora simple

Crea un programa que permita hacer lo siguiente: primer parámetro operación suma, resta, multiplicación o división. Si es división el segundo operador no puede ser 0.

Ten en cuenta que necesita al menos 3 parámetros, de lo contrario deberá aparecer un mensaje de error.

```bash

$ calcula suma 3 4
7

```

# Ejercicios C ficheros

El manejo de ficheros en C es una parte importante de la programación, ya que permite a los programas interactuar con archivos en el sistema de archivos. Aquí te presento los conceptos básicos relacionados con el manejo de ficheros en C:

Puntero a archivo (FILE*): En C, se utiliza el tipo FILE* para declarar punteros a archivos. Estos punteros se utilizan para abrir, leer, escribir y manipular archivos. Debes incluir la biblioteca <stdio.h> para trabajar con archivos.

Apertura de archivos: Para abrir un archivo, se utiliza la función fopen(). Puedes abrir archivos en modo lectura ("r"), escritura ("w"), apertura para añadir datos ("a"), etc. Por ejemplo:

```c
FILE* archivo;
archivo = fopen("archivo.txt", "r");
if (archivo == NULL) {
    perror("No se pudo abrir el archivo");
    return 1;
}
```

Lectura y escritura de archivos: Para leer desde un archivo, puedes utilizar las funciones fread() o fgets(). Para escribir en un archivo, se usa fwrite() o fprintf(). Ejemplo de lectura y escritura:

```c
char buffer[100];
// Leer una línea del archivo
fgets(buffer, sizeof(buffer), archivo);
// Escribir en el archivo
fprintf(archivo, "Datos a escribir en el archivo\n");
```

Cierre de archivos: Siempre es importante cerrar los archivos después de trabajar con ellos para liberar recursos. Usa la función fclose():

```c
fclose(archivo);
```

Comprobación de errores: Es fundamental verificar si las operaciones de apertura, lectura o escritura de archivos tienen éxito. Puedes hacerlo comprobando si el puntero al archivo es NULL o utilizando la función ferror().
```c
if (archivo == NULL) {
    perror("No se pudo abrir el archivo");
    return 1;
}
```


Manejo de archivos binarios y de texto: Puedes trabajar tanto con archivos de texto como con archivos binarios. Los archivos de texto almacenan datos legibles por humanos, mientras que los archivos binarios almacenan datos en su forma cruda. El modo de apertura ("r", "rb", "w", "wb", etc.) determina si el archivo se maneja como texto o binario.

## Ejemplo de texto

```c
#include <stdio.h>

int main() {
    // Abrir el archivo en modo escritura de texto
    FILE* archivo = fopen("datos.txt", "w");

    // Comprobar si se pudo abrir el archivo
    if (archivo == NULL) {
        perror("No se pudo abrir el archivo");
        return 1;
    }

    // Escribir líneas de texto en el archivo
    fprintf(archivo, "Hola, mundo!\n");
    fprintf(archivo, "Este es un archivo de texto.\n");

    // Cerrar el archivo
    fclose(archivo);

    // Abrir el archivo en modo lectura de texto
    archivo = fopen("datos.txt", "r");

    // Comprobar si se pudo abrir el archivo
    if (archivo == NULL) {
        perror("No se pudo abrir el archivo");
        return 1;
    }

    // Leer y mostrar las líneas de texto desde el archivo
    printf("Leyendo el archivo de texto:\n");
    char linea[100];
    while (fgets(linea, sizeof(linea), archivo) != NULL) {
        printf("%s", linea);
    }

    // Cerrar el archivo
    fclose(archivo);

    return 0;
}
```

## Ejemplo binario

```c
#include <stdio.h>
#include <stdlib.h>

struct Registro {
    int numero;
    char nombre[50];
};

int main() {
    // Declarar una estructura para almacenar datos
    struct Registro datos;

    // Abrir el archivo en modo escritura binaria
    FILE* archivo = fopen("datos.bin", "wb");

    // Comprobar si se pudo abrir el archivo
    if (archivo == NULL) {
        perror("No se pudo abrir el archivo");
        return 1;
    }

    // Escribir datos en el archivo
    datos.numero = 1;
    strcpy(datos.nombre, "Ejemplo 1");
    fwrite(&datos, sizeof(struct Registro), 1, archivo);

    datos.numero = 2;
    strcpy(datos.nombre, "Ejemplo 2");
    fwrite(&datos, sizeof(struct Registro), 1, archivo);

    // Cerrar el archivo
    fclose(archivo);

    // Abrir el archivo en modo lectura binaria
    archivo = fopen("datos.bin", "rb");

    // Comprobar si se pudo abrir el archivo
    if (archivo == NULL) {
        perror("No se pudo abrir el archivo");
        return 1;
    }

    // Leer datos desde el archivo
    printf("Leyendo datos del archivo:\n");
    while (fread(&datos, sizeof(struct Registro), 1, archivo) == 1) {
        printf("Número: %d, Nombre: %s\n", datos.numero, datos.nombre);
    }

    // Cerrar el archivo
    fclose(archivo);

    return 0;
}
```