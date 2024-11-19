<?php
$name = 'profile';
if (!$sessionUser) {
    header("Location: $baseRoute");
}
require "./components/header/header.php";
require "views/profile.view.php";
