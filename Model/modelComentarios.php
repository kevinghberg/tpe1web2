<?php

class ComentariosModel{



    function InsertComentario($comentario, $valoracion, $id_botin){
        $sentencia = $this->db->prepare("INSERT INTO comentarios (comentario, valoracion, id_botin) VALUES (?,?,?)");
        $sentencia->execute(array($comentario, $valoracion, $id_botin));
        return $this->db->lastInsertId();
    }

  }