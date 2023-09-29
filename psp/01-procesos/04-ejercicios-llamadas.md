# Ejercicios fork

Creación de un proceso hijo: Escribe un programa en C que utilice fork() para crear un proceso hijo. El proceso hijo debe imprimir un mensaje como "Soy el proceso hijo" y el proceso padre debe imprimir "Soy el proceso padre". Asegúrate de que ambos procesos se ejecuten correctamente y muestren su respectivo mensaje.

Ejecución de un programa en el proceso hijo: Modifica el programa anterior para que, en lugar de imprimir un mensaje, el proceso hijo ejecute un programa diferente utilizando exec(). Por ejemplo, el proceso hijo podría ejecutar un programa que muestra la fecha y hora actual. Asegúrate de que el proceso padre todavía imprima su mensaje después de que el proceso hijo termine.

Espera a que el proceso hijo termine: Crea un programa que utiliza fork() para crear un proceso hijo. Luego, el proceso padre debe esperar a que el proceso hijo termine antes de imprimir un mensaje final. Utiliza wait() o waitpid() para lograr esta espera.

Creación de múltiples procesos hijos: Modifica el programa para que el proceso padre cree varios procesos hijos en lugar de uno solo. Cada proceso hijo debe realizar una tarea diferente o imprimir un mensaje único. Asegúrate de que el proceso padre espere a que todos los hijos terminen antes de finalizar.

Uso de valores de retorno: Modifica el programa para que cada proceso hijo devuelva un valor de salida diferente utilizando exit(). El proceso padre debe recoger estos valores de salida utilizando wait() o waitpid() y mostrarlos en su salida.

# Comunicación de procesos

TODO: pipes y dup