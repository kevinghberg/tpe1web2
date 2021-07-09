<?php
require_once 'libs/Router.php';
require_once 'api/ApiController.php';

// crea el router
$router = new Router();

// define la tabla de ruteo
$router->addRoute('getbotines', 'GET', 'ApiController', 'getBotines');
$router->addRoute('getbotin/:ID', 'GET', 'ApiController', 'getBotinByID');
$router->addRoute('addbotin', 'POST', 'ApiController', 'addBotin');






$router->addRoute('comentarios', 'POST', 'ApiComentariosController', 'InsertComentario');






//$router->addRoute("admin/:ID", "POST", "UserController", "SetUserToAdmin");
//$router->addRoute("registrado/:ID", "POST", "UserController", "SetAdminToUser");
//$router->addRoute("deleteUser/:ID", "POST", "UserController", "deleteUser");


// rutea
$router->route($_REQUEST['resource'], $_SERVER['REQUEST_METHOD']);
