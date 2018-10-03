<?php

include 'vendor/autoload.php';

use \MiniFast\Route;

if (isset($_COOKIE[session_name()])) {
    session_start();
}

$route = new Route();
$route->fromFile(
    __DIR__ . '/routes.json',
    __DIR__ . '/templates'
);
