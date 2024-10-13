<?php

$name = 'admin';
if (!isset($user) || $roles[$user['rol_id']] != 'admin') header("Location: " . $baseRoute);
require "views/admin.view.php";
