<?php
session_start();
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['nombre_usuario'];
    $contrasena = $_POST['contrasena'];
    $captcha = $_POST['captcha'];

    // Verificación CAPTCHA
    if ($captcha != $_SESSION['captcha']) {
        echo "El código CAPTCHA es incorrecto.";
    } else {
        $sql = "SELECT * FROM usuarios WHERE nombre_usuario = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$usuario]);
        $usuario_db = $stmt->fetch();

        if ($usuario_db && password_verify($contrasena, $usuario_db['contrasena'])) {
            $_SESSION['usuario'] = $usuario;
            $_SESSION['ultimo_login'] = date("Y-m-d H:i:s");
            // Actualizar la fecha de último login
            $sql_update = "UPDATE usuarios SET ultimo_login = ? WHERE nombre_usuario = ?";
            $stmt = $pdo->prepare($sql_update);
            $stmt->execute([$_SESSION['ultimo_login'], $usuario]);
            echo "Login exitoso. Bienvenido, $usuario." . "<br>"; 
            echo "Ultimo login: " . $_SESSION['ultimo_login'];
            echo '<a href="logout.php">Cerrar sesión</a>';
        } else {
            echo "Credenciales incorrectas. ";
            echo '<a href="login.html">login</a>';
        }
    }
}
?>
