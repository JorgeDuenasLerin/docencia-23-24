# Ejercicios

Por cada ejercicio haz un enlace o un formulario que envíe la información necesaria. En estos formularios no es necesario validar datos

## Ejercicio 1: Base de Datos de una Librería

Tablas:

- Libros (ID, Título, Autor, Año de Publicación)
- Clientes (ID, Nombre, Teléfono)
- Prestamos (ID, ID_Libro, ID_Cliente, Fecha_Prestamo)

Subtareas:

- Listar todos los libros publicados después del año 2000.
- Actualizar el número de teléfono de un cliente específico.
- Insertar un nuevo préstamo en la tabla Prestamos.

## Ejercicio 2: Base de Datos de una Tienda de Electrónica

Tablas:

- Productos (ID, Nombre, Tipo, Precio)
- Tipo (ID, nombre)
- Clientes (ID, Nombre, Correo Electrónico)
- Compras (ID, ID_Producto, ID_Cliente, Fecha_Compra)

Subtareas:

- Generar un listado de todos los productos de tipo "Smartphone".
- Actualizar el precio de un producto específico.
- Saca un listado ordenado de clientes por número de compras

## Ejercicio 3: Base de Datos de un Servicio de Streaming de Música

Tablas:

- Canciones (ID, Título, Fichero_mp3)
- Usuarios (ID, Nombre, Email, Fecha_Registro)
- Reproducciones (ID, ID_Canción, ID_Usuario, Fecha_Reproducción)

Subtareas:

- Listar todas las canciones de un usuario específico.
- Insertar un nuevo usuario con sus detalles en la tabla Usuarios.
- Subir una nueva canción.

## Ejercicio 4: Base de Datos de Empleados de una Empresa

Tablas:

- Empleados (ID_Empleado, Nombre, Puesto, ID_Supervisor)
- Departamentos (ID_Departamento, Nombre_Departamento)
- Proyectos (ID_Proyecto, Nombre_Proyecto, ID_Departamento, Fecha_Inicio, Fecha_Fin)

> La tabla Empleados tiene una relación reflexiva en la columna ID_Supervisor, que se refiere al ID_Empleado de su supervisor directo. Un empleado puede ser supervisor de otros empleados.

Subtareas:

- Detalle de empleado
- Listado de empleados con el enlace al detalle de supervisor o una imagen indicando que es jefe

## Ejercicio 5: Base de Datos de Reseñas de Películas

Tablas:

- Peliculas (ID_Pelicula, Titulo, Director, Año)
- Usuarios (ID_Usuario, Nombre, Correo_Electronico)
- Votaciones (ID_Votacion, ID_Pelicula, ID_Usuario, Voto)

> En la tabla Votaciones, el campo Voto es un valor booleano donde true representa un voto positivo y false un voto negativo.

Subtareas:

- Contar el número total de votaciones positivas y negativas para una película específica.
- Listar las películas con más votaciones positivas, supongamos que 10.
- Insertar una nueva votación de un usuario a una película.

Subtarea especial:

- Listado con estadística:
    - [Explicación](https://www.evanmiller.org/how-not-to-sort-by-average-rating.html)
    - ![La Fórmula](https://www.evanmiller.org/images/average-rating/equation.png)
    - [La versión fácil](https://stackoverflow.com/a/21288319)