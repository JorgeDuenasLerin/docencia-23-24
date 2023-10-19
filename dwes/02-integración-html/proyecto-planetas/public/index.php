<?php 
include('../config/init.php');
include(DOC_ROOT."/src/data.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>Bienvenido al gestior de sistemas planetario</h1>
        <div>
            <h2>Planetas individuales</h2>
            <?=$planeta->toEdit()?>
        </div>
        <div>
            <h2>Detalle</h2>
            <?=$sp->toSelect($paraMostrarNombre)?>
            <?php if($paraMostrar) { 
                echo "<p>$paraMostrar</p>";
            } ?>
        </div>
        <div>
            <h2>Listado</h2>
            <?= $sp->toTable() ?>
        </div>
    </div>

</body>
</html>