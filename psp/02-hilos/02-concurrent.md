# java.util.concurrent

El paquete java.util.concurrent en Java proporciona clases y interfaces que ayudan a gestionar la concurrencia en programas.

## Ejemplos

Executor Framework:
Clases involucradas: ExecutorService, Executors.
Descripción: El framework Executor proporciona una forma de gestionar y controlar los hilos, ofreciendo una alternativa al uso de Thread y Runnable directamente.
Uso: Útil cuando se tiene una cantidad conocida de tareas que deben ser ejecutadas en paralelo, y se desea controlar el número de hilos utilizados.


java

import java.util.concurrent.*;

public class ExecutorExample {
    public static void main(String[] args) {
        ExecutorService executor = Executors.newFixedThreadPool(2);
        Runnable task1 = () -> System.out.println("Task 1 ejecutado");
        Runnable task2 = () -> System.out.println("Task 2 ejecutado");
        executor.submit(task1);
        executor.submit(task2);
        executor.shutdown();
    }
}




Callable y Future:

Clases involucradas: Callable, Future.
Descripción: Callable es similar a Runnable, pero puede devolver un resultado o lanzar excepciones. Future representa el resultado de un cálculo que aún no ha sido completado.
Uso: Útil cuando se tienen tareas que deben devolver un resultado y/o lanzar excepciones.


import java.util.concurrent.*;

public class CallableFutureExample {
    public static void main(String[] args) throws ExecutionException, InterruptedException {
        ExecutorService executor = Executors.newFixedThreadPool(2);
        Callable<Integer> task = () -> {
            return 42;
        };
        Future<Integer> future = executor.submit(task);
        System.out.println(future.get());
        executor.shutdown();
    }
}


BlockingQueue:


Clases involucradas: BlockingQueue, ArrayBlockingQueue.
Descripción: BlockingQueue es una cola que soporta operaciones de espera cuando se intenta insertar o recuperar elementos.
Uso: Útil en escenarios de productor-consumidor donde los productores y consumidores deben coordinarse.


import java.util.concurrent.*;

public class BlockingQueueExample {
    public static void main(String[] args) throws InterruptedException {
        BlockingQueue<Integer> queue = new ArrayBlockingQueue<>(10);
        queue.put(42);
        System.out.println(queue.take());
    }
}


Semaphore:
Clases involucradas: Semaphore.
Descripción: Semaphore es utilizado para controlar el acceso a recursos compartidos por múltiples hilos.
Uso: Útil cuando se tienen recursos limitados y se desea controlar el acceso a ellos, como conexiones a una base de datos.


import java.util.concurrent.*;

public class SemaphoreExample {
    public static void main(String[] args) {
        Semaphore semaphore = new Semaphore(2);
        Runnable task = () -> {
            try {
                semaphore.acquire();
                System.out.println("Permiso adquirido");
                Thread.sleep(2000);
                semaphore.release();
            } catch (InterruptedException e) {
                e.printStackTrace();
            }
        };
        new Thread(task).start();
        new Thread(task).start();
    }
}


CountDownLatch:

Clases involucradas: CountDownLatch.
Descripción: CountDownLatch permite a uno o más hilos esperar hasta que se alcance un conteo específico.
Uso: Útil en situaciones donde se desea esperar hasta que cierto número de operaciones sean completadas antes de proceder.

java
Copy code
import java.util.concurrent.*;

public class CountDownLatchExample {
    public static void main(String[] args) {
        CountDownLatch latch = new CountDownLatch(3);
        Runnable task = () -> {
            latch.countDown();
            System.out.println("Cuenta atrás: " + latch.getCount());
        };
        new Thread(task).start();
        new Thread(task).start();
        new Thread(task).start();
    }
}


CyclicBarrier:

Clases involucradas: CyclicBarrier.
Descripción: CyclicBarrier permite a un grupo de hilos esperar hasta que todos alcancen una barrera común.
Uso: Útil en situaciones donde varios hilos deben esperar hasta que todos lleguen a un punto específico antes de proceder.


java
Copy code
import java.util.concurrent.*;

public class CyclicBarrierExample {
    public static void main(String[] args) {
        CyclicBarrier barrier = new CyclicBarrier(3, () -> System.out.println("Barrera alcanzada"));
        Runnable task = () -> {
            try {
                System.out.println("Esperando en la barrera");
                barrier.await();
                System.out.println("Barrera superada");
            } catch (InterruptedException | BrokenBarrierException e) {
                e.printStackTrace();
            }
        };
        new Thread(task).start();
        new Thread(task).start();
        new Thread(task).start();
    }
}


ScheduledExecutorService:

Clases involucradas: ScheduledExecutorService.
Descripción: Permite la ejecución de tareas en un horario específico o en intervalos regulares.
Uso: Útil cuando se tienen tareas que deben ser ejecutadas periódicamente o en un momento específico en el futuro.

java
Copy code
import java.util.concurrent.*;

public class ScheduledExecutorExample {
    public static void main(String[] args) {
        ScheduledExecutorService executor = Executors.newScheduledThreadPool(2);
        Runnable task = () -> System.out.println("Tarea ejecutada");
        executor.scheduleAtFixedRate(task, 0, 2, TimeUnit.SECONDS);
    }
}


## Ejercicios

