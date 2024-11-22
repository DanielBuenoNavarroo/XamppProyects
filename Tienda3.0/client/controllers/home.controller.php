<?php
$id = $_GET['id'] ?? null;
$category = $_GET['category'] ?? null;

require "./client/components/header/header.php";
require "./client/views/home.view.php";
