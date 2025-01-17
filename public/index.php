<?php
require '../app/functions.php';
require '../app/models/model.php';
require '../app/routes.php';

// on récupère l'uri réécrite et le root
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$root = dirname($_SERVER['PHP_SELF']);
$root = $root == '\\' ? '' : $root;
$uri = str_replace($root, '', $uri);

$route = getRoute($routes, $uri);

if ($route) {
    $controller = $route[2][0];
    $action = $route[2][1];
} else {
    $controller = 'error';
    $action = 'index';
}

require "../app/controllers/$controller/$action.php";