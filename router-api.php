<?php
require_once 'Router.php';
require_once 'api/ApiController.php';
require_once 'api/ApiComentariosController.php';

// crea el router
$router = new Router();

// define la tabla de ruteo
/*$router->addRoute('getbotines', 'GET', 'ApiController', 'getBotines');
$router->addRoute('getbotin/:ID', 'GET', 'ApiController', 'getBotinByID');
$router->addRoute('addbotin', 'POST', 'ApiController', 'addBotin');
*/





// Comentarios 

$router->addRoute('comentarios', 'POST', 'ApiComentariosController', 'InsertComentario');
$router->addRoute("comentarios/:ID", "GET", "ApiComentariosController", "GetComentarios");
$router->addRoute("comentarios/:ID", "DELETE", "ApiComentariosController", "deleteComentario");



//Admin/User


$router->addRoute("admin/:ID", "POST", "UserController", "SetUserToAdmin");
$router->addRoute("registrado/:ID", "POST", "UserController", "SetAdminToUser");
$router->addRoute("deleteUser/:ID", "POST", "UserController", "deleteUser");



// rutea


$router->route($_REQUEST['resource'], $_SERVER['REQUEST_METHOD']);
