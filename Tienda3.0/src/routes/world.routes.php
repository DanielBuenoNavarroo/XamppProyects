<?php
function getWorldRoutes()
{
    $routes = [
        API_ROUTE . "countries" => WORLD_CONTROLLERS . "countries.controller.php",
        API_ROUTE . "states" => WORLD_CONTROLLERS . "states.controller.php",
        API_ROUTE . "cities" => WORLD_CONTROLLERS . "cities.controller.php",
    ];

    return $routes;
}
