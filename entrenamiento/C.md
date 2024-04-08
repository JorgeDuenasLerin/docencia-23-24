Ejercicio. C. Sincronización de Eventos con Señales

En este ejercicio, vamos a trabajar con un proceso padre y dos procesos hijos.

El padre recibe como parámetro un número n, este número indica la cantidad de número aleatorios que generarán.

Cada hijo genera esos n números (Esa información ya la tienen los hijos), cada proceso hijo se encarga de buscar dos números de esos aleatorios que cuando se sumen den como resultado un número primo.

En cuanto un hijo encuentre un primo le manda una señal al padre hijo1 USR1, hijo2 USR2.

Uno hijo puede que encuentre un número primo o no.

El padre espera a que terminen los procesos y escribe quién ha encontrado el primer primo, quién el segundo o si no han encontrado ninguno.