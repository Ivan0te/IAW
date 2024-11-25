<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Varios Archivos de Texto</title>
</head>
<body>
    <h1>Subir Varios Archivos de Texto</h1>
    <form method="POST" action="procesar_varios_archivos.php" enctype="multipart/form-data">
        <label for="archivos">Selecciona varios archivos de texto:</label><br>
        <input type="file" id="archivos" name="archivos[]" accept=".txt" multiple><br><br>
        <button type="submit">Subir Archivos</button>
    </form>
</body>
</html>
