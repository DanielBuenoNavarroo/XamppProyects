<?php

$name = 'admin';
if (!isset($_SESSION["user"]) || $roles[$_SESSION["user"]['rol_id']] != 'admin') header("Location: " . $baseRoute);
require "./components/header/header.php";
require "views/admin.view.php";
