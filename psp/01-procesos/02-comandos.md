# Comandos procesos

ps: Muestra información sobre los procesos en ejecución, incluyendo su identificador (PID), estado y recursos utilizados.

top: Proporciona una visión en tiempo real de los procesos que consumen más recursos en el sistema.

htop: Ofrece una versión mejorada de "top" con una interfaz más amigable y opciones de personalización.

kill: Permite enviar señales a los procesos para detenerlos o controlar su comportamiento. El uso común es kill -9 PID para terminar un proceso de manera forzada.

pgrep: Encuentra procesos basados en sus nombres o criterios y muestra sus PID.

pkill: Envía señales a procesos basados en sus nombres o criterios de búsqueda.

killall: Detiene procesos según su nombre, lo que puede ser útil para detener aplicaciones específicas.

ps aux: Muestra una lista completa de todos los procesos en ejecución con detalles extensos.

nice y renice: Permiten ajustar la prioridad de ejecución de un proceso para controlar su asignación de recursos.

jobs: Muestra los trabajos en segundo plano en el shell actual.

bg y fg: Controlan procesos en segundo plano y en primer plano en el shell.

nohup: Ejecuta un comando de forma que continúe ejecutándose incluso después de cerrar la sesión o terminal.

at: Programa la ejecución de comandos en un momento específico en el futuro.

cron: Programador de tareas que permite ejecutar comandos de forma automática en momentos predefinidos.

systemctl: Controla servicios y unidades del sistema en sistemas basados en systemd, que es común en muchas distribuciones modernas de Linux.

## Ejercicios

Comando ps:

Listar procesos por usuario: Utiliza el comando ps para mostrar todos los procesos pertenecientes a un usuario específico en tu sistema. Por ejemplo, muestra todos los procesos del usuario "juan".

Mostrar los procesos de mayor consumo de CPU: Utiliza el comando ps junto con las opciones adecuadas para mostrar una lista de los 5 procesos que están utilizando más recursos de CPU en tu sistema en este momento.

Comando top:

Ordenar procesos por consumo de memoria: Abre top y cambia la ordenación de la lista de procesos para mostrar los procesos que consumen más memoria RAM en la parte superior.

Actualizar la vista en tiempo real: Mientras top esté en ejecución, realiza una actualización en tiempo real de la lista de procesos presionando la tecla "R".

Comando htop:

Filtrar procesos por usuario: Abre htop y filtra la lista de procesos para mostrar solo los procesos pertenecientes a un usuario específico.

Cambiar la prioridad de un proceso: Desde htop, selecciona un proceso en ejecución y cambia su prioridad de ejecución.

Comando kill:

Terminar un proceso por nombre: Encuentra un proceso en ejecución en tu sistema por su nombre (por ejemplo, un navegador web) utilizando el comando ps o pgrep, y luego utiliza el comando kill para detenerlo de manera segura.

Forzar la terminación de un proceso: Inicia un proceso en segundo plano (por ejemplo, sleep 300 &), y luego utiliza el comando kill con la opción -9 para forzar su terminación.

Comando pgrep:

Buscar procesos por nombre exacto: Utiliza pgrep para encontrar todos los procesos que tengan un nombre de proceso específico, como "apache2".

Buscar procesos por nombre de usuario: Utiliza pgrep para encontrar todos los procesos asociados a un usuario específico en tu sistema.

Y así sucesivamente para los otros comandos mencionados en la lista. Cada ejercicio te ayudará a familiarizarte y practicar con la gestión de procesos en Linux utilizando estos comandos.

Comando pkill:

Detener todos los procesos de una aplicación: Utiliza pkill para detener todos los procesos relacionados con una aplicación específica, como "firefox" o "chrome".

Enviar una señal personalizada: Utiliza pkill con la opción adecuada para enviar una señal personalizada a todos los procesos con un cierto nombre, por ejemplo, enviar la señal SIGUSR1 a todos los procesos llamados "myapp".

Comando killall:

Detener todos los procesos de una aplicación: Utiliza killall para detener todos los procesos relacionados con una aplicación específica, como "apache2" o "mysql".

Detener procesos por nombre de usuario: Utiliza killall para detener todos los procesos pertenecientes a un usuario específico en tu sistema.

Comando ps aux:

Mostrar todos los procesos de un usuario: Utiliza ps aux para mostrar todos los procesos de un usuario particular en el sistema.

Buscar un proceso específico: Utiliza ps aux | grep proceso para buscar un proceso específico por su nombre o descripción en la lista de procesos.

Comando nice y renice:

Cambiar la prioridad de un proceso existente: Utiliza renice para cambiar la prioridad de ejecución de un proceso en ejecución. Aumenta o disminuye su valor de prioridad y observa cómo afecta su uso de CPU.

Iniciar un proceso con una prioridad específica: Utiliza nice para iniciar un proceso con una prioridad de ejecución diferente a la predeterminada.

Comando jobs:

Ejecutar un proceso en segundo plano: Inicia un proceso en segundo plano en tu terminal y utilice el comando jobs para listar los trabajos en segundo plano.

Traer un trabajo a primer plano: Utiliza el comando fg para traer un trabajo en segundo plano al primer plano y observa cómo puedes interactuar con él.

Comandos bg y fg:

Colocar un proceso en segundo plano: Ejecuta un proceso en primer plano y utiliza bg para moverlo a segundo plano.

Traer un proceso en segundo plano al primer plano: Usa fg para traer un proceso en segundo plano al primer plano para interactuar con él.

Comando nohup:

Ejecutar un proceso que persista después del cierre de la terminal: Utiliza nohup para iniciar un proceso que continúe funcionando incluso después de cerrar la sesión de tu terminal.

Verificar el archivo de salida de nohup: Ejecuta un comando con nohup y verifica el archivo de salida (nohup.out) para asegurarte de que los resultados se almacenan.

Comando at:

Programar la ejecución de un comando en el futuro: Utiliza el comando at para programar la ejecución de un comando o script en un momento específico en el futuro.

Listar tareas programadas con at: Utiliza atq para mostrar una lista de las tareas programadas con el comando at y sus horas de ejecución.

Comando cron:

Crear una tarea periódica con cron: Crea una entrada en el archivo crontab para ejecutar un comando o script de forma periódica, como cada día a las 3:00 PM.

Editar y actualizar una tarea de cron: Edita una tarea existente en tu archivo crontab y luego utiliza crontab -e para actualizar el archivo y aplicar los cambios.

Comando systemctl:

Iniciar un servicio con systemctl: Utiliza systemctl para iniciar un servicio en tu sistema, por ejemplo, el servidor web Apache.

Detener y reiniciar un servicio con systemctl: Detén y reinicia un servicio específico en tu sistema utilizando systemctl, como el servicio de bases de datos MySQL.