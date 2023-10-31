# Introducción
Para conectarnos con las bases de datos volvemos a estar frente a una arquitectura cliente-servidor.

Cada SGBD implementa su propio protocolo, estos protocolos son binarios (al
contrario que el protocolo HTTP, no son texto claro).

Recordando la arquitectura:
```
Cliente                      Servidor
   \-   Habla un protocolo    -/

IP:PUERTO     conexión       IP:PUERTO
```

## Protocolos de conexión

Debido a que cada SGBD implementa su propio protocolo, existe un cliente
distinto para cada uno. Para comenzar veremos distintos tipo de clientes:

### Clientes GUI vs CLI
- GUI: cómodos para el desarrollo pero no disponibles en server ni para automatización.
- CLI: muy potentes, toda la funcionalidad y posibilidad de automatización de tareas

### Ejemplos de clientes
Server      | Cliente CLI | Cliente GUI
------------|-------------|-----------------------
mysqld      | mysql       |   MySQL Workbench<br>phpMyAdmin
postgresql  | psql        |   pgAdmin
MSSQL       | ¿?          |   SQL Studio


## Instalación de MYSQL

```
# apt install mysql-server # Instala server y cliente
```

Una vez instalado debemos ejecutar el script para establecer la seguridad

```
# mysql_secure_installation
```

Funcionalidad por defecto:
- El usuario root de la máquina se puede conectar sin contraseña.
- Por defecto escucha en el puerto 3306

## Conexión como ususario
Como usuario normal intenta conectarte y analiza la salida

```
$ mysql
$ mysql -u root
$ mysql -u root -p
```

NOTA: Ahora somos root en la base de datos pero estamos conectados como usuario al sistema.

También podemos ejecutar comandos SQL desde la línea de comandos

```
mysql -u root mysql -e 'SELECT Host, User, plugin, authentication_string FROM user'
```

También podemos estar ante una configuración en la que la base de datos esté en otro host

```
  Servidor Web            Servidor(es) de base de datos
      \-     red interna    -/
```

Podemos conectarnos a otra ip y a otro puerto, para esto el server debe estar configurado para aceptar conexiones remotas.

```
$ mysql -u root -p -h 10.34.12.3 -P 8000
```

## Creación de usuario y bases de datos

La tarea de crear un usuario y una base de datos es común cuando se arranca un proyecto web.
NOTA: No es necesario saber estas sentencias de memoria, además hay
detalles que cambian de un SGBD a otro. Aquí veremos la tarea de creación para MySQL.

### Tareas
1. Login como root
```$ mysql -u root -p```
2. Crear base de datos
```mysql> CREATE DATABASE proyecto01_juan_de_la_cierva;```
3. Crear usuario (Para nuevo usar cambia nombre y pass)
```mysql> CREATE USER 'juan'@'localhost' IDENTIFIED BY 'cierva1234';```
4. Conceder privilegios al nuevo usuario
```GRANT ALL PRIVILEGES ON proyecto01_juan_de_la_cierva.* TO 'juan'@'localhost' WITH GRANT OPTION;```

### Comprueba el nuevo usuario
Comprobamos que nos podemos conectar con el nuevo usuario a la base de datos
```
$ mysql -u juan proyecto01_juan_de_la_cierva
$ mysql -u juan -p proyecto01_juan_de_la_cierva
mysql> show databases;
mysql> show tables;
mysql> CREATE TABLE cosas (nombre varchar(100));
mysql> show tables;
```

## Continua...

[Ver PHP - Mysql](README_Comunicación_Programación_MYSQL.md)