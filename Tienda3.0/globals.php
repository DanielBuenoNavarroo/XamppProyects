<?php
define("BASE_ROUTE", '/XamppProyects/Tienda3.0/');
define("API_ROUTE", BASE_ROUTE . "api/v1/");
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$sessionUser = $_SESSION["user"] ?? null;