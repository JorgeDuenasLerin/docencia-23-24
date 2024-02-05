# MVC

Patrón de diseño:

- [MVC](https://es.wikipedia.org/wiki/Modelo%E2%80%93vista%E2%80%93controlador)
- [MVC](https://www.geeksforgeeks.org/mvc-framework-introduction/)


## Lenguaje python - Sin POO

[Curso referencia](https://aprendepython.es/)
[Cheatsheet](https://quickref.me/python.html)

## python POO

[Explicación Mejor](https://ellibrodepython.com/programacion-orientada-a-objetos-python)

### Mini ejercicios de python

#### Propiedades y atributos

Atributos: Define una clase Libro en Python y agrega atributos para titulo, autor y año. Luego, crea una instancia de esta clase y accede a sus atributos para imprimirlos.

Acceso directo: Crea una clase Círculo con un atributo radio. Luego, crea una instancia de esta clase, cambia el valor del radio directamente utilizando el acceso directo, e imprime el nuevo valor del radio.

Propiedades: Define una clase Persona con un atributo privado edad y utiliza el decorador @property para crear un getter y un setter para edad, incluyendo una validación que impida asignar valores negativos a edad. Imprimirá un mensaje de error.

Valores calculados: Define una clase Rectángulo con atributos largo y ancho. Añade un método area que calcule el área del rectángulo (largo * ancho) y otro método perímetro que calcule el perímetro (2 * largo + 2 * ancho). Crea una instancia de esta clase y utiliza estos métodos para imprimir el área y el perímetro del rectángulo.

#### Métodos

Métodos: Define una clase Animal con un método hacer_sonido. Este método debe imprimir "Este animal no hace un sonido" por defecto. Luego, crea una subclase Perro que sobrescriba el método hacer_sonido para imprimir "Guau".

Métodos estáticos: Implementa una clase Calculadora que tenga un método estático sumar que acepte dos números y devuelva su suma. Asegúrate de que este método pueda ser llamado sin necesidad de crear una instancia de la clase. Ejemplifica su uso llamando al método estático Calculadora.sumar(5, 3).

Métodos mágicos: Crea una clase Libro con atributos titulo y autor. Implementa el método mágico __str__ para que cuando se imprima una instancia de Libro, se muestre un string en el formato "Titulo: [titulo], Autor: [autor]". Además, implementa el método mágico __eq__ para comparar dos instancias de Libro basándose en si tienen el mismo titulo y autor.

## Django

Preparando el entorno: [Virtualenvs](https://virtualenvwrapper.readthedocs.io/en/latest/#)

[Tutorial Oficial](https://www.djangoproject.com/)

[Ficheros](https://docs.djangoproject.com/es/5.0/topics/files/)


### Ejercicios

Crea una página con resultados de partidos. Debes crear la entidad Equipo también.

Crea una página con un formulario de sugerencia: título, email y descripción.

Crea una página con un listado y detalle de frutas y verduras usan vistas genéricas.

Crea un aplicación con un carrusel de fotos administrada desde el admin. Habrá 5 fotos con descripción.