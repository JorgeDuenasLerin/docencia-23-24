<?php 

/*
echo "<pre>";
print_r($_POST);
echo "</pre>";
*/

define('MIN_DESCRIPTION', 10);
define('FILE_DATA', 'data.csv');

$msg = "";
if(isset($_GET['msg'])) {
    $msg = $_GET['msg'];
}

/*
if the user submited the form
if there are form errors
    fill errors array
else
    record data to database
    302 regirect, as it required by HTTP standard
    exit
if we have some errors
display errors
fill form field values
display the form
*/

$titulo = "";
$descripcion = "";
$fecha = "";
$permanente = "";
$nombre = "";

$errores = [];

if(isset($_POST['enviar'])){
    if(isset($_POST['titulo']) && $_POST['titulo'] != ""){
        $titulo = $_POST['titulo'];
    } else {
        $errores['titulo'] = "es obligatorio";
    }

    if(isset($_POST['descripcion']) && $_POST['descripcion'] != ""){
        $descripcion = $_POST['descripcion'];
        if(strlen($_POST['descripcion'])<MIN_DESCRIPTION){
            $errores['descripcion'] = "longitud mínima de ".MIN_DESCRIPTION;
        }        
    } else {
        $errores['descripcion'] = "es obligatorio";
    }

    if(isset($_POST['fecha']) && $_POST['fecha'] != ""){
        $fecha = $_POST['fecha'];
        $hoy = new DateTime("now");
        if($hoy < new DateTime($fecha)){
            $errores['fecha'] = "deja de proyectar. Todavía no ha ocurrido.";
        }
    }

    if(isset($_POST['permanente']) && $_POST['permanente'] != ""){
        $permanente = $_POST['permanente'];//on
    }

    if(
        ($permanente == "" && $fecha == "") || 
        ($permanente != "" && $fecha != "")
    ){
        $errores['momento'] = "debes elegir uno de estos dos";
    }

    if(isset($_POST['nombre']) && $_POST['nombre'] != ""){
        $nombre = $_POST['nombre'];
    }

    // ¿Hay errores?
    if(empty($errores)) {
        // $App::getDBCOnection("INSERTS-.--....");
        $data = file_get_contents(FILE_DATA);
        $fila = "\n$titulo;$descripcion;".(($permanente!="")?"permanente":$fecha).";$nombre";
        $data .= $fila;
        file_put_contents(FILE_DATA, $data);

        header("Location: index.php?msg=success");
        die(0);
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        span.error {
            color: red;
            font-size: 0.8em;
        }

        h1.success {
            color: green;
        }
    </style>
</head>
<body>
    <?php if ($msg!="") { 
        echo "<h1 class='success'>$msg</h1>";
    }?>
    <form action="" method="post">
        <label for="titulo">Título*</label>
        <?php if(isset($errores['titulo'])) { ?>
            <span class="error"><?=$errores['titulo']?></span>
        <?php } ?>
        <br>
        <input type="text" name="titulo" placeholder="Incidencia" value="<?=$titulo?>"><br>
        
        <label for="descripcion">Descripción*</label>
        <?php if(isset($errores['descripcion'])) { ?>
            <span class="error"><?=$errores['descripcion']?></span>
        <?php } ?>
        <br>
        <textarea name="descripcion" id="" cols="30" rows="10" placeholder="Por favor, cuentanos qué sucede..."><?=$descripcion?></textarea><br>
        ---- elige uno ----
        <?php if(isset($errores['momento'])) { ?>
            <span class="error"><?=$errores['momento']?></span>
        <?php } ?>
        <br>
        <label for="fecha">¿Cuándo ocurrió?</label>
        <?php if(isset($errores['fecha'])) { ?>
            <span class="error"><?=$errores['fecha']?></span>
        <?php } ?>
        <br>
        <input type="date" name="fecha" value="<?=$fecha?>"><br>
        <label for="permanente">Permanente</label><input type="checkbox" name="permanente" <?=($permanente!="")?'checked':''?>><br>
        ---- opcionales ----<br>
        <label for="nombre">Nombre</label><br>
        <input type="nombre" name="nombre" placeholder="Di tu nombre" value="<?=$nombre?>"><br><br>
        <input type="submit" name="enviar" value="Enviar">
    </form>
</body>
</html>