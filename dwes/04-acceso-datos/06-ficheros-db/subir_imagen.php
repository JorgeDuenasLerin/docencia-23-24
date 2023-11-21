<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Imagen de Perfil</title>
</head>
<body>

<form action="procesar_subida.php" method="post" enctype="multipart/form-data">
    Selecciona una imagen de perfil:
    <input type="text" name="name" id="name"><br>
    <input type="file" name="imagen_perfil" id="imagen_perfil"><br>
    <input type="submit" value="Subir Imagen" name="submit">
</form>

</body>
</html>