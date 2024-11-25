<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Imagen</title>
</head>
<body>
    <h1>Subir una Imagen</h1>
    <form method="POST" action="procesar_imagen.php" enctype="multipart/form-data">
        <label for="imagen">Selecciona una imagen:</label><br>
        <input type="file" id="imagen" name="imagen" accept="image/*"><br><br>
        <button type="submit">Subir Imagen</button>
    </form>
</body>
</html>
