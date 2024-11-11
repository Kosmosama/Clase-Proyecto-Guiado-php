<?php
include __DIR__ . '/inicio.part.php';
include __DIR__ . '/navegacion.part.php';
echo $mainContent;
include __DIR__ . '/fin.part.php';

// También, en index.view.php hay que quitar los require iniciales y finales.
// Comprobamos que funciona la página correctamente.