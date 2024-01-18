# ficheros

Directivas de directorios y ficheros
Autentificación de directorios

## Ejecución de apache por distintos usuarios

```
apache2-mpm-itk
```

### Ejercicios

1. Configura un nuevo servidor para usarlo con un usuario nuevo.
2. Configura los anteriores servidores para poder usar esta nueva funcionalidad.

## Control de acceso

La directiva Require en Apache se utiliza para controlar el acceso a recursos en el servidor. Se puede utilizar dentro de un bloque <Directory>, <Location>, <Files> o .htaccess. Aquí están las diferentes formas en que se puede utilizar la directiva Require junto con sus descripciones:

- Require all:
    - Require all granted: Permite el acceso a todos sin restricciones.
    - Require all denied: Niega el acceso a todos sin excepción.
- Require ip:
    - Require ip 192.168.1.0/24: Permite el acceso solo desde las direcciones IP en la subred especificada.
- Require host:
    - Require host example.com: Permite el acceso solo desde los hosts especificados.
- Require user:
    - Require user john: Permite el acceso solo a los usuarios especificados. Se requiere configurar la autenticación.

## Usuario y contraseña

[Tutorial](https://www.digitalocean.com/community/tutorials/how-to-set-up-password-authentication-with-apache-on-ubuntu-18-04-es)

```
# Primera vez
htpasswd -c /etc/apache2/.htpasswd jorge
htpasswd /etc/apache2/.htpasswd amparo
```

Mostrar el contenido:
```
cat /etc/apache2/.htpasswd
```

En la sección a proteger:
```
  <Directory "/var/www/html">
      AuthType Basic
      AuthName "Restricted Content"
      AuthUserFile /etc/apache2/.htpasswd
      Require valid-user
  </Directory>
```

### Práctica

1. Crea un virtual host para el usuario paco. Apache se ejecutará con sus credenciales paco:paco. Tendrá un directorio secreto que pedirá usuarios y contraseña.
    1. alicia, pass 1234
    2. bob, pass 1234

2. Crea para el virtualhost de paco un directorio al que solo pueda acceder la ip TBD (Una en el rango compatible).

3. Crea en el mismo host de paco una entrada para ver el estado del servidor.

```
<Location "/server-status">
    SetHandler server-status
    Require all granted
</Location>
```

## Cron y crontab

[Explicación](https://www.redeszone.net/tutoriales/servidores/cron-crontab-linux-programar-tareas/)


## Rewrite

URLS:

- [https://www.ionos.es/digitalguide/hosting/cuestiones-tecnicas/conoces-mod-rewrite/](https://www.ionos.es/digitalguide/hosting/cuestiones-tecnicas/conoces-mod-rewrite/)
- [https://www.josedomingo.org/pledin/2011/10/ejemplos-del-modulo-rewrite-en-apache-2-2/](https://www.josedomingo.org/pledin/2011/10/ejemplos-del-modulo-rewrite-en-apache-2-2/)

Chuleta:

- [https://mod-rewrite-cheatsheet.com/](https://mod-rewrite-cheatsheet.com/)

### Práctica

Crea un virtual host para:

- Una web con este esquema "/rewrite/-cadena-/-cadena-/" sea procesado por una página index.php que reciba dos parámetros y escriba el primero como un h1 y el segundo como un p
- 

Bonus generación de información:

- [Faker](https://faker.readthedocs.io/en/master/index.html)
- [Pandas a SQL](https://stackoverflow.com/a/51629081)

## Certificados

Cosas de certificados:

- Explicación teórica de seguridad (explicación en clase)
- Autentificación de SSH (explicación en clase)
- [Certificado autofirmado](https://www.digitalocean.com/community/tutorials/how-to-create-a-self-signed-ssl-certificate-for-apache-in-ubuntu-22-04)
- Siendo una CA
- Certbot

CA:

- https://deliciousbrains.com/ssl-certificate-authority-for-local-https-development/
- https://gist.github.com/fntlnz/cf14feb5a46b2eda428e000157447309

## Directivas de Directorios y ficheros

Listado de directivas:

- DocumentRoot: Especifica el directorio raíz desde donde Apache servirá los archivos.
- ServerAdmin: Define el correo electrónico del administrador del servidor.
- ServerName: Define el nombre del host y el puerto que el servidor utiliza para responder a las solicitudes.
- ServerAlias: Define los nombres alternativos para un host.
- Directory: Encierra un grupo de directivas que se aplicarán solo al directorio especificado y sus subdirectorios.
- Files: Encierra un grupo de directivas que se aplicarán solo a los archivos especificados.
- Location: Encierra un grupo de directivas que se aplicarán solo a la URL especificada.
- ErrorLog: Especifica el archivo donde se registrarán los mensajes de error.
- CustomLog: Define un archivo de log personalizado y el formato del log.
- LogLevel: Establece el nivel de log de errores.
- AllowOverride: Determina qué directivas en archivos .htaccess pueden sobrescribir la configuración del servidor.
- Require: Controla el acceso a los recursos en el servidor.
- Options: Controla las características específicas del directorio.
- Alias: Asigna una ruta de URL a un directorio del sistema de archivos.
- RewriteEngine, RewriteRule, RewriteCond: Controla la reescritura de URL.
- ProxyPass y ProxyPassReverse: Se utilizan para pasar las solicitudes a otro servidor.
- VirtualHost: Define un host virtual para configurar múltiples sitios en un solo servidor.
- Listen: Define el puerto en el que Apache escuchará las solicitudes.
- LoadModule: Carga módulos dinámicos.
- Timeout: Define el tiempo de espera en segundos para recibir una solicitud.