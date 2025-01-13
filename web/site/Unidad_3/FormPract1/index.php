<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario con POST</title>
</head>
<body>
    <h1>Formulario con POST</h1>
    <form method="POST" action="procesar.php">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre"><br><br>

        <label for="apellido">Apellido:</label><br>
        <input type="text" id="apellido" name="apellido"><br><br>

        <label for="edad">Edad:</label><br>
        <input type="number" id="edad" name="edad"><br><br>

        <label for="direccion">Dirección:</label><br>
        <input type="text" id="direccion" name="direccion"><br><br>

        <label for="telefono">Teléfono:</label><br>
        <input type="text" id="telefono" name="telefono"><br><br>

        <label for="correo">Correo Electrónico:</label><br>
        <input type="email" id="correo" name="correo"><br><br>

        <label>Género:</label><br>
        <input type="radio" id="masculino" name="genero" value="Masculino">
        <label for="masculino">Masculino</label><br>
        <input type="radio" id="femenino" name="genero" value="Femenino">
        <label for="femenino">Femenino</label><br>
        <input type="radio" id="otro" name="genero" value="Otro">
        <label for="otro">Otro</label><br><br>

        <label>Idiomas que habla:</label><br>
        <input type="checkbox" id="espanol" name="idiomas[]" value="Español">
        <label for="espanol">Español</label><br>
        <input type="checkbox" id="ingles" name="idiomas[]" value="Inglés">
        <label for="ingles">Inglés</label><br>
        <input type="checkbox" id="frances" name="idiomas[]" value="Francés">
        <label for="frances">Francés</label><br>
        <input type="checkbox" id="aleman" name="idiomas[]" value="Alemán">
        <label for="aleman">Alemán</label><br>
        <input type="checkbox" id="italiano" name="idiomas[]" value="Italiano">
        <label for="italiano">Italiano</label><br><br>

        <button type="submit">Enviar</button>
    </form>
</body>
</html>
