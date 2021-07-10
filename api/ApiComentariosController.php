<?php

require_once "./Model/modelComentarios.php";
require_once "./api/ApiController.php";

class ApiComentariosController extends ApiController{ 


    public function InsertComentario($params = null){

        $body = $this->GetData();
        
        $comentario = $this->model->InsertComentario($body->comentario, $body->valoracion, $body->id_botin);
        
        if (!empty($comentario)) // verifica si la tarea existe
            $this->view->response( $this->model->GetComentario($comentario), 200);
        else
            $this->view->response("El comentario no se pudo agregar", 404);
    }

    public function GetComentarios($params = null){
        $id = $params[":ID"];
        $comentarios = $this->model->GetComentariosPorProducto($id);
        if (!empty($comentarios)) {
            $this->view->response($comentarios, 200); 
        }
    }




 }