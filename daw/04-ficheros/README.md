# ficheros

Directivas de directorios y ficheros
Autentificación de directorios

## Ejecución de apache por distintos usuarios

```
apache2-mpm-itk
```

## Control de acceso

La directiva Require en Apache se utiliza para controlar el acceso a recursos en el servidor. Se puede utilizar dentro de un bloque <Directory>, <Location>, <Files> o .htaccess. Aquí están las diferentes formas en que se puede utilizar la directiva Require junto con sus descripciones:

Require all:

Require all granted: Permite el acceso a todos sin restricciones.
Require all denied: Niega el acceso a todos sin excepción.
Require ip:

Require ip 192.168.1.0/24: Permite el acceso solo desde las direcciones IP en la subred especificada.
Require host:

Require host example.com: Permite el acceso solo desde los hosts especificados.
Require user:

Require user john: Permite el acceso solo a los usuarios especificados. Se requiere configurar la autenticación.


## Usuario y contraseña


[Tutorial](https://www.digitalocean.com/community/tutorials/how-to-set-up-password-authentication-with-apache-on-ubuntu-18-04-es)


## Práctica

1. Crea un virtual host para el usuario paco. Apache se ejecutará con sus credenciales paco:paco. Tendrá un directorio secreto que pedirá usuarios y contraseña.
    1. alicia, pass 1234
    2. bob, pass 1234

2. Crea para el virtualhost de paco un directorio al que solo pueda acceder la ip TBD (Una en el rango compatible).

3. Crea en el mismo host de paco una entrada para ver el estado del servidor.

```
<Location "/server-status">
    SetHandler server-status
    Require host example.com
</Location>
```

## Avanzado
[php-fpm](https://guidocutipa.blog.bo/instalacon-configuracion-de-apache-con-php-fpm-con-mariadb-10-5-y-el-nuevo-php-8-0/)


## Directivas de Directorios y ficheros

Listado de directivas:

DocumentRoot:

Especifica el directorio raíz desde donde Apache servirá los archivos.
ServerAdmin:

Define el correo electrónico del administrador del servidor.
ServerName:

Define el nombre del host y el puerto que el servidor utiliza para responder a las solicitudes.
ServerAlias:

Define los nombres alternativos para un host.
Directory:

Encierra un grupo de directivas que se aplicarán solo al directorio especificado y sus subdirectorios.
Files:

Encierra un grupo de directivas que se aplicarán solo a los archivos especificados.
Location:

Encierra un grupo de directivas que se aplicarán solo a la URL especificada.
ErrorLog:

Especifica el archivo donde se registrarán los mensajes de error.
CustomLog:

Define un archivo de log personalizado y el formato del log.
LogLevel:

Establece el nivel de log de errores.
AllowOverride:

Determina qué directivas en archivos .htaccess pueden sobrescribir la configuración del servidor.
Require:

Controla el acceso a los recursos en el servidor.
Options:

Controla las características específicas del directorio.
Alias:

Asigna una ruta de URL a un directorio del sistema de archivos.
RewriteEngine, RewriteRule, RewriteCond:

Controla la reescritura de URL.
ProxyPass y ProxyPassReverse:

Se utilizan para pasar las solicitudes a otro servidor.
VirtualHost:

Define un host virtual para configurar múltiples sitios en un solo servidor.
Listen:

Define el puerto en el que Apache escuchará las solicitudes.
LoadModule:

Carga módulos dinámicos.
Timeout:

Define el tiempo de espera en segundos para recibir una solicitud.

## Más...

