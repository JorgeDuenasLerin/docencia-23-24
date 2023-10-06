# PHP-form-teaching
Cómo se procesan formularios


## Elementos

Validación
- cliente
- servidor

¿Qué validar?
- Información requerida
- Formato correcto
- Campos de confirmación (ejemplo: password y reescribir password)
- Datos relacionados (ejemplo: fecha de vuelta posterior a fecha ida)

¿Qué hacer con los datos?
- No perder información!! Ninguna!!!
- Dar información sobre los problemas encontrados

Buenas prácticas
- Indicar ayudas sobre la información (texto o tooltip cuando estés encima)
- Expresiones regulares para formato

Otros
- Captcha


## Pseudocódigo de procesar peticiones

En la misma página
```
    if the user submited the form
        if there are form errors
            fill errors array
        else
            record data to database
            302 regirect, as it required by HTTP standard
            exit
    if we have some errors
        display errors
        fill form field values
    display the form
```


## En qué página procesar la información

Para formularios sencillos lo mejor es poner la lógica de procesado en la misma
página según avancemos en la asignatura veremos otras posibles configuraciones.

Por ejemplo, el proceso de autetificación a través de varios medios es muy
complejo y lo mejor es centralizar el proceso en un punto.

## Orden

- Análisis del protocolo
- Ejemplos de procesado de PHP
- Práctica Guiada
    - Dos tipo de valores
    - Mostrar errores
    - Guardar información en ficheros
    - Sacar listado
- Práctica mini proyecto