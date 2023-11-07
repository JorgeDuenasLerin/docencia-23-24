<?php 

try {
    $db = new PDO('mysql:host=localhost;dbname=clase','alumno','1234');

    $consulta = $db->prepare("SELECT * FROM usuarios");
    $resultado = $consulta->execute();
    $data = $consulta->fetchAll();
    
} catch(PDOException $e) {
    echo "ERROR:" . $e->getMessage();
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if($resultado) { ?>
        <?php foreach($data as $row)  {
            echo $row['id'] . " - " . $row['nombre'] . " - " . $row['pass'] . " - " . $row['perfil_img'] . "<br>";
        } ?>
    <?php } else { ?>
        <h1>No se han obtenido resultados</h1>
    <?php } ?>
    
</body>
</html>