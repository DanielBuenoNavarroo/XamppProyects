<?php
$name = 'admin';
if (!$sessionUser || $roles[$sessionUser['rol_id']] != 'admin') {
    header("Location: $baseRoute");
}
require "./components/header/header.php";
require "views/admin.view.php";
