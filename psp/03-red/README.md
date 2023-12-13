# Comunicaciones

## TCP y UDP

[Teoría y ejemplos](https://psp2dam.github.io/psp_pages/es/unit4/)

## A mano

Prácticas con netcat y Wireshark

- Comunicación TCP
- Comunicación UDP
- Comunicación Broadcast

## Ejemplos

```java
import java.net.DatagramPacket;
import java.net.DatagramSocket;

public class UDPServer {
    private static final int MAX_LENGTH = 65535;
    private static final int PORT       = 9876;

    public static void main(String[] args) {
        try {
            DatagramSocket socket = new DatagramSocket(PORT); // Abre el socket en el puerto 9876
            byte[] receivedData = new byte[MAX_LENGTH];

            while(true) {
                DatagramPacket receivedPacket = new DatagramPacket(receivedData, receivedData.length);
                socket.receive(receivedPacket); // Espera y recibe el paquete

                // Extrae la información del paquete
                String message = new String(receivedPacket.getData(), 0, receivedPacket.getLength());
                System.out.println("Mensaje recibido: " + message);
            }
        } catch(Exception e) {
            e.printStackTrace();
        }
    }
}
```

```java
import java.net.DatagramPacket;
import java.net.DatagramSocket;
import java.net.InetAddress;

public class UDPClient {
    private static final int MAX_LENGTH = 65535;

    public static void main(String[] args) {
        try {
            DatagramSocket socket = new DatagramSocket();
            InetAddress ipAddress = InetAddress.getByName("localhost"); // Dirección del servidor
            byte[] sendData = new byte[MAX_LENGTH];
            String sentence = "Hola desde el cliente"; // Mensaje a enviar
            sendData = sentence.getBytes();

            DatagramPacket sendPacket = new DatagramPacket(sendData, sendData.length, IPAddress, 9876);
            socket.send(sendPacket); // Envía el paquete al servidor
            socket.close();
        } catch (Exception e) {
            e.printStackTrace();
        }
    }
}

```