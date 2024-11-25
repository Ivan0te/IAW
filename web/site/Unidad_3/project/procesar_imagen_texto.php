<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesar Imagen y Archivo de Texto</title>
</head>
<body>
    <h1>Resultado de la Subida de Archivos</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $directorioDestino = "uploads/";

        // Asegurarse de que el directorio exista
        if (!file_exists($directorioDestino)) {
            mkdir($directorioDestino, 0755, true);
        }

        // Procesar la imagen
        if (isset($_FILES["imagen"]) && $_FILES["imagen"]["error"] == 0) {
            $imagen = $_FILES["imagen"];
            $nombreTemporalImagen = $imagen["tmp_name"];
            $nombreImagen = basename($imagen["name"]);
            $tipoImagen = $imagen["type"];

            $tiposImagenPermitidos = ["image/jpeg", "image/png", "image/gif"];
            if (in_array($tipoImagen, $tiposImagenPermitidos)) {
                $rutaImagen = $directorioDestino . $nombreImagen;

                if (move_uploaded_file($nombreTemporalImagen, $rutaImagen)) {
                    echo "<p style='color: green;'>La imagen <strong>$nombreImagen</strong> se ha subido correctamente.</p>";
                    echo "<h2>Vista previa de la imagen:</h2>";
                    echo "<img src='$rutaImagen' alt='Imagen subida' style='max-width: 500px; max-height: 500px;'><br><br>";
                } else {
                    echo "<p style='color: red;'>Hubo un error al guardar la imagen.</p>";
                }
            } else {
                echo "<p style='color: red;'>Error: Solo se permiten archivos de imagen (JPEG, PNG, GIF).</p>";
            }
        } else {
            echo "<p style='color: red;'>No se seleccionó ninguna imagen o hubo un error en la subida.</p>";
        }

        // Procesar el archivo de texto
        if (isset($_FILES["texto"]) && $_FILES["texto"]["error"] == 0) {
            $texto = $_FILES["texto"];
            $nombreTemporalTexto = $texto["tmp_name"];
            $nombreTexto = basename($texto["name"]);
            $tipoTexto = $texto["type"];

            if ($tipoTexto == "text/plain") {
                $rutaTexto = $directorioDestino . $nombreTexto;

                if (move_uploaded_file($nombreTemporalTexto, $rutaTexto)) {
                    echo "<p style='color: green;'>El archivo de texto <strong>$nombreTexto</strong> se ha subido correctamente.</p>";
                    echo "<h2>Contenido del archivo de texto:</h2>";
                    $contenidoTexto = file_get_contents($rutaTexto);
                    echo "<pre>$contenidoTexto</pre>";
                } else {
                    echo "<p style='color: red;'>Hubo un error al guardar el archivo de texto.</p>";
                }
            } else {
                echo "<p style='color: red;'>Error: Solo se permiten archivos de texto (.txt).</p>";
            }
        } else {
            echo "<p style='color: red;'>No se seleccionó ningún archivo de texto o hubo un error en la subida.</p>";
        }
    } else {
        echo "<p style='color: red;'>No se ha enviado el formulario correctamente.</p>";
    }
    ?>
</body>
</html>
