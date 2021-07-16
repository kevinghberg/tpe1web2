<?php

require_once "modelDB.php";

class modelProductos extends Model
{

    // funciones botines

    function getBotines()
    {
        $sentencia = $this->getDB()->prepare("SELECT * FROM botines"); 
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function GetBotin($id)
    {
        $sentencia = $this->getDB()->prepare("SELECT id,modelo,marca,talle,stock,imagen FROM botines WHERE id=?");
        $sentencia->execute([$id]);
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    function borrarBotin($id)
    {
        $sentencia = $this->getDB()->prepare("DELETE FROM botines WHERE id=?");
        $sentencia->execute([$id]);
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    

    function GetBotinesPorMarca($id_marca)
    {

        $sentencia = $this->getDB()->prepare("SELECT * FROM botines WHERE marca=?");
        $sentencia->execute([$id_marca]);
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    function modificarBotin($id,$modelo,$talle,$marca)
    {
        $sentencia = $this->getDB()->prepare("UPDATE botines SET modelo=?,talle=?,marca=? WHERE id=?");
        $sentencia->execute([$modelo,$talle,$marca,$id]);
        return $sentencia->fetch(PDO::FETCH_OBJ);
        
    }

    function uploadImagen($imagen) {

        $filepath = 'imagenes/' . uniqid() . '.jpg';
        
        return $filepath;

    }

    function newBotinConImagen($modelo,$talle,$marca,$nombreArchivo,$extensionArchivo,$temporario){

        $nuevoNombre=md5(time().$nombreArchivo).'.'.$extensionArchivo;

        $filepath = 'imagenes/';

        $destino = $filepath.$nuevoNombre;

        move_uploaded_file($temporario,$destino);
        

        $query = $this->getDb()->prepare('INSERT INTO botines (modelo,marca,talle,imagen)VALUES (?,?,?,?)');
        $query->execute([$modelo, $marca, $talle,$destino]);
        return $query->fetch(PDO::FETCH_OBJ);

    }
    function newBotin($modelo, $marca, $talle ,$imagen=NULL)
    {

        $filepath = null;

        if ($imagen)
            $filepath= $this->uploadImagen($imagen);

        $query = $this->getDb()->prepare('INSERT INTO botines (modelo,marca,talle,imagen)VALUES (?,?,?,?)');
        $query->execute([$modelo, $marca, $talle,$filepath]);
        return $query->fetch(PDO::FETCH_OBJ);
       
    }

    
    
}
