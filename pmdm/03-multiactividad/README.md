# Multiactividad

## Casos

Casos posibles:

- Actividad lanza otra actividad
- Actividad lanza otra actividad con información
- Actividad lanza otra actividad para recoger resultados
- Actividad lanza otra actividad con información para recoger un resultado

## Tareas

### 01 Calentamiento

Haz una actividad que al pulsar un botón lanza otra actividad en la que aparezca "Hola mundo". La segunda actividad tendrá un botón para cerrarse.

### 02 Calculadora

La actividad1 tendrá dos edit text que representan números. También tendrá un radio button que representará una operación +, -, *, /. Tendrá también un botón calcular. Si hay algún error en los datos mostrará un mensaje de error con un dialog. El botón calcular enviará toda la información a la actividad2, hará el cálculo y lo mostrará.

### 03 Heladería

La actividad recogerá datos de una configuración de helados, la actividad1 tendrá los siguientes controles:

- Vainilla y un EditText númerico
- Chocolate y un EditText númerico
- Fresa y un EditText númerico
- Un Spinner con las opciones de recipiente: cucurucho, cucu. choco o tarrina
- Un botón generar

La actividad2 recogerá la información y pintará una O mayúscula amarilla por cada vainilla, una O marrón por cada chocolate, una O Rosa por cada fresa. Un ```\/``` marrón claro o marrón oscuro si el cucurucho es de chocolate o normal y una ```U``` si es tarrina. También tendrá un botón para finalizar la actividad.