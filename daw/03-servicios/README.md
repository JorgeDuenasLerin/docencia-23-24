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



## Envío de correo

Hablar del protocolo de correo

conectarte por tls/ssl

```
openssl s_client -connect smtp.educa.madrid.org:587 -crlf -quiet -starttls smtp
```

```
EHLO
AUTH LOGIN
```

Codificado en base 64

```
echo -ne "usuario" | base64
```

Cómo enviar:

```
MAIL FROM: <algo@loquesea.es>
--- ESPERA RESPUESTA DEL SERVER ---


RCPT TO: <jorge.duenas@educa.madrid.org>
--- ESPERA RESPUESTA DEL SERVER ---


DATA 
--- ESPERA RESPUESTA DEL SERVER ---



From: "Jorge DAW" <jorge@daw.es>
To: "Alicia" <alicia@maravillas.com>
Subject: Hello Test Mail

Hola!!

Una cosa es el comando y otra el contenido.

La imaginación es el único arma en la guerra contra la realidad.

.
```

### Librerias

[Composer](https://getcomposer.org/)
[PHPMailer](https://github.com/PHPMailer/PHPMailer)


