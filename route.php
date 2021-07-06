<?php

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

require_once('controller/Controller.php');
require_once('controller/UserController.php');
require_once('controller/ProductosController.php');

if ($_GET['action'] == '')
    $_GET['action'] = 'index';

$urlParts = explode('/', $_GET['action']);

$Controller = new Controller();
$UserController = new UserController();
$ProductosController = new ProductosController();


switch ($urlParts[0]) {
    case 'index':
        $Controller->Home();
        break;
    case 'login':
        $UserController->showLogin();
        break;
    case 'verifyUser':
        $UserController->verify();
        break;
    case 'registrar':
        $UserController->registrar();
        break;
    case 'logout':
        $UserController->logout();
        $Controller->Home();
    case 'ventas':
        $ProductosController->showVentas();
        break;
    case 'detalles':
        $ProductosController->GetDetalles($urlParts[1]);
        break;
    case 'marcas':
        $ProductosController->showMarcas();
        break;
    case 'usuarios':
        $UserController->showLogin();
        break;
    case 'filtrar':
        $ProductosController->filtrar();
        break;      
    case 'agregarBotin':
        $ProductosController->agregarBotin();
        break;
    case 'agregarMarca':
        $ProductosController->agregarMarca();
        break;
    case 'borrarBotin':
        $ProductosController->borrarBotin($urlParts[1]);
        break;
    case 'borrarMarca':
        $ProductosController->borrarMarca($urlParts[1]);
        break;
     case 'modificar':
     $ProductosController->modificarBotin($urlParts[1]);
        break;
    
    default:
        echo '<h1>Error 404 - Page not found </h1>';
        break;
}
