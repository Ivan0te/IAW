<?php
session_start(); 

include('config.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {  // Comprueba si el formulario fue enviado.

    $usuario = $_POST['nombre_usuario'];  
    $contrasena = $_POST['contrasena'];  
    $confirmar_contrasena = $_POST['confirmar_contrasena']; 

    if (empty($usuario) || empty($contrasena) || empty($confirmar_contrasena)) {
        echo "Todos los campos son obligatorios.";  // Verifica que no haya campos vacíos.

    } elseif ($contrasena !== $confirmar_contrasena) {
        echo "Las contraseñas no coinciden. ";  // Valida que las contraseñas sean iguales.
        echo '<a href="registro.html">Login</a>';

    } else {
        $contrasena_hash = password_hash($contrasena, PASSWORD_BCRYPT);  // Hashea la contraseña de forma segura.
        
        // Inserta el usuario y la contraseña hasheada en la base de datos.
        $sql = "INSERT INTO usuarios (nombre_usuario, contrasena) VALUES (?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$usuario, $contrasena_hash]);

        echo "Usuario registrado exitosamente. ";
        echo '<a href="login.html">Login</a>'; 
    }
}
?>
