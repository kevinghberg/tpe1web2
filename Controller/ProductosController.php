<?php

include_once('./Model/modelProductos.php');
include_once('./View/productosView.php');

class ProductosController
{
    private $model;
    private $view;

    public function __construct()
    {

        $this->model = new  modelProductos();

        $this->view = new productosView();
    }

    /** 
     * Muestra la lista de Marcas.
     **/

    function showMarcas()
    {
        $marcas = $this->model->GetMarcas();
        $this->view->RenderMarcas($marcas);
    }

    /**
     * Muestra la lista de Botines.
     **/

    function showBotines()
    {
        $botines = $this->model->GetBotines();

        $this->view->RenderBotines($botines);
    }

    /**
     * Muestra la lista de Ventas.
     **/

    function showVentas()
    {
        $botines = $this->model->GetBotines();
        $marcas = $this->model->GetMarcas();

        $this->view->RenderVentas($botines, $marcas);
    }

    /**
     * Borra 1 botin de la tabla.
     **/

    function borrarBotin($id)
    {
        AuthHelper::checkLoggedIn();
        $this->model->borrarBotin($id);
        header("Location: " . BASE_URL . 'ventas');
    }

    /**
     * Borra 1 marca de la tabla.
     **/

    function borrarMarca($id)
    {
        AuthHelper::checkLoggedIn();
        $this->model->borrarMarca($id);
        header("Location: " . BASE_URL . 'marcas');
    }

    /**
     * Agrega 1 botin a la tabla.
     **/

    function agregarBotin()
    {
        AuthHelper::checkLoggedIn();
        $modelo = $_POST['inputModelo'];
        $talle = $_POST['inputTalle'];
        $marca = $_POST['inputMarca'];

        if (!empty($modelo) && !empty($talle) && !empty($marca)) {
            $this->model->newBotin($modelo, $talle, $marca);
        }
        header("Location: " . BASE_URL . 'ventas');
    }

    /**
     * Agrega 1 marca a la tabla.
     **/


    function agregarMarca()
    {
        AuthHelper::checkLoggedIn();

        $marca = $_POST['inputMarca'];
        $paisdeorigen = $_POST['inputPaisDeOrigen'];



        if (!empty($marca) && !empty($paisdeorigen)) {
            $this->model->newMarca($marca, $paisdeorigen);
        }
        header("Location: " . BASE_URL . 'marcas');
    }

    /**
     * Selecciona detalles de un botin($id)
     **/

    function GetDetalles($id)
    {

        $botin = $this->model->GetBotin($id);
        $marcas = $this->model->GetMarcas();

        $this->view->RenderDetalle($botin, $marcas);
    }


    /**
     * filtra una categoria (marca)
     **/

    function filtrar()
    {
        $id_marca = $_POST['marcaInput'];


        $botin = $this->model->GetBotinesPorMarca($id_marca);
        $marcas = $this->model->GetMarcas();

        $this->view->RenderVentas($botin, $marcas);
    }

    /**
     * cambia el valor boolean de un botin (dice si esta vendido)
     **/

    function modificarBotin($id)
    {

        AuthHelper::checkLoggedIn();

        $this->model->modificarBotin($id);

        header("Location: " . BASE_URL . 'ventas');
    }
}
