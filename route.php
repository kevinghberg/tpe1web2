<?php

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

require_once('controller/Controller.php');
require_once('controller/UserController.php');
require_once('controller/ProductosController.php');
require_once('controller/MarcasController.php');
if ($_GET['action'] == '')
    $_GET['action'] = 'index';

$urlParts = explode('/', $_GET['action']);

$Controller = new Controller();
$UserController = new UserController();
$ProductosController = new ProductosController();
$MarcasController = new MarcasController();

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
        break;
    case 'ventas':
        $ProductosController->showVentas();
        break;
    case 'detalles':
        $ProductosController->GetDetalles($urlParts[1]);
        break;
    case 'marcas':
        $MarcasController->showMarcas();
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
        $MarcasController->agregarMarca();
        break;
    case 'borrarBotin':
        $ProductosController->borrarBotin($urlParts[1]);
        break;
    case 'borrarMarca':
        $MarcasController->borrarMarca($urlParts[1]);
        break;
    case 'modificar':
        $ProductosController->RenderModificar($urlParts[1]);
        break;
    case 'modificarBotin':
        $ProductosController->modificarBotin($urlParts[1]);
        break;
    case 'listaUsuarios':
        $UserController->listarUsuarios();
        break;
    case 'deleteUser':
        $UserController->deleteUser($urlParts[1]);
        break;
    case 'admin':
        $UserController->setUserToAdmin($urlParts[1]);
        break;
    case 'user':
        $UserController->setAdminToUser($urlParts[1]);
        break;
    default:
        echo '<h1>Error 404 - Page not found </h1>';
        break;
}
