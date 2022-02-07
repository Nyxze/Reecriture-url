<?php

function getRoutesInfos(array $routeTable): array
{

    $route = $_SERVER['PATH_INFO'] ?? "/accueil";
    //Table de routage
    $routeParts = explode("/", $route);
    array_shift($routeParts);
    $route = array_shift($routeParts);
    $params = $routeParts;

    if (array_key_exists($route, $routeTable)) {
        $controller = $routeTable[$route];
    } else {
        $controller = "not-found";
    }

    return [
        "controller" => $controller,
        "params" => $params ?? [],
    ];

}

function dispatchRoute(string $controller, array $params): void
{
    try {

        require CONTROLLER_PATH . "/$controller.php";
        $controllerFuncName = "{$controller}Controller";
        $controllerFuncName(...$params);
    } catch (Throwable $e) {
        require VIEW_PATH . "/error.php";

    }

}
