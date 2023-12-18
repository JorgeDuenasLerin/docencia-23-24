# Comunicaciones

## TCP y UDP

[Teoría y ejemplos](https://psp2dam.github.io/psp_pages/es/unit4/)

## A mano

Prácticas con netcat y Wireshark

- Comunicación TCP
- Comunicación UDP
- Comunicación Broadcast

## Ejemplos

Ver código del repositorio del [módulo](https://github.com/JorgeDuenasLerin/programacion-de-servicios-y-procesos/tree/main/ut03).

## UDP

Tarea 1: Ejemplo simple

- Crea un programa servidor que reciba por parámetro un número que representa el puerto en el que escuchará, cuando reciba un mensaje lo escribirá por pantalla.
- Crea un programa cliente que reciba por parámetro una cadena representando la dirección ip, un número representando el puerto y una última cadena representando el texto a enviar. El programa enviará la información usando UDP.

Tarea 2: Eco

- Crea un programa con parámetros similares al anterior.
- Esta vez el servidor se ejecutará con un bucle while true. Será un servicio de eco, envía al cliente la información que se le ha mandado.
- El cliente envía información, y espera una respuesta en el mismo puerto.

Tarea 3: Servicio Stringreverse

- Implementa un servicio que devuelva la cadena recibida pero dada la vuelta

Tarea 4: Chat UDP (envío-recepción alternativo)

- Implmenta un chat cliente-servidor, estos programas serán monothread.
- Para facilitar la tarea primero envía el cliente, y espera respuesta.
- Para facilitar la tarea primero espera respuesta el servidor, y luego envía respuesta.
- Tanto el cliente como el servidor reciben como parámetro el puerto. El cliente también recibirá como parámetro la dirección ip.
- Ambos programas muestran un prompt al usuario para pedir y mostrar los mensajes enviados.

Tarea 5: Chat UDP (Multithread)

Implementa el chat UDP con la posibilidad de recepción multiple (Utiliza threads)

## Ideas Futuras

Comunicación multicast.
Juego de adivina el número.
Juego del ahoracado.
Implmenta un servidor de reproducción de MP3 (con TCP). Versión listado de canciones en el server.
Implmenta un servidor de reproducción de MP3 (con TCP). Versión envío de canción por red.

