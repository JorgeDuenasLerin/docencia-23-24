# Ejercicios C


Calculadora de Suma Simple

Enunciado: Crea un programa que solicite al usuario ingresar dos números enteros y muestre la suma de esos números en pantalla.

Posibles Soluciones:
a. Utiliza la función scanf de la biblioteca <stdio.h> para leer los números y luego suma los valores.
b. Usa la función fgets para leer las entradas como cadenas y luego convierte las cadenas a enteros utilizando atoi de la biblioteca <stdlib.h>.
c. Utiliza la función getchar para leer caracteres y calcula la suma acumulativa hasta que se ingrese un carácter especial, como 'q' para salir.

Conversión de Grados Celsius a Fahrenheit

Enunciado: Escribe un programa que permita al usuario ingresar una temperatura en grados Celsius y lo convierta a grados Fahrenheit utilizando la fórmula: Fahrenheit = (Celsius * 9/5) + 32.

Posibles Soluciones:
a. Usa scanf para leer la temperatura en grados Celsius, luego aplica la fórmula y muestra el resultado.
b. Utiliza la función fgets para leer la entrada como cadena, conviértela a flotante con atof y realiza la conversión.
c. Crea una tabla de conversión previamente definida y busca la temperatura en grados Fahrenheit correspondiente en la tabla.

Números Primos

Enunciado: Crea un programa que solicite al usuario ingresar un número entero positivo y determine si es un número primo o no.

Posibles Soluciones:
a. Utiliza un bucle for para verificar si el número es divisible por algún número entre 2 y la raíz cuadrada del número.
b. Implementa una función que verifique la primalidad y llámala desde el programa principal.
c. Utiliza la criba de Eratóstenes para generar una lista de números primos y verifica si el número dado está en la lista.

Cálculo de Factorial

Enunciado: Desarrolla un programa que permita al usuario ingresar un número entero no negativo y calcule su factorial. Asegúrate de manejar adecuadamente los casos de entrada inválida.

Posibles Soluciones:
a. Utiliza un bucle for para calcular el factorial.
b. Implementa una función recursiva para calcular el factorial.
c. Utiliza una matriz de factoriales precalculados para los números del 0 al N y busca el valor en la matriz.

Suma de una Serie

Enunciado: Escribe un programa que calcule la suma de los primeros N términos de la serie armónica inversa (1 + 1/2 + 1/3 + ... + 1/N) para un valor de N ingresado por el usuario.

Posibles Soluciones:
a. Utiliza un bucle for para sumar los términos de la serie hasta N.
b. Implementa un bucle while y sigue sumando términos hasta que la suma sea lo suficientemente cercana a un valor específico.
c. Utiliza una fórmula matemática para calcular directamente la suma de la serie armónica.

Cálculo de Potencia

Enunciado: Crea un programa que solicite al usuario ingresar una base y un exponente (ambos enteros) y calcule la potencia correspondiente.

Posibles Soluciones:
a. Utiliza un bucle for para calcular la potencia iterativamente.
b. Implementa una función recursiva para calcular la potencia.
c. Utiliza la función pow de la biblioteca <math.h> para calcular la potencia.

Cálculo del Área de un Triángulo

Enunciado: Diseña un programa que tome como entrada la longitud de la base y la altura de un triángulo y calcule su área. Asegúrate de validar que la base y la altura sean valores positivos.

Posibles Soluciones:
a. Utiliza scanf para leer la base y la altura, luego calcula el área utilizando la fórmula del área de un triángulo.
b. Implementa una función que calcule el área del triángulo y llámala desde el programa principal.
c. Utiliza fgets para leer la entrada como cadenas, convierte las cadenas en números y realiza la verificación de entrada válida antes del cálculo.

Suma de Números Pares

Enunciado: Escribe un programa que sume los primeros N números pares positivos. El valor de N debe ser ingresado por el usuario.

Posibles Soluciones:
a. Utiliza un bucle for para iterar a través de los números pares y acumular la suma hasta alcanzar N.
b. Implementa un bucle while que continúa sumando números pares hasta que la suma alcance o supere N.
c. Calcula la suma de los números pares utilizando una fórmula matemática directa y redondea el resultado si es necesario.

Cálculo del Mínimo Común Múltiplo (MCM)

Enunciado: Desarrolla un programa que solicite al usuario ingresar dos números enteros y determine su Mínimo Común Múltiplo (MCM).

Posibles Soluciones:
a. Implementa una función que calcule el MCM utilizando el algoritmo de Euclides para encontrar el MCD (Máximo Común Divisor).
b. Utiliza un bucle while para calcular el MCM iterativamente a partir de los números ingresados.
c. Utiliza la función lcm de la biblioteca <math.h> para calcular el MCM.

Cifrado César

Enunciado: Crea un programa que permita al usuario ingresar una cadena de texto y un valor de desplazamiento. Luego, cifra la cadena utilizando el cifrado César y muestra el resultado. Asegúrate de manejar mayúsculas, minúsculas y caracteres especiales.

Posibles Soluciones:
a. Utiliza bucles y condicionales para cifrar cada carácter de la cadena según el desplazamiento ingresado.
b. Implementa una función que realice el cifrado César y llámala desde el programa principal.
c. Utiliza la función strcat de la biblioteca <string.h> para concatenar caracteres cifrados a una nueva cadena mientras recorres la entrada original.