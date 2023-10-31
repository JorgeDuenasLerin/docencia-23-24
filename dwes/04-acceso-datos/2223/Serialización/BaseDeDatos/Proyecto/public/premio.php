<?php

/*

ESTO ES UN EJEMPLO DE CÓMO PASAR LA INFORMACIÓN ENTRE PÁGINAS

NO ES UN SISTEMA DE LOGIN
NO ES UN SISTEMA DE LOGIN
NO ES UN SISTEMA DE LOGIN
NO ES UN SISTEMA DE LOGIN
NO ES UN SISTEMA DE LOGIN
NO ES UN SISTEMA DE LOGIN
NO ES UN SISTEMA DE LOGIN

*/

if( $_GET["redirigido"] ){
    header('Location: login004.php');
    exit;
}

?>
<html>
<head>
  <link rel="stylesheet" type="text/css" media="all" href="css/estilo.css">
</head>
<body>
<h1>Bienvenido!!</h1>
<img src="img/starstudent.png" />
</body>
</html>
