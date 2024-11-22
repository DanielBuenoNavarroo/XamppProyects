<?php
require_once './globals.php';

if (!isset($_SESSION)) {
    session_start();
}

if (str_contains($uri, API_ROUTE)) {
    require_once './src/index.php';
} else {
    require_once './client/index.php';
}
