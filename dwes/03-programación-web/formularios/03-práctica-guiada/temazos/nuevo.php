<?php 

$temazo="";
$hora=date("h");
$min=date("i");

$opcionesMinuto = [0,15,30,45];

$mayores = array_filter($opcionesMinuto,function($m){
    global $min;
    return $m > $min;
});

if(empty($mayores)) {
    $min = 0;
    $hora++;
} else {
    $min = array_shift($mayores);
}

$errores = [];

// Ver si el usuario envía la información
if(isset($_POST['enviar'])) {

    // Verificar errores
    if(isset($_POST['temazo']) && $_POST['temazo']  != ""){
        $temazo = $_POST['temazo'];
    } else {
        $errores['temazo'] = 'No puede estar vacío';
    }

    if(isset($_POST['hora']) && $_POST['hora']  != ""){
        $hora = $_POST['hora'];
    } else {
        $errores['hora'] = 'No puede estar vacío';
    }

    if(isset($_POST['min']) && $_POST['min']  != ""){
        $min = $_POST['min'];
    } else {
        $errores['min'] = 'No puede estar vacío';
    }

    if(count($errores) == 0) {
        // Guardo
        file_put_contents(
            "temazos.csv",
            "$temazo;$hora;$min\n",
            FILE_APPEND
        );
        // redirect
        header("Location: listado.php");
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .error {
            color: red;
            font-size: 0.7em;
            margin-bottom: 0.5em;
        }

        .error p {
            margin: 0;
        }
    </style>
</head>
<body>
    <h1>Never Ending Party</h1>
    <form action="" method="post">
        <label for="cancion">Temazo</label>
        <input type="text" name="temazo" id="cancion" value="<?=$temazo?>" placeholder="Pon tu temazo"><br>
        <?php 
            if(isset($errores['temazo'])){
                echo '<div class="error">';
                echo '<p>'.$errores['temazo'].'</p>';
                echo '</div>';
            }
        ?>
        <label for="hora">H</label>
        <input type="number" name="hora" value="<?=$hora?>" max="23" min="0" size="1" id="hora">
        <label for="min">mm</label>
        <select name="min" id="min">
            <?php 
                array_walk(
                    $opcionesMinuto,
                    function($op, $k, $d){
                        $sel = ($op==$d)?"selected":"";
                        echo "<option value='$op' $sel>$op</option>";
                    },
                    $min
                );
            ?>
        </select>
        <?php 
            if(isset($errores['hora'])){
                echo '<div class="error">';
                echo '<p>'.$errores['hora'].'</p>';
                echo '</div>';
            }
            if(isset($errores['min'])){
                echo '<div class="error">';
                echo '<p>'.$errores['min'].'</p>';
                echo '</div>';
            }
        ?>
        <input type="submit" value="Enviar" name="enviar">
    </form>
</body>
</html>