<?php

$mysqli = new mysqli("127.0.0.1", "juan", "cierva1234", "proyecto01_juan_de_la_cierva");
if ($mysqli->connect_errno) {
    echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}


$resultado = $mysqli->query("SELECT * FROM cosas");

foreach ($resultado as $fila){
  foreach ($fila as $clave => $valor){
    echo $clave . " " . $valor . "<br/>";
  }
  echo "--------------<br/>"
}

$mysqli.close();
?>
