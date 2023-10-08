# Monoactividad

Uso de controles: recoger información del usuario

## Tipos

[Fuente](https://www.tutorialspoint.com/android/android_user_interface_controls.htm)

![Controles](https://www.tutorialspoint.com/android/images/ui_control.jpg)

UI Control & Description
1.	TextView
This control is used to display text to the user.

2.	EditText
EditText is a predefined subclass of TextView that includes rich editing capabilities.

3.	AutoCompleteTextView
The AutoCompleteTextView is a view that is similar to EditText, except that it shows a list of completion suggestions automatically while the user is typing.

4.	Button
A push-button that can be pressed, or clicked, by the user to perform an action.

5.	ImageButton
An ImageButton is an AbsoluteLayout which enables you to specify the exact location of its children. This shows a button with an image (instead of text) that can be pressed or clicked by the user.

6.	CheckBox
An on/off switch that can be toggled by the user. You should use check box when presenting users with a group of selectable options that are not mutually exclusive.

7.	ToggleButton
An on/off button with a light indicator.

8.	RadioButton
The RadioButton has two states: either checked or unchecked.

9.	RadioGroup
A RadioGroup is used to group together one or more RadioButtons.

10.	ProgressBar
The ProgressBar view provides visual feedback about some ongoing tasks, such as when you are performing a task in the background.

11.	Spinner
A drop-down list that allows users to select one value from a set.

12.	TimePicker
The TimePicker view enables users to select a time of the day, in either 24-hour mode or AM/PM mode.

13.	DatePicker
The DatePicker view enables users to select a date of the day.


## Tareas

1. Crea una App con el juego adivina el número. Tendrá un botón de reiniciar y un botón de jugar. El programa eligirá un número entre 1 y N, tendrás log2(N)-1 intentos. Si ganas el programa mostrará un mensaje en verde has ganado. Si pierdes en rojo indicando que has perdido.
    1. Solución de Ricardo -> [Java](https://github.com/ricardoharrison/DAM2V/blob/main/PMDM/ProyectosAndroidStudio/GuessIt/app/src/main/java/com/rittz/guessit/MainActivity.java) | [Layout](https://github.com/ricardoharrison/DAM2V/blob/main/PMDM/ProyectosAndroidStudio/GuessIt/app/src/main/res/layout/activity_main.xml)

2. Crea una app para poner nombre a colores. La aplicación tendrá:
    1. Una caja para poner el nombre
    2. 3 barras para indicar el tono de R, G, B
    3. Un check texto blanco, por defecto marcado
    3. Un botón para mostrar.
    4. Un texto de salida. Al dar al botón generar el color de fondo del texto de establecerá al color seleccionado. El texto será el nombre establecido para ese color. El color del texto será blanco si el check está marcado, en caso contrario será negro.
    5. Soluciones:
        1. Solucion de Chen: [Java](https://github.com/Xing2707/PMDM/blob/master/app/src/main/java/com/example/pmdm/ut02/u2e2NombreColo.java) [Layout](https://github.com/Xing2707/PMDM/blob/master/app/src/main/res/layout/activity_u2e2_nombre_colo.xml)

3. 1 Manejardor para controlarlos a todos. Propinatron2000
    1. Crea un PAD numérico con botones y los valores del 0 al 9 y un botón borrar 1 número.
    2. Un label donde mostrar el número que se va acumulando.
    2. Crea un radio button para indicar si el trato ha sido malo, bueno o excelnte
    3. Crea un botón de calcular propina: malo será el precio indicado con los números
    4. Soluciones
       1. Solucion de Ian: [Java](https://github.com/ianharrisonromero/DAM2Eloy/blob/main/PMDM%20Programaci%C3%B3n%20Multimedia%20y%20Dispositivos%20Moviles/AndroidStudioProjects/Propineitor9000/app/src/main/java/com/example/propineitor9000/MainActivity.java) / [Layout](https://github.com/ianharrisonromero/DAM2Eloy/blob/main/PMDM%20Programaci%C3%B3n%20Multimedia%20y%20Dispositivos%20Moviles/AndroidStudioProjects/Propineitor9000/app/src/main/res/layout/activity_main.xml)
4. Modifica el propinatron2000 para que tenga una imagen de cabecera. 

5. Pedir cita
    1. Necesitamos obtener la hora y la fecha en la que un paciente quiere una cita.
    2. Poner que la clínica abre l-v de 9:00 a 14:00
    3. El cliente debe introducir un DNI válido.
    4. Cuando el cliente haya introducido los datos poner una imagen de un "check" o un refuerzo positivo, "su cita se ha guardado satisfactoriamente" y ocultar el resto de controles.
    5. NOTA: En el futuro esto será otra actividad.

6. PedirCita (La semi realidad)
    1. Introducción de TOAST.
    2. Quién me enseñe aplicaciones con esto estará suspenso.
    3. Lo Toast no se usan para dar mensajes al usuario cuando tenemos acceso a la UI.
    4. Quién me enseñe aplicaciones con esto estará suspenso.
    5. Quién me enseñe aplicaciones con esto estará suspenso.
    6. Cuando el tiempo de la cita sea erróneo o el DNI no válido mostrará un Toast con el error.
    7. Último punto, importante: Quién me enseñe aplicaciones con esto estará suspenso.

7. PedirCita real! Lo mejor para aprobar.
    1. Establece controles gráficos en la actividad para mostrar al usuarios lo errores en los campos.
    2. Bonustrack: Haz que cuando el usuario se equivoque el móvil vibre.
    3. Despliega la app en tu dispositivo. Necesitas cable USB.

## Reflexión final.

Dos preguntas:
- ¿Cuál es la diferencia entre usar un Toast y mostrar en la actividad los errores?
- ¿Cuántos días hay entre la convocatoria ordinaria de marzo y la extraordinaria de junio?
