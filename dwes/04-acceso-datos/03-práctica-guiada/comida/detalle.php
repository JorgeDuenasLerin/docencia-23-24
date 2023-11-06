<?php 

if(isset($_GET['id']) && is_numeric($_GET['id'])){
    $id = $_GET['id'];
}else{
    // LOG
    header('Location: 404.html');
    die();
}

try {
    $db = new PDO('mysql:host=localhost;dbname=menosdaw','menosdaw','1234');
    $consulta = $db->prepare("SELECT * FROM Comida WHERE id = :id ");
    $consulta->bindParam(":id", $id, PDO::PARAM_INT);
    $resultado = $consulta->execute();
    
    if($resultado){
        $receta = $consulta->fetch();
    } else{
        $receta = null;
    }
    
    //print_r($receta);

}catch(PDOException $e){
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
    <?php if($receta==null) { ?>
        <h1>La receta no existe</h1>
    <?php } else { ?>
        <h1><?=$receta['nombre']?></h1>
        <h2><?=$receta['calorias']?></h2>
        <div><?=$receta['receta']?></div>
    <?php } ?>
</body>
</html>