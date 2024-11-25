<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesar Archivo</title>
</head>
<body>
    <h1>Resultado de la Subida del Archivo</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Comprobar si se ha enviado un archivo
        if (isset($_FILES["archivo"]) && $_FILES["archivo"]["error"] == 0) {
            $archivo = $_FILES["archivo"];
            $nombreTemporal = $archivo["tmp_name"];
            $nombreArchivo = basename($archivo["name"]);
            $tipoArchivo = $archivo["type"];
            $directorioDestino = "uploads/";

            // Validar que el archivo sea de tipo texto
            if ($tipoArchivo == "text/plain") {
                // Asegurarse de que el directorio exista
                if (!file_exists($directorioDestino)) {
                    mkdir($directorioDestino, 0755, true);
                }

                // Mover el archivo al directorio de destino
                $rutaArchivo = $directorioDestino . $nombreArchivo;
                if (move_uploaded_file($nombreTemporal, $rutaArchivo)) {
                    echo "<p style='color: green;'>El archivo <strong>$nombreArchivo</strong> se ha subido correctamente.</p>";

                    // Leer y mostrar el contenido del archivo
                    $contenido = file_get_contents($rutaArchivo);
                    echo "<h2>Contenido del archivo:</h2>";
                    echo "<pre>$contenido</pre>";
                } else {
                    echo "<p style='color: red;'>Hubo un error al guardar el archivo.</p>";
                }
            } else {
                echo "<p style='color: red;'>Error: Solo se permiten archivos de texto (.txt).</p>";
            }
        } else {
            echo "<p style='color: red;'>No se seleccionó ningún archivo o hubo un error en la subida.</p>";
        }
    } else {
        echo "<p style='color: red;'>No se ha enviado el formulario correctamente.</p>";
    }
    ?>
</body>
</html>
