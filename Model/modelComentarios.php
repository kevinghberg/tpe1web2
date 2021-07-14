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

        $query = $this->getDb()->prepare('SELECT comentario,valoracion,id_comentario from comentarios WHERE id_botin=?');
        $query->execute([$id]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    public function GetComentario($id_comentario)
    {
        $sentencia = $this->getDb()->prepare("select * from comentarios where id_comentario=?");
        $sentencia->execute(array($id_comentario));
        $comment = $sentencia->fetch(PDO::FETCH_OBJ);
        return $comment;
    }

    function DeleteComentario($id_comentario)
    {
        $sentencia = $this->getDb()->prepare("DELETE FROM comentarios WHERE id_comentario=?");
        $sentencia->execute([$id_comentario]);
        return $sentencia;
    }
}
