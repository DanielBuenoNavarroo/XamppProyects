<?php
function getAuthRoutes()
{
    $routes = [
        API_ROUTE . "login" => AUTH_CONTROLLERS . "login.controller.php",
        API_ROUTE . "register" => AUTH_CONTROLLERS . "register.controller.php",
    ];

    return $routes;
}
