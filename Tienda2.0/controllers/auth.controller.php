<?php

$name = 'Auth';

if (isset($_SESSION["user"])) header("Location: " . $baseRoute);
require "views/auth.view.php";
