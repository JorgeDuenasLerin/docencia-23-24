# Análisis del protocolo

Es importante saber cómo funciona el protocolo y cómo se intercambia
información entre el navegador y el servidor para ser un buen desarrollador
web.

Para hacer este análisis vamos a utilizar netcat y nuestro servidor

Tareas:

1. Formulario con GET enviado a netcat
2. Formulario con POST enviado a netcat
3. Petición AJAX enviada con GET a netcat
4. Petición AJAX enviada con POST a netcat


## Cuándo se incluye el JS

Traducción de un post de [stackoverflow](https://stackoverflow.com/questions/436411/where-should-i-put-script-tags-in-html-markup)

¿Qué ocurre cuando un navegador procesa un tag <script>?
1. Obtiene el HTML de la página
2. Comienza a procesar el HTML
3. Encuentra una etiqueta script externa
4. Obtiene el script. El procesador de HTML se bloquea
5. Ejecuta el script
6. Continua procesando el HTML

Paso 4 puede ocasionar una mala experiencia de usuario. Tu página web
se bloqueará hasta que haya descargado todos los scripts.

https://caniuse.com/#search=async