<?php 

define('NUM_COLUMNS', 3);
define('NUM_ELEM_POR_PAG', 4);

if(isset($_GET['orderby']) && is_numeric($_GET['orderby']) && 1 <= $_GET['orderby'] && $_GET['orderby'] <= NUM_COLUMNS){
    $orderby = $_GET['orderby'];
} else {
    // LOGGEAR
    $orderby = 1;
}

if(isset($_GET['order'])){
    if($_GET['order']=="ASC"){
        $order = 'ASC';    
    }else{
        $order = 'DESC';
    }
} else {
    $order = 'ASC';
}

if(isset($_GET['page']) && is_numeric($_GET['page'])){ 
    $page = $_GET['page'];
} else {
    $page = 1;
}


try {
    $db = new PDO('mysql:host=localhost;dbname=menosdaw','menosdaw','1234');

    $consulta = $db->prepare("SELECT id, nombre, calorias FROM Comida ORDER BY :orderby $order LIMIT :limite OFFSET :offset"); // SQLi
    $consulta->bindParam(':orderby', $orderby, PDO::PARAM_INT);
    $consulta->bindValue(':limite', NUM_ELEM_POR_PAG, PDO::PARAM_INT);
    $consulta->bindValue(':offset', NUM_ELEM_POR_PAG*($page-1), PDO::PARAM_INT);
    $results = $consulta->execute();
    $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);

    $consulta_count = $db->query("SELECT Count(id) AS N FROM Comida");
    $count = $consulta_count->fetch();
    $count = $count[0];
    $num_pages = ceil($count/NUM_ELEM_POR_PAG);

}catch(PDOException $e){
    echo "ERROR:" . $e->getMessage();
    die();
}

function generateQueryString($orderapintar, $orderby, $order){
    if($orderapintar == $orderby){ // invertir orden
        $neworder = ($order=="ASC")?"DESC":"ASC";
        return "?orderby=$orderapintar&order=$neworder";
    }else{
        return "?orderby=$orderapintar&order=ASC";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: black;
            color: white;
        }
        table {
            margin: auto;
        }
        table tr td a{
            color: white;
        }
        table, table td, table th{
            border: 1px solid grey;
            border-collapse: collapse;
            padding: 0.2em;
        }
        div.contenido {
            min-height: 110px;
        }
        div.paginacion a{
            text-decoration: none;
        }
        div.paginacion{
            margin: auto;
            text-align: center;
        }
        div.paginacion a.actual{
            font-weight: bold;
            color: #00ceff;
        }
        a, a:visited {
            color: #F0F;
        }
    </style>
</head>
<body>
    <div class="contenido">
    <table>
        <tr>
            <th><a href="<?=generateQueryString(1, $orderby, $order)?>">Id</a></th>
            <th><a href="<?=generateQueryString(2, $orderby, $order)?>">Nombre</a></th>
            <th><a href="<?=generateQueryString(3, $orderby, $order)?>">Calorias</a></th>
        </tr>
        <?php foreach($datos as $dato) { ?>
        <tr>
            <td><?=$dato['id']?></td>
            <td><a href="detalle.php?id=<?=$dato['id']?>"><?=$dato['nombre']?></a></td>
            <td><?=$dato['calorias']?></td>
        </tr>
        <?php } ?>
    </table>
    </div>
    <div class="paginacion">
        <?php for($i=1;$i<=$num_pages;$i++) { ?>
            <span><a <?=($i==$page)?"class='actual'":""?> href="?page=<?=$i?>&orderby=<?=$orderby?>&order=<?=$order?>"><?=$i?></a></span>
        <?php } ?>
    </div>
</body>
</html>