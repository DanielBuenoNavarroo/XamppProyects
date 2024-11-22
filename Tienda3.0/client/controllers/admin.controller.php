<?php
if (!$sessionUser || $sessionUser['rol_id'] != 1) {
    header("Location: $baseRoute");
}

$ofset = 0;
$display_user = [
    'ID',
    'Nombre',
    'Email',
    'Rol',
    'Fecha de registro',
    'Edit'
];

require "./components/header/header.php";
require "views/admin.view.php";
