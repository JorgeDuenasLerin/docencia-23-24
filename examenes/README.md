# Información sobre la entrega

En los exámenes se evalúan contenidos específicos de un módulo en concreto. Cada ejercicio debe ser hecho con las técnicas **requeridas** y **descritas** en el enunciado, en caso contrario el ejercicio será puntuado con **0 puntos**.

## Ejemplos

### PSP
Ejemplo: Escribe un programa que cree un proceso hijo con fork, el hijo escribirá “Hola mundo” y el padre esperará a que finalice el proceso hijo.
Entrega: El alumno entrega un programa que escribe “Hola mundo” (Similar al que se hace el primer día de clase de programación).
Resultado: **0 puntos**.

### PMDM
Ejemplo: La segunda actividad realiza una petición al API y muestra un listado de elementos.
Entrega: Una actividad que muestra unos elementos escritos con código.
Resultado: **0 puntos**.

### DWES
Ejemplo: Crea un formulario que procese datos del usuario y cuando estén completos lo introduzca en una base de datos..
Entrega: Un PHP que hace un insert.
Resultado: **0 puntos**.

### DAW
Ejemplo: Crea una documentación mkdocs, cre un espacio virtual en el servidor y súbela por scp o filezilla
Entrega: Una página generada en local con mkdocs
Resultado: **0 puntos**.

## Entregas

La entrega se realizará en un fichero tar.gz, zip o rar con una carpeta con el nombre del alumno y todos los ejercicios requeridos en el enunciado. El nombre del fichero será ```apellido1apellido2nombre``` utiliza solo caracteres ASCII.

Ejemplo de entrega de la alumna ``Ana Garcia Pérez```

Nombre del fichero: ```garciaperezana.tar.gz```

Contenido descomprimido:

```txt
GarciaPerezAna/
            \- ejercicio1
            \- ejercicio2
            \- ejercicio3
            \- ejercicio4
```

En el caso de Android o Java, cada ejercicio estará en un paquete.

El incumplimiento de este formato tendrá penalización de **0.5 puntos**.

Formato d entrega:
- Se habilitará en el aula virtual una tarea para la entrega del examen.
- La entrega constará de un único fichero comprimido con el nombre del alumno.
- El alumno deberá graba la realización del examen con OBS, custodiar la grabación y subirla a compartidos.


## Formación profesional

Todos los ejercicios entregados, todo el código entregado, todas las aplicaciones desplegadas tienen que funcionar correctamente. Si un alumno/a no consigue hacer funcionar su propio código o entrega soluciones con errores de compilación el ejercicio será corregido con una calificación de **0 puntos**.

### Puntos en ejercicio

En la medida de los posible se harán ejercicios independientes, de tal forma que el bloqueo en un ejercicio no impida la realización de otro pero los puntos dentro de un mismo ejercicio están relacionados. Es decir, si el ejercicio pide intercambiar información entre páginas o actividades y al final mostrar un resultado, el hecho de mostrar un resultado no dará puntos si no se han conseguido los puntos anteriores.

### Recursos

Puedes utilizar todo el código y material que consideres oportuno.

Esta prohibido el acceso a Internet y a Inteligencia Artificial.

En caso de copia, intento, o acceso a documentación no permitida, conllevará una calificación en la prueba de suspenso más su correspondiente sanción.

Para poder puntuar en algún ejercicio, será requisito indispensable que compile y ejecute sin ningún


### Buenas prácticas

Penalizaciones:
- Cada línea de código con mala sangría o sangría inconsistente **restará 0.1 punto**.
- Cada línea de configuración con mala sangría o sangría inconsistente **restará 0.1 punto**.
- Cada número mágico o información constante dentro del código que pueda ser modificado en el futuro y que no esté almacenada en una constante **restará 0.1 puntos**.
- Los valores constantes deben ser CONSTANTES (escritas con nombre mayúsculas), si no es así **restará 0.1 punto**
- Cada incumplimiento de reglas de estilo del lenguaje de programación tendrá una **penalización de 0.1 puntos**.
    - Java: Clases en mayúsuculas o PascalCase, métodos y variables camelCase
    - Python: Clases en mayúsuclas o PascalCase, métodos y variables snake_case

Fallos:
- Cada fallo que ocurre en la aplicación por situaciones no contempladas que la hagan cerrarse de forma inesperada, produzca un error 500 o sea un fallo de seguridad **restará 0.5 puntos**