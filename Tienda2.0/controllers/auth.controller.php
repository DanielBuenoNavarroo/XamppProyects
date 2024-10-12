<?php

$name = 'Auth';

if (isset($user)) header("Location: " . $baseRoute);
require "views/auth.view.php";
