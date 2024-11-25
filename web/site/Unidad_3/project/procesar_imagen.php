<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesar Imagen</title>
</head>
<body>
    <h1>Resultado de la Subida de la Imagen</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Comprobar si se ha enviado un archivo
        if (isset($_FILES["imagen"]) && $_FILES["imagen"]["error"] == 0) {
            $imagen = $_FILES["imagen"];
            $nombreTemporal = $imagen["tmp_name"];
            $nombreArchivo = basename($imagen["name"]);
            $tipoArchivo = $imagen["type"];
            $directorioDestino = "uploads/";

            // Validar que el archivo sea una imagen
            $tiposPermitidos = ["image/jpeg", "image/png", "image/gif"];
            if (in_array($tipoArchivo, $tiposPermitidos)) {
                // Asegurarse de que el directorio exista
                if (!file_exists($directorioDestino)) {
                    mkdir($directorioDestino, 0755, true);
                }

                // Mover el archivo al directorio de destino
                $rutaArchivo = $directorioDestino . $nombreArchivo;
                if (move_uploaded_file($nombreTemporal, $rutaArchivo)) {
                    echo "<p style='color: green;'>La imagen <strong>$nombreArchivo</strong> se ha subido correctamente.</p>";
                    // Mostrar la imagen en la página
                    echo "<h2>Vista previa de la imagen:</h2>";
                    echo "<img src='$rutaArchivo' alt='Imagen subida' style='max-width: 500px; max-height: 500px;'>";
                } else {
                    echo "<p style='color: red;'>Hubo un error al guardar la imagen.</p>";
                }
            } else {
                echo "<p style='color: red;'>Error: Solo se permiten archivos de imagen (JPEG, PNG, GIF).</p>";
            }
        } else {
            echo "<p style='color: red;'>No se seleccionó ninguna imagen o hubo un error en la subida.</p>";
        }
    } else {
        echo "<p style='color: red;'>No se ha enviado el formulario correctamente.</p>";
    }
    ?>
</body>
</html>
