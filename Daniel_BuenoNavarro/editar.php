<?php
require_once './funciones.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'] ?? null;
    $name = $_POST['name'] ?? null;
    $email = $_POST['email'] ?? '';
    $tel = $_POST['tel'] ?? null;
    $dir = $_POST['direction'] ?? '';

    if (!$name || !$dir || $id) {
        echo 'No puedes dejar el nombre, el id o el telefono vacios';
    }
    //elseif (filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL) == false) {
    //     echo 'el formato del correo no es válido';
    // } 
    else {
        editContact($name, $email, $tel, $dir);
    }
}
$id = $_GET['id'] ?? null;
if (!$id) {
    echo 'url inválida';
    exit();
}
$data = getByID($id);
if (!$data) {
    echo 'No hay contactos con ese id';
    exit();
}
?>
<form action="./agregar.php" method="post">
    <input type="hidden" name="id" id="id" value="<?= $data['id'] ?>">
    <input type="text" name="name" id="name" placeholder="Nombre" value="<?= $data['nombre'] ?>">
    <input type="text" name="tel" id="tel" placeholder="Telefono" value="<?= $data['telefono'] ?>">
    <input type="text" name="email" id="email" placeholder="Email" value="<?= $data['email'] ?>">
    <input type="text" name="direction" id="direction" placeholder="Direction" value="<?= $data['direccion'] ?>">
    <input type="submit" value="Buscar">
</form>