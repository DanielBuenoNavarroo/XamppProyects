<?php
$title = 'Tienda';

session_start();
if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];
}

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$baseRoute = '/XamppProyects/Tienda2.0/';
$routes = [
    $baseRoute . '' => 'controllers/index.controller.php',
    $baseRoute . 'auth' =>  'controllers/auth.controller.php',
    $baseRoute . 'logout' => 'model/controllers/logout.php',
    $baseRoute . 'shop' => 'controllers/shop.controller.php',
    $baseRoute . 'admin' => 'controllers/admin.controller.php',
];
if (array_key_exists($uri, $routes)) {
    $view = $routes[$uri];
} else {
    http_response_code(404);
    $view = 'controllers/404.controller.php';
}

require "layouts/layout.php";
