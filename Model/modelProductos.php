<?php

require_once "modelDB.php";

class modelProductos extends Model
{

    // funciones botines

    function GetBotines()
    {
        $sentencia = $this->getDB()->prepare("SELECT * FROM botines"); // selecciona todo de tabla botines
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function GetBotin($id)
    {
        $sentencia = $this->getDB()->prepare("SELECT * FROM botines WHERE id=?");
        $sentencia->execute(array($id));
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function borrarBotin($id)
    {
        $sentencia = $this->getDB()->prepare("DELETE FROM botines WHERE id=?");
        $sentencia->execute([$id]);
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    function newBotin($modelo, $talle, $marca)
    {
        $query = $this->getDb()->prepare('INSERT INTO botines (modelo,marca,talle)VALUES (?,?,?)');
        $query->execute([$modelo, $marca, $talle]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

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

    function GetBotinesPorMarca($id_marca)
    {

        $sentencia = $this->getDB()->prepare("SELECT * FROM botines WHERE marca=?");
        $sentencia->execute([$id_marca]);
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
}
