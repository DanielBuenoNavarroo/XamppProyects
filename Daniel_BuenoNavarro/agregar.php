<?php
require_once './funciones.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'] ?? null;
    $email = $_POST['email'] ?? '';
    $tel = $_POST['tel'] ?? null;
    $dir = $_POST['direction'] ?? '';

    if (!$name || !$dir) {
        echo 'No puedes dejar ni el nombre ni la dirección vacias';
    } else {
        addContact($name, $email, $tel, $dir);
    }
} ?>
<form action="./agregar.php" method="post">
    <input type="text" name="name" id="name" placeholder="Nombre">
    <input type="text" name="tel" id="tel" placeholder="Telefono">
    <input type="email" name="email" id="email" placeholder="Email">
    <input type="text" name="direction" id="direction" placeholder="Direction">
    <input type="submit" value="Buscar">
</form>