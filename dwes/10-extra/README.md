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

## Autentificación



## Django

### Ejercicio 1

Haz un proyecto con un área de administración y un listado de entidades. El modelo tendrá chistes con título, texto, un campo que indica si es para adultos y fecha de creación.

### Ejercicio 2

Haz un proyecto para gestionar la información de familias profesionales y ciclos. Cada familia tendrá varios ciclos. Haz un área pública con un listado de las familias y un detalle de los ciclos de esa familia. [FP](https://todofp.es/que-estudiar.html)