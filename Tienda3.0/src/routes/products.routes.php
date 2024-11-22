<?php
function getProductsRoutes()
{
    $routes = [
        API_ROUTE . "products" => PRODUCTS_CONTROLLERS . "products.controller.php",
    ];

    return $routes;
}