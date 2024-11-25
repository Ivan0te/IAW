<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Imagen y Archivo de Texto</title>
</head>
<body>
    <h1>Subir una Imagen y un Archivo de Texto</h1>
    <form method="POST" action="procesar_imagen_texto.php" enctype="multipart/form-data">
        <label for="imagen">Selecciona una imagen:</label><br>
        <input type="file" id="imagen" name="imagen" accept="image/*"><br><br>
        
        <label for="texto">Selecciona un archivo de texto:</label><br>
        <input type="file" id="texto" name="texto" accept=".txt"><br><br>

        <button type="submit">Subir Archivos</button>
    </form>
</body>
</html>
