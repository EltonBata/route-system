<?php
require_once "../vendor/autoload.php";
require_once "../app/routes/router.php";

try {
    $uri = parse_url($_SERVER['REQUEST_URI'])['path'];
    $request = $_SERVER['REQUEST_METHOD'];

    if (!isset($router[$request])) {
        throw new Exception("A rota nao existe");
    }

    if(!array_key_exists($uri, $router[$request])){
        throw new Exception("A rota nao existe");
    }

    $router[$request][$uri];

} catch (Exception $e) {
    $e->getMessage();
}
