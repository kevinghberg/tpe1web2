<?php

include_once('./View/marcasView.php');

class MarcasController extends Controller{


    public function __construct()
    {

        $this->model = new  modelMarcas();

        $this->view = new marcasView();
    }


     /** 
     * Muestra la lista de Marcas.
     **/

    function showMarcas()
    {
        $marcas = $this->model->GetMarcas();
        $logged = $this->CheckLoggedIn();
        $this->view->RenderMarcas($marcas,$logged);
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
     * Borra 1 marca de la tabla.
     **/

    function borrarMarca($id)
    {
        AuthHelper::checkLoggedIn();
        $this->model->borrarMarca($id);
        header("Location: " . BASE_URL . 'marcas');
    }


    function CheckLoggedIn(){
       
        if(!isset($_SESSION["admin"])){
            $logged = "false";
        } elseif ($_SESSION["admin"] == 1){
            $logged = "admin";
        } else {
            $logged = "user";
        }
        return $logged;
    }


}