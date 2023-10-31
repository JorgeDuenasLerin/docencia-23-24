<?php
/*
PDO
=========================================
testConnectionPDO.php
 */

try {
    $mbd = new PDO('mysql:host=localhost;dbname=proyecto01_juan_de_la_cierva', "juan", "cierva1234");

    // Utilizar la conexión aquí
    $resultado = $mbd->query('SELECT * FROM cosas');

    foreach ($resultado as $fila){
      foreach ($fila as $clave => $valor){
        echo $clave . " " . $valor . "\n";
      }
      echo "--------------\n"
    }

    // Ya se ha terminado; se cierra
    $resultado = null;
    $mbd = null;

} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "\n";
    die();
}

?>
