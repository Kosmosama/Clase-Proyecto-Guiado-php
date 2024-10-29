<?php
use dwes\app\entity\Asociado;
use dwes\app\entity\Imagen;

$asociados = [
    new Asociado('First Partner', 'log1.jpg', 'Descripcion'),
    new Asociado('Second Partner', 'log2.jpg', 'Descripcion'),
    new Asociado('Third Partner', 'log3.jpg', 'Descripcion')
];

$imagenesHome = [];
for ($i = 1; $i <= 12; $i++) {
    $imagenesHome[] = new Imagen("$i.jpg", "Descripcion $i", 1, 2, 3, 4);
}

require_once __DIR__ . '/views/index.view.php';
