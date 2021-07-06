<?php
require_once 'libs/Router.php';
require_once 'api/ApiController.php';

// crea el router
$router = new Router();

// define la tabla de ruteo
$router->addRoute('getbotines', 'GET', 'ApiController', 'getBotines');
$router->addRoute('getbotin/:ID', 'GET', 'ApiController', 'getBotinByID');
$router->addRoute('addbotin', 'POST', 'ApiController', 'addBotin');


// rutea
$router->route($_REQUEST['resource'], $_SERVER['REQUEST_METHOD']);
