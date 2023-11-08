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

Modifica el programa anterior para que cree un array de N Threads y los espere. A cada thread le dará un nombre (Método setName)

### 03 Los elefantes...

```text
Un elefante se balanceaba sobre la tela de una araña
Como veía que resistía, fue a llamar otro elefante
Dos elefantes se balanceaban sobre la tela de una araña
Como veían que resistía, fueron a llamar otro elefante
```

Basándote en esa canción, crea un Thread que reciba el tipo de animal, la acción y el número máximo. Cada vez que escriba una estrofa, el thread generará un número aleatorio entre 100000 y 300000 y verificará si es primo.

Crea un programa principal que gestion 3 canciones infantiles de forma concurrente con distintas prioridades (setPriority)


*PARAREVISAR*


Crea dos hilos y asigna una prioridad alta a uno y una prioridad baja al otro usando el método setPriority. Luego, imprime la prioridad de cada hilo en la consola.
Dormir un Hilo (Sleep):

Crea un hilo que imprima los números del 1 al 5, haciendo una pausa de un segundo entre cada número usando el método sleep.
Unir Hilos (Join):

Crea dos hilos donde el primer hilo imprima los números del 1 al 5 y el segundo hilo imprima los números del 6 al 10. Asegúrate de que el segundo hilo comience después de que el primer hilo haya terminado usando el método join.
Sincronización de Métodos:

Crea una clase Counter con un método sincronizado increment que incremente una variable count. Crea dos hilos que incrementen el contador y observa el resultado.
Sincronización de Bloques:

Modifica la clase Counter anterior para usar un bloque sincronizado en lugar de un método sincronizado.
Comunicación entre Hilos:

Crea dos hilos que se comuniquen entre sí usando los métodos wait y notify, de tal manera que uno imprima los números impares y el otro imprima los números pares del 1 al 10.
Manejo de Excepciones de Hilos:

Crea un hilo que lance una excepción RuntimeException. Captura y maneja la excepción usando un UncaughtExceptionHandler.


Un elefante se balanceaba sobre la tela de una araña
Como veía que resistía, fue a llamar otro elefante
Dos elefantes se balanceaban sobre la tela de una araña
Como veían que resistía, fueron a llamar otro elefante