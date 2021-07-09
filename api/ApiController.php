<?php
require_once './Model/modelProductos.php';
require_once 'api.view.php';

class ApiController
{

    private $model;
    private $view;
    private $data;

    public function __construct()
    {
        $this->model =  new modelProductos();
        $this->view = new APIView();
        $this->data = file_get_contents("php://input");
        
    }

    private function getData()
    {
        return json_decode($this->data);
    }




    // BOTINES


    public function getBotines($params = [])
    {
        // obtengo los botines
        $botines = $this->model->getBotines();

        // se las paso a la vista para que responda JSON
        $this->view->response($botines, 200);
    }

    public function getBotinByID($params = [])
    {

        // obtengo un botin
        $idTarea = $params[':ID'];

        $tarea = $this->model->GetBotin($idTarea);

        if ($tarea) {
            $this->view->response($tarea, 200);
        } else {
            $this->view->response("No se encontro el id $idTarea", 400);
        }
        // se las paso a la vista para que responda JSON

    }

    public function addBotin($params = [])
    {


        $datos = $this->getData();


        $modelo = $datos->modelo;
        $talle = $datos->talle;
        $marca = $datos->marca;

        /* 
        if ($_FILES['input_name']['type'] == "image/jpg" || $_FILES['input_name']['type'] == "image/jpeg" 
            || $_FILES['input_name']['type'] == "image/png") {
                $this->model->new($titulo, $prioridad, $descripcion, $_FILES['input_name']['tmp_name']);
        } else {
            
        }*/
        $id = $this->model->newBotin($modelo, $talle, $marca);
        $this->view->response('El ID del botin es = '. $id, 200);
    }


    // MARCAS


    /* Agrega una marca */
    function agregarMarca()
    {
        //AuthHelper::checkLoggedIn();


        $datos = $this->getData();

        $marca = $datos->marca;
        $paisdeorigen = $datos->paisdeorigen;

        $this->model->newMarca($marca, $paisdeorigen);
        $this->view->response('', 200);
    }
    //header("Location: " . BASE_URL . 'marcas');



    
}
