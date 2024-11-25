<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario con Selección de Idiomas</title>
</head>
<body>
    <h1>Formulario con Selección de Idiomas</h1>

    <?php
    // Inicializar variables
    $nombre = $apellido = $edad = $direccion = $telefono = $correo = $genero = "";
    $idiomas = [];
    $error = "";

    // Validar si se envió el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validar campos obligatorios
        if (empty($_POST["nombre"]) || empty($_POST["apellido"]) || empty($_POST["edad"]) || 
            empty($_POST["direccion"]) || empty($_POST["telefono"]) || empty($_POST["correo"]) || 
            empty($_POST["genero"])) {
            $error = "Todos los campos, incluido el género, son obligatorios.";
        } else {
            // Recuperar y limpiar datos
            $nombre = htmlspecialchars($_POST["nombre"]);
            $apellido = htmlspecialchars($_POST["apellido"]);
            $edad = htmlspecialchars($_POST["edad"]);
            $direccion = htmlspecialchars($_POST["direccion"]);
            $telefono = htmlspecialchars($_POST["telefono"]);
            $correo = htmlspecialchars($_POST["correo"]);
            $genero = htmlspecialchars($_POST["genero"]);
            $idiomas = isset($_POST["idiomas"]) ? $_POST["idiomas"] : [];
        }
    }
    ?>

    <!-- Mostrar errores si los hay -->
    <?php if (!empty($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <!-- Formulario -->
    <form method="POST" action="">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>"><br><br>

        <label for="apellido">Apellido:</label><br>
        <input type="text" id="apellido" name="apellido" value="<?php echo $apellido; ?>"><br><br>

        <label for="edad">Edad:</label><br>
        <input type="number" id="edad" name="edad" value="<?php echo $edad; ?>"><br><br>

        <label for="direccion">Dirección:</label><br>
        <input type="text" id="direccion" name="direccion" value="<?php echo $direccion; ?>"><br><br>

        <label for="telefono">Teléfono:</label><br>
        <input type="text" id="telefono" name="telefono" value="<?php echo $telefono; ?>"><br><br>

        <label for="correo">Correo Electrónico:</label><br>
        <input type="email" id="correo" name="correo" value="<?php echo $correo; ?>"><br><br>

        <label>Género:</label><br>
        <input type="radio" id="masculino" name="genero" value="Masculino" <?php if ($genero == "Masculino") echo "checked"; ?>>
        <label for="masculino">Masculino</label><br>
        <input type="radio" id="femenino" name="genero" value="Femenino" <?php if ($genero == "Femenino") echo "checked"; ?>>
        <label for="femenino">Femenino</label><br>
        <input type="radio" id="otro" name="genero" value="Otro" <?php if ($genero == "Otro") echo "checked"; ?>>
        <label for="otro">Otro</label><br><br>

        <label>Idiomas que habla:</label><br>
        <input type="checkbox" id="espanol" name="idiomas[]" value="Español" <?php if (in_array("Español", $idiomas)) echo "checked"; ?>>
        <label for="espanol">Español</label><br>
        <input type="checkbox" id="ingles" name="idiomas[]" value="Inglés" <?php if (in_array("Inglés", $idiomas)) echo "checked"; ?>>
        <label for="ingles">Inglés</label><br>
        <input type="checkbox" id="frances" name="idiomas[]" value="Francés" <?php if (in_array("Francés", $idiomas)) echo "checked"; ?>>
        <label for="frances">Francés</label><br>
        <input type="checkbox" id="aleman" name="idiomas[]" value="Alemán" <?php if (in_array("Alemán", $idiomas)) echo "checked"; ?>>
        <label for="aleman">Alemán</label><br>
        <input type="checkbox" id="italiano" name="idiomas[]" value="Italiano" <?php if (in_array("Italiano", $idiomas)) echo "checked"; ?>>
        <label for="italiano">Italiano</label><br><br>

        <button type="submit">Enviar</button>
    </form>

    <!-- Mostrar los datos si no hay errores -->
    <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($error)): ?>
        <h2>Datos Ingresados:</h2>
        <p><strong>Nombre:</strong> <?php echo $nombre; ?></p>
        <p><strong>Apellido:</strong> <?php echo $apellido; ?></p>
        <p><strong>Edad:</strong> <?php echo $edad; ?></p>
        <p><strong>Dirección:</strong> <?php echo $direccion; ?></p>
        <p><strong>Teléfono:</strong> <?php echo $telefono; ?></p>
        <p><strong>Correo Electrónico:</strong> <?php echo $correo; ?></p>
        <p><strong>Género:</strong> <?php echo $genero; ?></p>
        <h3>Idiomas:</h3>
        <?php if (!empty($idiomas)): ?>
            <?php foreach ($idiomas as $idioma): ?>
                <p>Bienvenido/a en <strong><?php echo $idioma; ?></strong>!</p>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No seleccionaste ningún idioma.</p>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>