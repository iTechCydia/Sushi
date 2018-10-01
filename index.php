<?php

include 'vendor/autoload.php';

use \MiniFast\Route;

$route = new Route();

$route->fromFile(
    __DIR__ . '/routes.json',
    __DIR__ . '/templates'
);