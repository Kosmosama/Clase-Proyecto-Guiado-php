<?php
namespace kosmo\app\utils;

header('Content-Type: image/png');
session_start();

$totalCaracteres = rand(5, 8);
$posiblesLetras = "123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
$captcha = "";

$captchaFont = "utils/CartoonBlocks.ttf";
$captchaFontSize = rand(30, 40);

for ($caracter = 0; $caracter < $totalCaracteres; $caracter++) {
    $captcha .= $posiblesLetras[rand(0, strlen($posiblesLetras) - 1)];
}

$text_box = imagettfbbox($captchaFontSize, 0, $captchaFont, $captcha);
$ancho = abs($text_box[2] - $text_box[0]) + 10;
$alto = abs($text_box[5] - $text_box[1]) + 10;

if ($captchaFontSize > 35) {
    $randomLineas = 10;
} else {
    $randomLineas = 14;
}

$imagen = imagecreatetruecolor($ancho, $alto + 20);

$colorBlanco = imagecolorallocate($imagen, 255, 255, 255);
$colorAzul = imagecolorallocate($imagen, 0, 0, 164);
$colorNegro = imagecolorallocate($imagen, 0, 0, 0);

imagefill($imagen, 0, 0, $colorAzul);

for ($contadorLineas = 0; $contadorLineas < $randomLineas; $contadorLineas++) {
    imageline($imagen, rand(0, $ancho), rand(0, $alto), rand(0, $ancho), rand(0, $alto + 20), $colorNegro);
}

imagettftext($imagen, $captchaFontSize, 0, 5, $alto, $colorBlanco, $captchaFont, $captcha);

imagepng($imagen);
imagedestroy($imagen);

$_SESSION['captchaGenerado'] = $captcha;
?>
