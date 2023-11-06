<?php 
$acceso = 0;

try {
    $db = new PDO('mysql:host=localhost;dbname=clase','alumno','1234');

    $n = '';
    $p = '';

    if(isset($_POST['enviar'])){
        $n = $_POST['nombre'];
        $p = $_POST['pass'];

        $consulta = $db->prepare("SELECT * FROM usuarios WHERE nombre = '$n' and pass = '$p' LIMIT 1");
        
        $resultado = $consulta->execute();
        print_r($consulta);
        if($resultado){
            $u = $consulta->fetch();
            if($u != null){
                print_r($u);
            }         
        } else{
            $u = null;
        }
    }
    
} catch(PDOException $e) {
    echo "ERROR:" . $e->getMessage();
    die();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if ($acceso) { ?>
    <h1>Área secreta</h1>
    <p>balbla</p>
    <?php } else {?>
    <h1>User y password para área</h1>
    <form action="" method="post">
    Nombre: <input type="text" name="nombre" value="<?=$n?>"><br>
    Contra: <input type="text" name="pass" value="<?=$p?>"><br>
    <input type="submit" name="enviar" value="Enviar">
    </form>
    <?php } ?>
</body>
</html>