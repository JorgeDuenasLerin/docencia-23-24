¿Qué hemos visto?
Autentificación web

¿Qué veremos?

Configuración de SSH
Configuración de HTTPS
Configuración de seguridad sobre HTTP

Siguente tema...
Externas (otro tema) Oauth, OpenID y LDAP

vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv


Acceso SSH
==========

Es común en el mundo del desarrollo web tener un acceso por ssh a nuestro
servidor. Esto nos sirve tanto para administrarlo como para tener acceso a
nuestro control de versiones.


La configuración básica de este servicio es sencilla, también es común
configurar un acceso a través de una clave pública/privada para los
desarrolladores.

Las tareas a realizar son:
1.- Configura en tu servidor un acceso por SSH
   Impide acceso remoto de root y cambia el puerto por defecto
2.- Configura tu cliente windows para acceder a él

Posible tutorial:
https://www.redeszone.net/seguridad-informatica/servidor-ssh-en-linux-manual-de-configuracion-para-maxima-seguridad/
https://www.aemilius.net/ayuda/articulos/acceso-ssh-ssl-secure-shell-telnet-putty.html


Una vez que podemos acceder con ssh también tenemos de forma automática un
mecanismo para subir ficheros de forma segura utilizando el protocolo SFTP

Tarea:
¿Cuál es la diferencia entre SFTP y FTPS?


Configuración de clave pública/clave privada
********************************************

Ahora vamos a configurar nuestro servidor para que el cliente windows sea capaz
de acceder sin introducir su contraseña y acceda mediante su clave pública

Posible tutorial:
https://devops.profitbricks.com/tutorials/use-ssh-keys-with-putty-on-windows/


Apache HTTPS
============
Cuando utilizamos HTTP estamos enviando los mensajes del protocolo HTTP sobre
una conexión cifrada utilizando el protocolo TLS (Antiguo SSL). El protocolo
TLS utiliza internamente certificados, que a su vez utilizan cifrado de clave
pública-privada y firma digital, para autentificar y cifrar la comunicación.

Para implementar HTTPS en un servidor deberíamos obtener un certificado
firmado por una autoridad de certificación válida y en él introducir, a parte
de la información nuestra, la url en el campo CN (Common Name).

Para realizar esta práctica utilizaremos certificados firmados por nosotros
mismo, con lo que al visitrar nuestras página HTTPS los navegadores se quejarán.

https://www.digitalocean.com/community/tutorials/how-to-create-a-self-signed-ssl-certificate-for-apache-in-ubuntu-18-04

Tareas:
Realiza un listado de las tareas que has hecho
¿Que instrucción es la que autofirma el certificado?


Seguridad HTTP en apache
========================
Existe dentro del protocolo HTTP una sección de seguridad básica implementada
a nivel de protocolo. Esta autetificación no se realiza a nivel de aplicación
sino que se realiza a nivel de server, por ello para configurarla debemos tocar
la configuración de nuestro servidor apache.

Esta seguridad nos permite de forma rápida restringir el acceso a determinadas
carpetas del server.

Esta seguridad no tiene sección de autorización y no tiene granularidad en los
permisos: entras o no entras.

HTACCESS vs Apache config
*************************
Las directrices de configuración son las mismas.
Si tenemos control de acceso lo configuramos en la configuración del server.
Si estamos en un sitio compartido lo tendremos que hacer en htaccess
\- ¡¡¡¡¡¡¡¡¡ No hacerlo automáticamente en HTACCESS por que lo pone en los
             tutoriales de Internet!!!!!!!!!!!!         :(

EXPLICACIÓN DE PROFESOR

Tareas
Implementa la autentificación básica con apache y crea en tu sitio por defecto
una carpeta /private/ en la que solo se pueda acceder con un user y pass
https://www.server-world.info/en/note?os=Ubuntu_18.04&p=httpd&f=9

Puedes investigar más integraciones de seguridad
Puedes investigar cómo almacenar el hash de esas contraseñas en vez de en claro

Próximamente: Autentificación externa
