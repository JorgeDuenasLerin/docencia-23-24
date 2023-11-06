# Multiactividad

## Casos

Casos posibles:

- Actividad lanza otra actividad
- Actividad lanza otra actividad con información
- Actividad lanza otra actividad para recoger resultados
- Actividad lanza otra actividad con información para recoger un resultado

### Para un resultado

La que lanza
```android
/* Sin lambdas
ActivityResultLauncher<Intent> someActivityResultLauncher = registerForActivityResult(
        new ActivityResultContracts.StartActivityForResult(),
        new ActivityResultCallback<ActivityResult>() {
            @Override
            public void onActivityResult(ActivityResult result) {
                if (result.getResultCode() == Activity.RESULT_OK) {
                    // Here, no request code
                    Intent data = result.getData();
                    resultado.setText(data.getStringExtra("DATOS"));
                }
            }
        }
);*/
ActivityResultLauncher<Intent> lanzadora = registerForActivityResult(
    new ActivityResultContracts.StartActivityForResult(), (result)->{
        if (result.getResultCode() == Activity.RESULT_OK) {
            // Here, no request code
            Intent data = result.getData();
            resultado.setText(data.getStringExtra("DATOS"));
        }
    }
);

lanzar.setOnClickListener(new View.OnClickListener() {
    @Override
    public void onClick(View view) {
        Intent intent = new Intent(ut02Lanzadora.this, ut02Calculadora.class);
        intent.putExtra("DATOS", datos.getText().toString());
        lanzadora.launch(intent);
    }
});
```

La que recibe
```android
boton.setOnClickListener(new View.OnClickListener() {
    @Override
    public void onClick(View view) {
        Intent data = new Intent();
        data.putExtra("DATOS", datos.toUpperCase());
        setResult(Activity.RESULT_OK, data);
        finish();
    }
});
```

### Lanzamiento implícito

No se especifica la actividad que lo resolverá, va implicito en el intento.

https://developer.android.com/guide/components/intents-common?hl=es-419#Phone

En siguientes temas utilizaremos permisos, esta es una versión que no requiere permisos.

Añade en el manifest:

```
<manifest xmlns:android="http://schemas.android.com/apk/res/android"
    xmlns:tools="http://schemas.android.com/tools">

    <queries>
        <intent>
            <action android:name="android.intent.action.DIAL" />
        </intent>
    </queries>

    ... resto de archivo ...
```

Ahora puede usar este código, el manifest indica que nuestra Aplicaión puede consultar ```intent.resolveActivity(getPackageManager())```.

```
public void dialPhoneNumber(String phoneNumber) {
    Intent intent = new Intent(Intent.ACTION_DIAL);
    intent.setData(Uri.parse("tel:" + "666666666"));
    if (intent.resolveActivity(getPackageManager()) != null) {
        startActivity(intent);
    } else {
        // TODO: Mostrar error!
    }
}
```

Busca cómo abrir un navegador con una web, reproducir un video u otros intent que no requieran permisos.


## Tareas Envío

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


## Tareas Recepción

### 04 Calentamiento

Tenemos una actividad que mostrará el nombre del usuario y al comienzo será "Anónimo". Esta actividad tendrá un TextView y un Button. Cuando se pulse el botón se lanzará una actividad para pedir el nombre, esta tendrá un EditText, un Button Aceptar, otro Cancelar y otro Limpiar, al pulsar cada botón la actividad de PedirNombre finalizará y devolverá a la otra el nombre, establecerá que se ha cancelado o establecerá que el usuario quiere limpiar el nombre anterior.

La actividad principal MostrarNombre recibirá la finalización y recibirá el nombre. Pueden pasar varias cosas: el usuario cambia de nombre, el usuario acepta el nombre, el usuario cancela volviendo atrás o el usuario decide limpiar la información. En cada caso a parte de actualizar el nombre se mostrará un mensaje en la UI de lo que ha hecho el usuario.

### 05 Fibonacci

Tendremos una actividad Principal que muestra dos TextView con los valores 1 y 1, un botón Siguiente. Al pulsar siguiente se abre otra actividad llamada SiguienteNumero que realiza y muestra la suma de estos dos número.

La actividad SiguienteNumero tiene un botón Aceptar que finaliza y devuelve la suma a la actividad anterior.

Al recoger la suma la actividad principal actualizará los valores, n1 será el antiguo n2 y n2 será el resultado de la suma.

El objetivo es ir sacando los números de la serie de Fibonacci.
Solución Dani:[java](https://github.com/dclamor/SolucionesPMDM/blob/main/Fibonacci/u3a5FibonacciA.java)[layout](https://github.com/dclamor/SolucionesPMDM/blob/7bbeb2745fce748400280d6bd27cb2319a03370d/Fibonacci/u3a5_fibonaccia.xml)

### 06 Análisis de letras texto

Tendremos una actividad que nos permite introducir un texto largo. Luego tiene un área para mostrar la información y un botón de Analizar. La actividad al pulsar analizar llama a otra actividad.

La actividad de análisis analiza el número de letras presentes. OJO: si una letra no está presente no debe ser contada, utiliza un LinkedHashMap para esto. Ordena el LinkedHashMap por orden de aparición de las letras. y muéstralo en un TextView (Es pronto para los ListView). Esta actividad tendrá un botón de finalizar análisis. Al finalizar devolverá a la actividad principal los 3 caracteres más repetidos y cuantas veces aparecen.

La actividad principal recibe el valor de los 3 elementos más repetidos y los muestra.

Solución de Facundo -> [enlace](https://github.com/facun107/solucionesPMDM/tree/main/ejercicioAnalizarTexto)

### 07 Metalsulg selector

Recopilar las imágenes de Metalsulg, 4 jugadores.
Recopila las imágenes de algunas armas.
Recopila una imagen similar para cuando no tenga jugador seleccionado ni arma.

La actividad principal tendrá dos jugadores: P1 y P2. Cada uno debe elegir su personaje y su arma.

Habrá dos actividades más: ElegirPersonaje y ElegirArma. Cuando pinches en seleccionar Jugador o Arma se abrirá cada una de ellas *indicando las opciones que están disponibles*. Cuando el jugador seleccione una de las opsciones finlizará y la actividad principal recogerá la información y la mostrará.

En ElegirPersonaje y ElegirArma, el usuario podrá cancelar, limpiar o seleccionar un nuevo personaje.

### 08 Objetos

Crea una clase monstruo que tendrá un nombre, un número de miembros (Manos y piernas) y un color. En el constructor se establece toda la información. Cuando se llame al toString pintará un monstruo con assciart. La distribución de los miembros entre manos y piernas es aleatoria y se establece en el constructor.

Ejemplo de monstruo de 8 patas
```txt
   *
// o \
/// \\
```

Crea una actividad que recoja el nombre, el número de miembro y el color. Tendrá un botón enviar. Enviará un objeto que representa el monstruo. La actividad segunda mostrará el monstruo con su nombre y su color.

```
Debe implementar
public class YourClass implements Serializable {

Para enviar
intent.putExtra(Blabla.KEY_NAME, myObject);

Para recibir
myObject = (YourClass) getIntent().getSerializableExtra(Blabla.KEY_NAME);
```


### 09 Intent implícitos

Crea una página web con 3 botones:

- El primero abrirá un navegador con tu canción favorita.
- El Segundo marcar el número 666 (The Number of the Beast)
- El Tercero prepara un sms para tu amigo Paco con el mensaje "Te veo hoy a las 6pm".
- El Cuarto lanzará otro Intent implicito a tu elección.
