# 3.5.1 Práctica Final PHP

## 1. Configuración del Entorno

Asegúrate de que tu servidor web esté correctamente configurado para soportar PHP (versión 7.0 o superior) y MySQL/MariaDB. La base de datos debe estar conectada desde el archivo config.php para centralizar la configuración.

```php
<?php
$servername = "localhost";
$username = "root";
$password = "Root_pass1";
$dbname = "sistema_login";

$conn = new mysqli($servername, $username, $password, $dbname, 52000);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
```

[Descargar](FormPractFinal/config.php){ .md-button .md-button--primary }

## 2. Base de Datos

Crea una base de datos llamada sistema_login y una tabla usuarios con los campos necesarios. Aquí tienes el script SQL para hacerlo:

```sql
CREATE DATABASE sistema_login;

USE sistema_login;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_usuario VARCHAR(50) UNIQUE NOT NULL,
    contrasena VARCHAR(255) NOT NULL,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    ultimo_login TIMESTAMP NULL
);
```

[Descargar](FormPractFinal/auth.sql){ .md-button .md-button--primary }

## 3. Formulario de Registro

El formulario de registro valida los campos de entrada, incluyendo la verificación de la coincidencia de contraseñas y la creación de un hash de la contraseña con password_hash.

```php
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
```

[Descargar](FormPractFinal/registro.php){ .md-button .md-button--primary }

## 4. Formulario de Login

En el formulario de login, se validan los datos ingresados, se compara la contraseña utilizando password_verify, y se inicia una sesión si las credenciales son correctas.

```php
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
```

[Descargar](FormPractFinal/login.php){ .md-button .md-button--primary }

## 5. Generación del CAPTCHA

El código CAPTCHA se genera utilizando números aleatorios y se muestra como una imagen dinámica.

```php
<?php
session_start();
$captcha = rand(1000, 9999);
$_SESSION['captcha'] = $captcha;

header('Content-Type: image/png');
$image = imagecreate(100, 30);

// Colores
$bg = imagecolorallocate($image, 255, 255, 255); // Fondo blanco
$text_color = imagecolorallocate($image, 0, 0, 0); // Texto negro
$line_color = imagecolorallocate($image, 0, 0, 0); // Líneas negras

// Generar más líneas aleatorias
for ($i = 0; $i < 15; $i++) { // Aumenté el número de líneas
    imageline($image, rand(0, 100), rand(0, 30), rand(0, 100), rand(0, 30), $line_color);
}

// Coordenadas aleatorias para el texto
$x = rand(10, 50); // Posición horizontal aleatoria
$y = rand(5, 20);  // Posición vertical aleatoria

// Añadir el texto en la posición aleatoria
imagestring($image, 5, $x, $y, $captcha, $text_color);

// Generar la imagen
imagepng($image);
imagedestroy($image);
?>
```

[Descargar](FormPractFinal/captcha.php){ .md-button .md-button--primary }

## 6. Gestión de Sesiones

Usa $_SESSION para gestionar las sesiones y mantener el estado del usuario una vez que haya iniciado sesión. Al hacer logout, destruye la sesión.

```php
<?php
session_start();
unset($_SESSION['usuario']);
header("Location: login.html");
?>
```

[Descargar](FormPractFinal/logout.php){ .md-button .md-button--primary }
