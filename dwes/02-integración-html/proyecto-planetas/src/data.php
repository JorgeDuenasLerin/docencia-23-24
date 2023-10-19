<?php 

$sp = new SistemaPlanetario();
if(file_exists(FILE_NAME)) {
    $sp->load();
}

// Lógica de aplicación

$planeta = new Planeta();

if(isset($_POST['guardar'])){
    $planetaAInsertar = new Planeta(
                    $_POST['nombre'],
                    $_POST['distancia'],
                    $_POST['diametro'],
                    $_POST['masa']
                );
    $sp->add($planetaAInsertar);
    /*
    if($sp->contains($planetaAInsertar->nombre)){
        $sp->update($planetaAInsertar->nombre, $planetaAInsertar);
    } else {
        $sp->add($planetaAInsertar);
    }
    */
}

$paraMostrar=NULL;
$paraMostrarNombre='';
if(isset($_POST['mostrar'])){
    $paraMostrar = $sp->detail($_POST['mostrar']);
    if(!is_string($paraMostrar)){
        $paraMostrarNombre = $paraMostrar->nombre;
    }
}
// NULL, "No encontrado", un planeta
// $paraMostrarNombre el nombre o ''

if(isset($_GET['nombre'])){
    $p = $sp->detail($_GET['nombre']);
    if(!is_string($p)){
        $planeta = new Planeta(
            $p->nombre,
            $p->distancia,
            $p->diametro,
            $p->masa,
        );
    }
}

$sp->save();
?>