# Ejercicios

## Formularios

### Ejercicio 1

Programa un formulario que procese datos para un alta de libros:

- Título
- Autor
- Año de publicación
- Número de páginas

### Ejercicio 2

Programa un formulario para darte de alta en un servicio de comida. Te preguntará nombre, dirección, número de platos, te preguntará si eres vegetariano y qué [alergias tienes de entre 14 opciones](https://curso-alergenos.com/lecciones/los-14-alergenos-principales/)

### Ejercicio 3

Encuestas. Crea una página que lea un fichero con líneas de texto. Cada línea representará una pregunta. Ejemplo:

```
¿Cómo de contento está con el producto?
¿Está conforme con el precio del producto?
¿Considera...?
```

Por cada línea del fichero cuando se visite la página se mostrará una encuesta de satisfacción y por cada pregunta se mostrarán 3 opciones: nada, normal, mucho.

La página mostrará un formulario que pedirá el nombre y mostrará todas las preguntas. Por cada pregunta se mostrará un radio con las opciones, todas las preguntas son obligatorias.

Si el usuario no rellena una la página mostrará un error y mantendrá los datos enviados.

Cuando todas las repuestas estén enviadas se guardará en un fichero csv las respuestas. Ejemplo de la respuesta de jorge contestando nada, nada, normal.

```
jorge;0;0;1
```

Bonus:

Genera una página de php que muestre un gráfico de barra

## Objetos y arrays

### Ejercicio 1

Se requiere desarrollar un sistema que maneje diferentes tipos de alertas (warning, error, alarma), mostrándolas en una interfaz web. Cada tipo de alerta tendrá características visuales únicas y se gestionará a través de clases que heredan de una clase base común.

#### Clases

- Alerta: Esta será la clase base que contiene propiedades como titulo y mensaje. Además, define el método abstracto mostrar() que todas las subclases implementarán de acuerdo a su tipo específico.
- AlertaWarning: Extiende de Alerta. Implementa el método mostrar() para mostrar el mensaje con el título subrayado en amarillo y un icono de admiración. (Se mostrará en un div con un h1 y un p)
- AlertaError: Extiende de Alerta. Implementa el método mostrar() para mostrar el mensaje con el título subrayado en rojo y un icono de aspa. (Se mostrará en un div con un h1 y un p)
- AlertaAlarma: Extiende de Alerta. Implementa el método mostrar() para mostrar un mensaje de alerta emergente en la pantalla.

#### Requisitos

- Crear una clase abstracta Alerta con propiedades titulo y mensaje, y un método abstracto mostrar().
- Implementar las clases AlertaWarning, AlertaError y AlertaAlarma que hereden de Alerta y sobrescriban el método mostrar() para realizar la visualización específica.
- Utilizar spl_autoload_register() para el autoloading de clases, facilitando la organización y la escalabilidad del código.
- Crear una página web principal (index.php) que genere y muestre 10 alertas aleatorias de los tipos definidos cada vez que se recarga la página.

## Autentificación

### Ejercicio 1

Crea varias páginas para una mini twitter. Tendremos un formulario de registro, una sección privada dónde se podrán ver textos que los usuarios publican, un formulario para publicar textos, una página de perfil dónde se podrá editar el nombre de usuario.

### Ejercicio 2

Modifica el ejercicio anterior para permitir recuperar contraseña.

### Ejercicio 3

Añade la opción de recuérdame en el login.

## Django

### Ejercicio 1

Haz un proyecto con un área de administración y un listado de entidades. El modelo tendrá chistes con título, texto, un campo que indica si es para adultos y fecha de creación.

### Ejercicio 2

Haz un proyecto para gestionar la información de familias profesionales y ciclos. Cada familia tendrá varios ciclos. Haz un área pública con un listado de las familias y un detalle de los ciclos de esa familia. [FP](https://todofp.es/que-estudiar.html)

### Ejercicio 3

El objetivo de esta aplicación es proporcionar a los usuarios una plataforma donde puedan consultar las frutas y verduras disponibles según la temporada. El proyecto incluirá modelos para representar los productos (frutas y verduras), vistas para acceder a la información de temporada.

Cada producto (fruta o verdura) debe tener los siguientes campos:

- Nombre del producto.
- Foto del producto.
- Descripción breve.
- Fecha de inicio de la temporada de consumo.
- Fecha de fin de la temporada de consumo.
- Un campo booleano que indique si el producto está disponible durante todo el año.

Vistas y URLs:

- Implementa una vista principal que liste todos los meses del año.
- Al seleccionar un mes, la aplicación deberá mostrar todas las frutas y verduras disponibles durante ese mes. Esto incluye productos cuya temporada abarca ese mes y los que están disponibles todo el año.


# s4 abril

## Día de la tierra

Crear un formulario donde los usuarios puedan registrar y compartir acciones ambientales específicas que ayuden a combatir el cambio climático, inspirando a otros a tomar medidas similares. También habrá un listado de las acciones registradas.

Acción tendrá:

- Fecha (Date)
- Lugar (Cadena)
- Nombre (o anónimo)
- Descripción (Campo opcional)
- foto de la acción 

Nombre y descripción son opcionales.

En la página de listado aparecerán por fecha en orden descendente.

## Fallout (DJANGO)

Crea una web para mostrar los personajes de Fallout con imágenes.

Personaje:

- Nombre
- [Slug](https://learndjango.com/tutorials/django-slug-tutorial)
- Descripción
- Foto Portada
- Foto Detalle

Crea un web con el listado de personajes, ahí no aparecerá la descripción y se mostrará la foto de portada. Cuando pinches se usará el slug para ir al detalle y mostrar la otra foto y su descripción.





# s1 Mayo

## Resultados de Rugby - PHP

Página para introducir resultados de rugby de la selección Española. Un resultado tiene:

- País
- Victoria|Empate|Derrota
- Resultado

Estará paginado y permitirá ordenar

## Página para subir música - Django

Crea una página con un formulario público, un listado y un área de administración. La página almacenará información de mp3 de música. El modelo tendrá:

- Nombre
- Tipo de música (Select)
- Fichero

La página de listado estará paginada.

# s2 Mayo

## PHP - Clases

Crear un sistema en PHP que permita registrar y describir características de diferentes tipos de gestores de datos: relacional, no relacional y basado en ficheros. Cada tipo de gestor tendrá sus propios atributos distintivos. Se utilizará un trait para generar una representación en HTML de la información de cada gestor.

### Clase Base:

Desarrollar una clase abstracta GestorDatos con propiedades comunes como nombre y descripción. Tendrá un método abstracto obternerDetalle.


### Subclases Específicas:

- GestorRelacional: Esta subclase tendrá atributos como sistemas operativos soportados, version, y soporteTransacciones.
- GestorNoRelacional: Incluirá atributos como tipoModeloDatos (por ejemplo, document, key-value, graph, etc.).
- GestorBasadoEnFichero: Tendrá atributos como formatoArchivo (por ejemplo, TXT, CSV, XML) y modoAcceso (lectura, escritura, ambos).

### Trait HTMLRenderer:

Implementar un trait HTMLRenderer que contenga un método renderHTML() el cual genere una representación HTML de las propiedades del gestor de datos. Este trait pintará en un h1 el nombre, en un p la descripción, y en otro p los detalles del gestor.

### Tarea Final:

Implementar las clases y el trait, y luego crear instancias de cada tipo de gestor de datos, asignarles valores a sus propiedades, y utilizar el HTMLRenderer para mostrar estas propiedades en formato HTML. El script principal debe usar autoload. Se creará un array de gestores de bases de datos y luego en la misma página se recorrerá mostrando la información.

## PHP - Motes

Implementar un formulario HTML para la captura de datos de empleados. Los campos del formulario deben incluir nombre, departamento y mote. Debajo aparecerá un listado. Toda la información se almacena en:

1. versión con CSV
2. versión con json

## Django

Desarrollar un sistema en la que la gente pueda comentar memes. Los memes se suben desde el admin.

Desde la parte pública se pueden enviar formularios para comentar cada meme. NO se pueden comentar los comentarios (Solo hay un nivel de comentarios)

En la página de listado aparecen los memes (imagen y descripción) y cuando pinchas en uno te vas al detalle, esto te permite ver los comentarios ordenados por el más reciente primeros. También puedes generar nuevos comentario.

# s3 Mayo

## DWES - DAW

Desarrolla una aplicación web en PHP que permita a los usuarios ver y gestionar una lista de artículos. Cada artículo tendrá un título, un contenido y una fecha de publicación. Los artículos se almacenarán en una base de datos MySQL. Además, la aplicación deberá soportar URLs amigables utilizando la reescritura de URLs de Apache.

## Django API

Desarrollar una API RESTful utilizando Django y Django Rest Framework (DRF) para gestionar una galería de obras de arte. Además, crear un área de administración personalizada para gestionar estas obras de arte.

- Crear un nuevo proyecto Django llamado galeria.
- Crear una aplicación llamada obras.

Modelo de Datos:

Definir un modelo ObraDeArte con los siguientes campos:
- titulo (CharField, máximo 200 caracteres): Título de la obra de arte.
- artista (CharField, máximo 100 caracteres): Nombre del artista.
- descripcion (TextField): Descripción detallada de la obra de arte.
- fecha_creacion (DateField): Fecha en la que se creó la obra de arte.
- precio (DecimalField, máximo 10 dígitos con 2 decimales): Precio de la obra de arte.
- en_venta (BooleanField, por defecto True): Indicador de si la obra está en venta.
- imagen (ImageField, opcional): Imagen de la obra de arte.

Necesitamos: área de administración, parte pública de la web navegable con slugs y un API para que terceros trabajen con nuestra información.