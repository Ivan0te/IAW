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


