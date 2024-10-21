<?php
session_start();

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$baseRoute = '/XamppProyects/Tienda2.0/';
$routes = [
    "{$baseRoute}" => 'controllers/index.controller.php',
    "{$baseRoute}auth" => 'controllers/auth.controller.php',
    "{$baseRoute}logout" => 'model/controllers/auth/logout.php',
    "{$baseRoute}admin" => 'controllers/admin.controller.php',
];

$api = [
    "{$baseRoute}search_product" => 'model/api/search_products.php',
    "{$baseRoute}search_user" => '',
];
if (array_key_exists($uri, $routes)) {
    $view = $routes[$uri];
} elseif (array_key_exists($uri, $api)) {
    require_once $api[$uri];
    exit();
} else {
    http_response_code(404);
    $view = 'controllers/404.controller.php';
}
require "layouts/layout.php";
