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

### Ejercicio 2

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