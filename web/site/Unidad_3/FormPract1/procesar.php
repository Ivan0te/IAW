<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesar Datos</title>
</head>
<body>
    <h1>Datos Procesados</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recuperar y validar datos
        $nombre = htmlspecialchars($_POST["nombre"]);
        $apellido = htmlspecialchars($_POST["apellido"]);
        $edad = htmlspecialchars($_POST["edad"]);
        $direccion = htmlspecialchars($_POST["direccion"]);
        $telefono = htmlspecialchars($_POST["telefono"]);
        $correo = htmlspecialchars($_POST["correo"]);
        $genero = isset($_POST["genero"]) ? htmlspecialchars($_POST["genero"]) : "No especificado";
        $idiomas = isset($_POST["idiomas"]) ? $_POST["idiomas"] : [];

        // Verificar campos obligatorios
        if (empty($nombre) || empty($apellido) || empty($edad) || empty($direccion) || empty($telefono) || empty($correo) || empty($genero)) {
            echo "<p style='color: red;'>Error: Todos los campos son obligatorios.</p>";
        } else {
            // Mostrar datos procesados
            echo "<h2>Información del Usuario:</h2>";
            echo "<p><strong>Nombre:</strong> $nombre</p>";
            echo "<p><strong>Apellido:</strong> $apellido</p>";
            echo "<p><strong>Edad:</strong> $edad</p>";
            echo "<p><strong>Dirección:</strong> $direccion</p>";
            echo "<p><strong>Teléfono:</strong> $telefono</p>";
            echo "<p><strong>Correo Electrónico:</strong> $correo</p>";
            echo "<p><strong>Género:</strong> $genero</p>";

            // Mostrar idiomas seleccionados
            echo "<h3>Idiomas:</h3>";
            if (!empty($idiomas)) {
                foreach ($idiomas as $idioma) {
                    echo "<p>Bienvenido/a en <strong>$idioma</strong>!</p>";
                }
            } else {
                echo "<p>No seleccionaste ningún idioma.</p>";
            }
        }
    } else {
        echo "<p style='color: red;'>No se recibieron datos.</p>";
    }
    ?>
</body>
</html>
