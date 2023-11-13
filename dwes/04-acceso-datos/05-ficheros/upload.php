<?php
echo "<pre>";
print_r($_FILES);
echo "</pre>";

define('MAX_SIZE', 500000);

$target_dir = "uploads/";  // Directorio donde se subirán las imágenes.
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]); // uploads/gato.jpg
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Verifica si el archivo es una imagen real.
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "El archivo es una imagen - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "El archivo no es una imagen.";
        $uploadOk = 0;
    }
}

// Verifica si el archivo ya existe.
if (file_exists($target_file)) {
    echo "Lo siento, la imagen ya existe.";
    $uploadOk = 0;
}

// Verifica el tamaño del archivo.
if ($_FILES["fileToUpload"]["size"] > MAX_SIZE) {  // por ejemplo, 500KB
    echo "Lo siento, tu archivo es demasiado grande.";
    $uploadOk = 0;
}

// Permite ciertos formatos de archivo.
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    echo "Solo se permiten archivos JPG, JPEG, PNG & GIF.";
    $uploadOk = 0;
}

// Verifica si $uploadOk está establecido en 0 por un error.
if ($uploadOk == 0) {
    echo "Tu archivo no fue subido.";
// Si todo está bien, intenta subir el archivo.
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "La imagen ". basename( $_FILES["fileToUpload"]["name"]). " ha sido subida.";
    } else {
        echo "Hubo un error al subir tu archivo.";
    }
}
?>