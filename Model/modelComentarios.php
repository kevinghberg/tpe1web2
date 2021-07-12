<?php
require_once "modelDB.php";




class ComentariosModel extends Model
{


    function InsertComentario($comentario, $valoracion, $id_botin)
    {

        $sentencia = $this->getDb()->prepare("INSERT INTO comentarios (comentario, valoracion, id_botin) VALUES (?,?,?)");
        $sentencia->execute(array($comentario, $valoracion, $id_botin));
        return $this->getDb()->lastInsertId();
    }

    function GetComentariosPorProducto($id)
    {
        $sentencia = $this->getDb()->prepare("SELECT * FROM comentarios WHERE id_botin=?");
        $sentencia->execute(array($id));
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }


    /*function GetComentario($id_comentario){
        $sentencia = $this->db->prepare("SELECT * FROM comentarios WHERE id_comentario=?");
        $sentencia->execute(array($id_comentario));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }*/


    public function addComment($comentario, $valoracion, $id_botin)
    {
        $sentencia = $this->getDb()->prepare("INSERT INTO comentarios (comentario, valoracion, id_botin) VALUES (?,?,?)");
        $sentencia->execute(array($comentario, $valoracion, $id_botin));
    }
}
