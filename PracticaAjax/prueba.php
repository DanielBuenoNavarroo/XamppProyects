<?php
$filename = 'ej2.json';

$nuevoUsuario = array(
    "nombre" => $_POST['nombre'],
    "correo" => $_POST['correo']
);

if (file_exists($filename)) {
    $jsonData = file_get_contents($filename);

    $usuarios = json_decode($jsonData, true);

    if ($usuarios === null) {
        $usuarios = array();
    }
} else {
    $usuarios = [];
}

$usuarios[] = $nuevoUsuario;

$jsonDataActualizado = json_encode($usuarios, JSON_PRETTY_PRINT);

if (file_put_contents($filename, $jsonDataActualizado)) {
    echo "Los datos se insertaron correctamente.";
} else {
    echo "Ocurrió un error al escribir en el archivo JSON.";
}
