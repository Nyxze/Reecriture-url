<?php

define('SRC_PATH', dirname(__DIR__) . '/src');
define("VIEW_PATH", SRC_PATH . '/views');
define('CONTROLLER_PATH', SRC_PATH . '/controllers');
define('LIB_PATH',dirname(__DIR__)."/lib");


require LIB_PATH . '/framework.php';
//Table de routage
$routeTable = [
    "accueil" => "home",
    "contactez-nous" => "contact",
    

];

extract(getRoutesInfos($routeTable));


//Dispatch
dispatchRoute($controller, $params);
