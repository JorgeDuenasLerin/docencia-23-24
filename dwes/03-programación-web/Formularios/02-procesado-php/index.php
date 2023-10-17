<?php

//echo "<pre>";
//print_r($_SERVER);
//echo "</pre>";

$saludo = "Hola";
$ip = $_SERVER['HTTP_X_REAL_IP'];

$langs = explode(",", $_SERVER['HTTP_ACCEPT_LANGUAGE']);
//echo "<pre>";
//print_r($langs);
//echo "</pre>";

if(!in_array("es",$langs)) {
    $saludo = "Hi";
}

$msg = "$saludo: $ip";
?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1><?=$msg?></h1>
  </body>
</html>
