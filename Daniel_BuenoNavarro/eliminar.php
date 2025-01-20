<?php
require_once './funciones.php';
$id = $_GET['id'] ?? null;

if (!$id) {
    echo 'Url no válida';
    exit();
}

delContact($id);
