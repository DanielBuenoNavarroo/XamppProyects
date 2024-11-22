<?php
// $routes = [
//     "{$baseRoute}search_product" => 'model/api/search_products.php',
//     "{$baseRoute}search_user" => '',
//     "{$apiRoute}countries" => 'model/api/world/get_countries.php',
//     "{$apiRoute}states" => 'model/api/world/get_states.php',
//     "{$apiRoute}cities" => 'model/api/world/get_cities.php',
// ];
require_once './src/globals.php';

require_once './src/routes/world.routes.php';
require_once './src/routes/auth.routes.php';
require_once './src/routes/products.routes.php';

$routes = getWorldRoutes() + getAuthRoutes() + getProductsRoutes();

if (array_key_exists($uri, $routes)) {
    header('Content-Type: application/json');
    require_once $routes[$uri];
} else {
    http_response_code(404);
    header('Content-Type: application/json');
    echo json_encode([
        "message" => "La ruta no existe"
    ]);
}
