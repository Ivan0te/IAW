<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Básico</title>
</head>
<body>
    <h1>Formulario Básico</h1>

    <?php
    // Inicializar variables para mostrar mensajes y valores ingresados
    $nombre = $apellido = $edad = $direccion = $telefono = $correo = "";
    $error = "";

    // Validar si se envió el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validación de campos vacíos
        if (empty($_POST["nombre"]) || empty($_POST["apellido"]) || empty($_POST["edad"]) || 
            empty($_POST["direccion"]) || empty($_POST["telefono"]) || empty($_POST["correo"])) {
            $error = "Todos los campos son obligatorios.";
        } else {
            // Recuperar los datos
            $nombre = htmlspecialchars($_POST["nombre"]);
            $apellido = htmlspecialchars($_POST["apellido"]);
            $edad = htmlspecialchars($_POST["edad"]);
            $direccion = htmlspecialchars($_POST["direccion"]);
            $telefono = htmlspecialchars($_POST["telefono"]);
            $correo = htmlspecialchars($_POST["correo"]);
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
    <?php endif; ?>
</body>
</html>
