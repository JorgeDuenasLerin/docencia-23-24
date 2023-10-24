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

### Directory vs Location

```
Directory directive works only for filesystem objects (e.g. /var/www/mypage, C:\www\mypage), while Location directive works only for URLs (the part after your site domain name, e.g. www.mypage.com/mylocation).

The usage is straightforward - you would use Location if you need to fine tune access rights by an URL, and you would use Directory if you need to control access rights to a directory (and its subdirectories) in the filesystem.
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