<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Envío de Archivo</title>
</head>
<body>
    <h1>Enviar un archivo de texto</h1>
    <form method="POST" action="procesar_fichero.php" enctype="multipart/form-data">
        <label for="archivo">Selecciona un archivo de texto:</label><br>
        <input type="file" id="archivo" name="archivo" accept=".txt"><br><br>
        <button type="submit">Subir Archivo</button>
    </form>
</body>
</html>
