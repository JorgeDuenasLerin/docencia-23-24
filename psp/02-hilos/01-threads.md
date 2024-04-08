# Threads

## Ejemplos

Creación de un Hilo:

```java
class MyThread extends Thread {
    public void run() {
        System.out.println("Hilo ejecutándose");
    }
}
public class Main {
    public static void main(String[] args) {
        MyThread t = new MyThread();
        t.start();
    }
}
```

Implementación de la interfaz Runnable:

```java
class MyRunnable implements Runnable {
    public void run() {
        System.out.println("Hilo ejecutándose");
    }
}
public class Main {
    public static void main(String[] args) {
        Thread t = new Thread(new MyRunnable());
        t.start();
    }
}
```


Nombre del Hilo:

```java
public class Main {
    public static void main(String[] args) {
        System.out.println(Thread.currentThread().getName());
    }
}
```

Prioridad del Hilo:

```java
public class Main {
    public static void main(String[] args) {
        Thread t = new Thread();
        t.setPriority(Thread.MAX_PRIORITY);
        System.out.println(t.getPriority());
    }
}
```


Dormir un Hilo (Sleep):

```java
public class Main {
    public static void main(String[] args) {
        try {
            Thread.sleep(2000);
        } catch (InterruptedException e) {
            e.printStackTrace();
        }
    }
}
```

Unir Hilos (Join):

```java
class MyThread extends Thread {
    public void run() {
        for(int i=0; i<5; i++) {
            try {
                Thread.sleep(500);
            } catch (InterruptedException e) {
                e.printStackTrace();
            }
            System.out.println(i);
        }
    }
}
public class Main {
    public static void main(String[] args) {
        MyThread t1 = new MyThread();
        MyThread t2 = new MyThread();
        t1.start();
        try {
            t1.join();
        } catch (InterruptedException e) {
            e.printStackTrace();
        }
        t2.start();
    }
}
```

Sincronización de Métodos:

```java
class Counter {
    synchronized void increment() {
        int count = 0;
        count++;
        System.out.println(count);
    }
}
```

Sincronización de Bloques:

```java
class Counter {
    void increment() {
        synchronized (this) {
            int count = 0;
            count++;
            System.out.println(count);
        }
    }
}
```

Comunicación entre Hilos:

```java
class Printer {
    private static final double DELAY = 100;
    boolean flag = false;

    private void imprimir(String msg) {
        for(int i = 0 ; i<msg.length(); i++){
            System.out.print(msg.charAt(i));
            Thread.sleep(Math.random()*DELAY);
        }
    }

    synchronized void imprime(String msg) {
        if (flag) {
            try {
                wait();
            } catch (InterruptedException e) {
                e.printStackTrace();
            }
        }
        imprimir(msg);
        flag = true;
        notify();
    }
}
```

## Ejercicios

### 01 Creación de un Hilo:

Hilos:
- Crea una clase que extienda de Thread y sobrescriba el método run para imprimir "Hola Mundo" en la consola. Luego, instancia y ejecuta el hilo en la clase principal.
- Crea un versión de forma que implementes Runnable.
- Crea una versión con un Lambda.

Haz un método princpial que arranque los 3 threads.


### 02 Implementación de la interfaz Runnable:

Crea una clase que implemente la interfaz Runnable y sobrescriba el método run para imprimir los números del 1 al 10. Luego, instancia y ejecuta el hilo en la clase principal.

Modifica el programa anterior para que cree un array de N Threads y los espere. A cada thread le dará un nombre (Método setName) y escribirá la tabla de un número.

> NOTA: La salida estará desordenada.

Ejecuta el comando en la terminal, y vuelca su salida a un fichero. Utiliza las redirecciones de linux y el comando sort para verificar que has escrito todas las tablas.

### 03 Los elefantes...

```text
Un elefante se balanceaba sobre la tela de una araña
Como veía que resistía, fue a llamar otro elefante
Dos elefantes se balanceaban sobre la tela de una araña
Como veían que resistía, fueron a llamar otro elefante
```

Basándote en esa canción, crea un Thread que reciba el tipo de animal, la acción y el número máximo. Cada vez que escriba una estrofa, el thread generará un número aleatorio entre 100000 y 300000 y verificará si es primo.

Crea un programa principal que gestion 3 canciones infantiles de forma concurrente con distintas prioridades (setPriority). Las canciones serán veriones de los elefantes pero con distinto animal y acción.

> No hace falta que haya 

```text
Un perro ladraba sobre la tela de una araña
Como veía que resistía, fue a llamar otro elefante
Dos perro ladraban sobre la tela de una araña
Como veían que resistía, fueron a llamar otro elefante
```

### 04 Contador

Crea una clase Counter con un método sincronizado increment que incremente una variable count. Crea dos hilos que incrementen el contador y observa el resultado.
Modifica la clase Counter anterior para usar un bloque sincronizado en lugar de un método sincronizado.

#### Modificación 04a 

Modifica el ejercicio para poder incrementar y decrementar, crea 5 hilos que incrementen 1000 veces y 5 que decrementen 1000 veces. Muestra el resultado de hacer esta operación con sincronización y sin sincornización.


### 05 Bancos

Imagina un sistema de banco en línea que maneja las cuentas de los usuarios. Dos usuarios, Alice y Bob, intentan transferir dinero de sus cuentas a una tercera cuenta al mismo tiempo. Necesitas asegurarte de que las operaciones se realicen de manera segura y sin conflictos, utilizando sincronización.

Crea dos threads, uno para cada usuario. Cada thread intentará realizar 1000 transferencia de dinero de 10 euros. Usa un método synchronized para asegurar que las operaciones en las cuentas no se realicen simultáneamente, evitando así condiciones de carrera.

Ejecuciones:
- Haz una ejcución sin sincronización
- Haz una ejecución sincronizada

Posible ejecución sincronizada:
- Alice inicia la transferencia.
- El thread de Alice adquiere el bloqueo del objeto cuenta.
- Bob intenta iniciar su transferencia pero debe esperar.
- Alice completa su transferencia y libera el bloqueo.
- Bob adquiere el bloqueo y realiza su transferencia.


### 06 Carrera

Práctica guiada: introducción a wait, notify y notifyAll.

Crea una carrera de corredores. Los corredores esperan a la salida (notifyAll), cuando un corredor llega notifica al thread principal en la meta. El thread principal interrumpe a los corredores.


### 07 Revisar Producto-Consumidor

Un ejemplo muy utilizado [Productor-Consumidor](https://psp2dam.github.io/psp_pages/es/unit3/producer-consumer.html)

### 08 Fábrica

Una fábrica tiene un almacén con capacidad limitada. Los trabajadores (productores) generan productos y los almacenan en el almacén, mientras que los camiones (consumidores) recogen los productos para entregarlos. Es crucial que los trabajadores no produzcan más productos de los que el almacén puede contener y que los camiones no intenten recoger productos si el almacén está vacío.

Implementa dos tipos de threads: productores y consumidores. Usa wait() y notify() para controlar la sincronización. Cuando el almacén esté lleno, los productores deben esperar; cuando esté vacío, los consumidores deben esperar.

Ejemplo de Ejecución:

- Los productores llenan el almacén hasta su capacidad máxima.
- Los productores entran en espera.
- Un consumidor recoge un producto y notifica a los productores.
- Un productor se reanuda y produce otro producto.

### 09 LectorEscritor

Un sistema de base de datos permite múltiples lectores pero solo un escritor a la vez. Además, si un escritor está escribiendo, los lectores deben esperar.

Implementa un control de acceso para lectores y escritores usando sincronización. Los lectores pueden acceder simultáneamente, pero un escritor debe tener acceso exclusivo. Usa locks y condiciones para gestionar el acceso.

Ejemplo de Ejecución:

- Varios lectores acceden a la base de datos simultáneamente.
- Un escritor solicita acceso, los lectores actuales pueden terminar, pero los nuevos lectores esperan.
- El escritor accede y realiza sus operaciones.
- Los lectores reanudan el acceso una vez que el escritor ha terminado.


### 10 Recargar globos de agua

En un parque, un grupo de niños juega una batalla de globos de agua. Para continuar jugando, cada niño necesita recargar sus globos en una fuente del parque. La fuente solo puede ser utilizada por un niño a la vez. Cada niño tiene asignado un símbolo único (como una letra o un número) para identificarse.

Desarrollar un programa que simule a los niños recargando sus globos de agua en la fuente. Debes asegurarte de que nunca haya más de un niño en la fuente al mismo tiempo.

Implementa un sistema de threads, donde cada thread representa a un niño. Usa técnicas de sincronización para controlar el acceso a la fuente. Cuando un niño (thread) accede a la fuente, el programa debe imprimir "ENTRA(sim)-RECARGA-SALE(sim)", donde "sim" es el símbolo único del niño.

Cuando un niño está jugando imprime su letra o símbolo.

Ejemplo de ejecución:

```text
jdnchdncjdnhcndjhcnjdhcnjfhncd
ENTRA(sim)-RECARGA-SALE(sim)
```

Reglas de Sincronización:

Solo un niño puede estar en la fuente a la vez.
Cada niño debe esperar su turno si la fuente está ocupada.
La secuencia de eventos para cada niño en la fuente es:
ENTRA(sim): El niño entra a la fuente.
RECARGA: El niño recarga sus globos.
SALE(sim): El niño sale de la fuente.
Ejemplo de Ejecución:

Niño A con el símbolo "A" se acerca a la fuente.
El programa imprime "ENTRA(A)-RECARGA-SALE(A)".
Niño B con el símbolo "B" espera mientras A está recargando.
Una vez que A sale, B entra y el programa imprime "ENTRA(B)-RECARGA-SALE(B)".
Consideraciones Adicionales:

Puedes usar synchronized en Java o mutex/semáforos en C para la sincronización.
Asegúrate de manejar adecuadamente la espera y notificación entre los threads.
Considera agregar un tiempo de espera aleatorio para simular el tiempo que cada niño tarda en recargar sus globos.

## PARAREVISAR

Ideas de enunciado

Niño juegan en el paruqe y tienen que recargar los globos de agua en la fuente. Cada niño escribe un símbolo, al entrar en la fuente se escribe ENTRA(sim)-RECARGA-SALE(sim)
Nunca debe haber más de un niño recargando en la fuente.


Dos equipos tirando de la cuerda. 

Comunicación entre Hilos:

Crea dos hilos que se comuniquen entre sí usando los métodos wait y notify, de tal manera que uno imprima los números impares y el otro imprima los números pares del 1 al 10.

Manejo de Excepciones de Hilos:

Crea un hilo que lance una excepción RuntimeException. Captura y maneja la excepción usando un UncaughtExceptionHandler.