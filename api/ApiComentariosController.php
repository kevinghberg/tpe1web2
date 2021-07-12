<?php

require_once "./Model/modelComentarios.php";
require_once "./api/ApiController.php";
require_once "./api/api.view.php";

class ApiComentariosController extends ApiController
{

    function __construct()
    {
        parent::__construct();
        $this->model = new ComentariosModel();
        $this->view = new APIView();
    }

    public function GetComentarios($id)
    {

        $comentarios = $this->model->GetComentariosPorProducto($id);
        if (!empty($comentarios)) {
            $this->view->response($comentarios, 200);
        }
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





    public function addComment()
    {
        $body = $this->GetData();

        $comentario = $body->comentario;
        $valoracion = $body->valoracion;
        $id_botin = $body->id_botin;

        if (($comentario != "") && ($valoracion != "") && ($id_botin != "")) {

            $comment = $this->model->addComment($comentario, $valoracion, $id_botin);
        }
    }
}
