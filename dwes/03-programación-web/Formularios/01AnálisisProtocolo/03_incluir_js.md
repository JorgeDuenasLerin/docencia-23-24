Traducción de un post de stackoverflow:
https://stackoverflow.com/questions/436411/where-should-i-put-script-tags-in-html-markup

¿Qué ocurre cuando un navegador procesa un tag <script>?
1.- Obtiene el HTML de la página
2.- Comienza a procesar el HTML
3.- Encuentra una etiqueta script externa
4.- Obtiene el script. El procesador de HTML se bloquea
5.- Ejecuta el script
6.- Continua procesando el HTML

Paso 4 puede ocsasionar una mala expericnia de ususario. Tu página web
se bloqueará hasta que haya descargado todos los scripts.

https://caniuse.com/#search=async
