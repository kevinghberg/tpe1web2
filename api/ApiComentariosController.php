<?php

require_once "./Model/modelComentarios.php";
require_once "ApiController.php";
require_once "api.view.php";

class ApiComentariosController extends ApiController
{

    function __construct()
    {
        parent::__construct();
        $this->model = new ComentariosModel();
        $this->view = new APIView();
    }

    


    public function GetComentarios($params = [])
    {
        $id = $params[':ID'];

        $comentarios = $this->model->GetComentariosPorProducto($id);
   
        $this->view->response($comentarios, 200);
    }

    public function InsertComentario()
    {
        $body = $this->GetData();

        $comentario = $this->model->InsertComentario($body->comentario, $body->valoracion, $body->id_botin);

        if (!empty($comentario)) // verifica si la tarea existe
            $this->view->response($this->model->GetComentario($comentario), 200);
        else
            $this->view->response("El comentario no se pudo agregar", 404);
    }

    public function deleteComentario($params = [])
    {
        $id_comentario = $params[':ID'];
        $comment = $this->model->GetComentario($id_comentario);
        if ($comment) {
            $this->model->DeleteComentario($id_comentario);
            $this->view->response($comment, 200);
        } else {
            $this->view->response("Error", 500);
        }
    }       

    
}
