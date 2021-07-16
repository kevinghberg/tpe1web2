<?php

class modelMarcas extends Model{


// funciones marcas

function GetMarcas()
{
    $sentencia = $this->getDB()->prepare("SELECT * FROM marcas"); //
    $sentencia->execute();
    return $sentencia->fetchAll(PDO::FETCH_OBJ);
}

function borrarMarca($id)
{

    $sentencia = $this->getDB()->prepare("DELETE FROM marcas WHERE id_marca=?");
    $sentencia->execute([$id]);
    return $sentencia->fetch(PDO::PARAM_BOOL);
}

function newMarca($marca, $paisdeorigen)
{

    $query = $this->getDb()->prepare('INSERT INTO marcas (nombre,paisOrigen)VALUES (?,?)');
    $query->execute([$marca, $paisdeorigen]);
    return $query->fetch(PDO::FETCH_OBJ);
}



}