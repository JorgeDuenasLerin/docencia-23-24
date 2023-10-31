Conexión con Base de datos
============================

Como se explicó en el anterior tema cada SGDB implementa su propio protocolo.
Debido a ello cada lenguaje de programación tiene su propia librería.

En el caso de PHP tenemos incluso distintos librerías, en estas prácticas nos
centraremos en las conexiones desde PHP a MySQL a través de Objetos de Datos de PHP

ver:
https://www.php.net/manual/es/intro.pdo.php


PHP usando PDO
================================

Crear conexión
<?php
try{
  $usuario = xxx;
  $password = xxx;
  $conn = new PDO('mysql:host=localhost;dbname=xxx', $usuario, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e){
  echo "ERROR: " . $e->getMessage();
}
?>

Como estamos usando el interfaz PDO en caso de querer conectarme con otra base
de datos solo debería cambiar el constructor y el resto del código no cambiaría.

## POSTGRESQL
$conn = new PDO('pgsql:host=localhost;port=5432;dbname=xxx', $usuario, $password);
## ORACLE
$conn = new PDO("oci:dbname".$nombredb,$usuario,$password);





## PDO

testConnectionPDO.php
<?php

try {
    $mbd = new PDO('mysql:host=localhost;dbname=proyecto01_juan_de_la_cierva', "juan", "cierva1234");

    // Utilizar la conexión aquí
    $resultado = $mbd->query('SELECT * FROM cosas');

    foreach ($resultado as $fila){
      foreach ($fila as $clave => $valor){
        echo $clave . " " . $valor . "<br/>";
      }
      echo "--------------<br/>"
    }

    // Ya se ha terminado; se cierra
    $sth = null;
    $mbd = null;

} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>
