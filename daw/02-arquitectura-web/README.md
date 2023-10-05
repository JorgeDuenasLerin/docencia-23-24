# arquitectura-web

Revisión del protocolo HTTP. Comandos con nc
Peticiones y respuestas seguras.

Objetivos:

- Entender principios de servidores.
- Entender Entender los protocolos involucrados en la tecnología web.


## Prácticas

### Peticiones

```ssh
cat request.txt | openssl s_client -connect server:443
```

```ssh
curl
```

Tareas: 

- Realiza distintas peticiones con HTTP.
  - Peticiones GET
  - Peticiones POST
- Manejo de Cookies y sesiones


### Server

Tareas:

- Instala tu servidor sin GUI
- Configura el DNS (trampa en hosts)
- Instalación de apache
- Realiza peticiones HTTP
- Revisión de logs
- Cambios básicos de configuración

Configuración ip:

Busca el fichero ```/etc/netplan/01-netcfg.yaml````

```yaml
network:
  version: 2
  renderer: networkd
  ethernets:
    enp0s3:
      dhcp4: yes
```

```yaml
network:
  version: 2
  renderer: networkd
  ethernets:
    enp0s3:
     dhcp4: no
     addresses: [192.168.1.200/24]
     routes:
       - to: default
         via: 192.168.1.100
     nameservers:
       addresses: [8.8.8.8,8.8.4.4]
```

```
netplan apply
```