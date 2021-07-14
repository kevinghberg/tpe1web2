<?php
//require_once './Model/modelProductos.php';
require_once './api/api.view.php';

abstract class ApiController
{

    private $model;
    private $view;
    private $data;

    public function __construct()
    {
        //$this->model =  new modelProductos();
        $this->view = new APIView();
        $this->data = file_get_contents("php://input");
        
    }

  
    function GetData(){

        return json_decode($this->data);
        
    }  
}