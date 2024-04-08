# Ejercicio de examen

## Temario

Listado de conceptos:
- fork
- ficheros de texto, ficheros binarios
- redirecciones
- comunicación entre procesos pipes
- cálculo MD5, primos u otra función que lleve tiempo.

## Ejercicios

Entrenamiento:
1. Crea un proceso que cree un proceso hijo, el envíe 3 números enteros aleatorios a través de un pipe. El proceso hijo los ordenará y los escribirá en el fichero salida.txt.
2. Crea un proceso que cree dos procesos hijos, luego generará N (20) números aleatorios. Enviará los pares al primer hijo, los impares al segundo. Los hijos escribirán por pantalla "Soy el hijo 1|2, he recibido <n>". Por cada número que mande el padre.
3. Crea un programa que reciba por parámetro un número entero positivo n. Este número indicará el número de hijos. Cada hijo generará un fichero con la posibles combinación de caracteres de esa longitud. El hijo 1 una letra, el hijo 2 dos letras 'aa' a la 'zz', etc. Los nombres serán datos1.txt, datos2.txt, etc.
4. Crea un programa que reciba un número n por parámetro. El programa creará n hijos y les enviará una señal a cada uno de ellos para matarlos.
5. Crea un proceso que sea capaz de gestionar un señal definida por el usuario. Luego hará fork y el padre le enviará la señas al hijo. Al gestionar la señal el hijo escribirá "Recibido y terminará el proceso."
6. Crea un programa que cree un hijo y le mande a través de un pipe un carácter y dos números. El carácter representa una operación matemática: suma o resta. El proceso hijo devolverá en su estado el resultado de la operación.
7. Modifica el anterior programa para que el hijo devuelva el resultado a través de un pipe. NOTA: debes crear dos pipes.
8. Crea un programa c que describa las ips que tiene en ordenador en linux
9. Crea un programa c que describa las ips que tiene en ordenador en Windows.
10. Crea un programa Java que describa las ips que tiene en ordenador en linux
11. Crea un programa Java que describa las ips que tiene en ordenador en Windows.
12. Crea un programa en c que reciba un número n y un número m. El programa escribirá todos los números primos de la longitud n, utilizando m procesos.
13. Crea un programa que reciba por parámetro dos números grandes. El programa creará dos procesos hijos. Cada hijo gestionará un número primo y verificará si es primo o no. Cada hijo al finalizar indica en su estado si el número era primo o no y el proceso padre al recoger el estado del hijo cuenta si era primo o no, el padre escribe el total de números primos.

## Ejercicios de promociones anteriores.

### Con cariño de la promo DAM 2023-2024

Crea un programa de adivina el número con las siguientes características:

- El programa padre creará un proceso hijo. El cual será el que controle el número aleatorio.
- El proceso hijo generará un número aleatorio.
- El proceso hijo recibirá por un pipe números.
- El proceso hijo emitirá una SIGUSR1, SIGUSR2, SIGINT al proceso padre ```getppid```. Cuando el número sea mayor emitirá SIGUSR1, si es menor SIGUSR2 y si es el número SIGINT.
- El proceso hijo termina cuando recibe SIGINT.
- El programa padre pedirá números al usuario y los enviará por el pipe al hijo.
- Cuando el programa padre reciba la señal SIGINT será que el usuario ha acertado, mostrará un mensaje. Después el padre emitirá otra SIGINT al hijo para que finalice.

