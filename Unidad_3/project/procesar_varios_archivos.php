<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesar Archivos</title>
</head>
<body>
    <h1>Resultado de la Subida de Archivos</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Comprobar si se han enviado archivos
        if (isset($_FILES["archivos"])) {
            $archivos = $_FILES["archivos"];
            $totalArchivos = count($archivos["name"]);
            $directorioDestino = "uploads/";

            // Asegurarse de que el directorio exista
            if (!file_exists($directorioDestino)) {
                mkdir($directorioDestino, 0755, true);
            }

            for ($i = 0; $i < $totalArchivos; $i++) {
                $nombreTemporal = $archivos["tmp_name"][$i];
                $nombreArchivo = basename($archivos["name"][$i]);
                $tipoArchivo = $archivos["type"][$i];

                // Validar que el archivo sea de tipo texto
                if ($tipoArchivo == "text/plain") {
                    $rutaArchivo = $directorioDestino . $nombreArchivo;

                    if (move_uploaded_file($nombreTemporal, $rutaArchivo)) {
                        echo "<p style='color: green;'>El archivo <strong>$nombreArchivo</strong> se ha subido correctamente.</p>";

                        // Leer y mostrar el contenido del archivo
                        $contenido = file_get_contents($rutaArchivo);
                        echo "<h2>Contenido de <strong>$nombreArchivo</strong>:</h2>";
                        echo "<pre>$contenido</pre>";
                    } else {
                        echo "<p style='color: red;'>Hubo un error al guardar el archivo <strong>$nombreArchivo</strong>.</p>";
                    }
                } else {
                    echo "<p style='color: red;'>Error: <strong>$nombreArchivo</strong> no es un archivo de texto válido.</p>";
                }
            }
        } else {
            echo "<p style='color: red;'>No se seleccionaron archivos o hubo un error en la subida.</p>";
        }
    } else {
        echo "<p style='color: red;'>No se ha enviado el formulario correctamente.</p>";
    }
    ?>
</body>
</html>
