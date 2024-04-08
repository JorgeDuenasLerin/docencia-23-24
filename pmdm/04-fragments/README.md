# Fragments

Qué os pasa:

- Elemento de la UI complejos
- Un fragmento siempre debe estar alojado en una actividad y el ciclo de vida del fragmento se ve afectado directamente por el ciclo de vida de la actividad anfitriona.

![Fragments](https://developer.android.com/static/images/fundamentals/fragments.png?hl=es-419)

## Ciclos de vida

Actividad

![Actividad]https://developer.android.com/guide/components/images/activity_lifecycle.png?hl=es-419

Fragmento

![Fragmento](https://developer.android.com/static/images/fragment_lifecycle.png?hl=es-419)

## ¿Cómo agregar un fragmento?

```<fragment>```, o desde el código de tu aplicación agregándolo a un archivo existente ```ViewGroup```.

## Tareas

### 01 Contador

Crea un fragmento que permita añadir ```|``` a un text view. Cada vez que se pulsa pone un palo más

Crea una actividad que te ayude a ser mejor persona y tenga 3 veces el fragmento anterior. Uno para contar las veces que no has fumado, otro para contar las veces que no has insultado a tu compañero, otro para contar las veces no has... Cualquier cosa, es solo una excusa para utilizar un fragment simple.


### 02 Configura monstruo

Recupera la idea del monstruo de la unidad anterior. Crea un Fragment que te permita recopilar la información de 1 monstruo. Crea un actividad que te permita crear 4 monstruos.


### 03 Contador de punto

Crea un fragment que te permita hacer el seguimiento de un partido de pinpon. Cuando se llegue a la putuación máxima se deshabilitarán los botones y remarcará el equipo que ha ganado.

Crea una actividad para seguir 4 partidos a la vez.


## Comunicación

De la actividad al fragmento
```
fragment.<specific_function_name>();
```

Del fragmento a la actividad (con eventos):

[https://developer.android.com/training/basics/fragments/communicating?hl=es-419](https://developer.android.com/training/basics/fragments/communicating?hl=es-419)

