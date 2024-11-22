<?php
$routes = [
    BASE_ROUTE => 'client/controllers/home.controller.php',
    BASE_ROUTE . "auth" => 'client/controllers/auth.controller.php',
    BASE_ROUTE . "logout" => 'client/model/controllers/auth/logout.php',
    BASE_ROUTE . "admin" => 'client/controllers/admin.controller.php',
    BASE_ROUTE . "profile" => 'client/controllers/profile.controller.php',
];

if (array_key_exists($uri, $routes)) {
    $view = $routes[$uri];
} else {
    http_response_code(404);
    $view = 'controllers/404.controller.php';
}

require "./client/layouts/layout.php";
