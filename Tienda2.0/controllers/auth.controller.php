<?php
$name = 'Auth';
if ($sessionUser) header("Location: $baseRoute");
require "views/auth.view.php";
