<?php

try {
    $db = new PDO('mysql:host=localhost;dbname=menosdaw','menosdaw','1234');
}catch(PDOException $e){
    echo "ERROR:" . $e->getMessage();
    die();
}

$directorio = "uploads/";

if(isset($_FILES["imagen_perfil"])){
    
    $archivo = $directorio . basename($_FILES["imagen_perfil"]["name"]);
    $nombreArchivo = basename($_FILES["imagen_perfil"]["name"]);
    $formatoImagen = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
    
    // Verifica si es una imagen real o una imagen falsa
    $check = getimagesize($_FILES["imagen_perfil"]["tmp_name"]);
    if($check !== false) {
        $subir = 1;
    } else {
        echo "El archivo no es una imagen.";
        $subir = 0;
    }

    // Si el archivo ya existe, añadir un número al final
    $contador = 1;
    while (file_exists($archivo)) {
        $nombreSinExtension = pathinfo($nombreArchivo, PATHINFO_FILENAME);
        $archivo = $directorio . $nombreSinExtension . '-' . $contador . '.' . $formatoImagen;
        $contador++;
    }

    //TODO: Faltan verificaciones de tamaño y tipo.

    if ($subir == 1) {
        if (move_uploaded_file($_FILES["imagen_perfil"]["tmp_name"], $archivo)) {
            // Guardar la ruta de la imagen en la base de datos
            // TODO: 

            $sql = "UPDATE usuarios (perfil_img) VALUES (:path_imagen_perfil)";
            $conn->prepare($sql);

            /*
            if ($conn->query($sql) === TRUE) {
                echo "La imagen ". basename($_FILES["imagen_perfil"]["name"]). " ha sido subida.";
            } else {
                echo "Error al guardar la imagen en la base de datos: " . $conn->error;
            }*/
            
        } else {
            echo "Hubo un error al subir tu archivo.";
        }
    }
}

$conn->close();

?>