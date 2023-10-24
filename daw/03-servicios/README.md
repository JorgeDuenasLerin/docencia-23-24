# servicios

Prácticas guiadas:
- Configuración básica del servidor
- Espacio web espacio de ficheros
- Permisos


## Configuración de directivas

Hablar de directivas básicas:

- DirectoryIndex: indica cuál es el archivo por defecto.
- Option: 
    - Indexes: Si se permite listado de ficheros.
    - FollowSymLinks: Seguir enlaces.
- AllowOverride y .htaccess

Estas se pueden definir a nivel de Directorio o nivel de Localización

### Directory vs Location

```
La directiva Directory sólo funciona para objetos del sistema de archivos (por ejemplo, /var/www/mypage), mientras que la directiva Location sólo funciona para URLs (la parte que sigue al nombre de dominio de su sitio, por ejemplo, www.mypage.com/mylocation sería /mylocation).

El uso es sencillo - usa Location si necesitas ajustar los derechos de acceso por una URL, y usa Directory si necesita controlar los derechos de acceso a un directorio (y sus subdirectorios) en el sistema de archivos.
```

### Restricciones de acceso

[https://httpd.apache.org/docs/trunk/es/howto/access.html](https://httpd.apache.org/docs/trunk/es/howto/access.html)

Requerir IP concreta para un acceso.

#### Antes OBSOLETO

En el siguiente ejemplo, todos los host en el dominio example.org tienen permitido el acceso; el resto de host tienen el acceso denegado.

```
Order Deny,Allow
Deny from all
Allow from example.org
```

En el siguiente ejemplo, todos los hosts del dominio example.org tienen permitido el acceso, excepto para los host que están en el subdominio foo.example.org, a los que se le deniega el acceso. Todos los host que no coinciden con el dominio example.org tienen el acceso denegado porque el estado por defecto es Deny con el acceso al servidor.

```
Order Allow,Deny
Allow from example.org
Deny from foo.example.org
```



## Configuración de base datos

Configurar distintos motores y lenguajes para acceder a base de datos.

mariadb
postgress

php
python

https://levelup.gitconnected.com/working-with-apache-in-python-a-practical-guide-with-a-flask-app-example-cce141725633

## Envío de correo

Hablar del protocolo de correo