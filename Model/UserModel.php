<?php

require_once "ModelDB.php";

class UserModel extends Model{


    public function     getUserByUsername($username) {
        $query = $this->getDb()->prepare('SELECT * FROM `user` WHERE username = ?');
        $query->execute(array(($username)));
        return $query->fetch(PDO::FETCH_OBJ);
    }


    public function add($user, $pass) {

        $passEnc = password_hash($pass, PASSWORD_DEFAULT);

        $query = $this->getDb()->prepare('INSERT INTO `user` (username, password) 
                                            VALUES (?, ?)');

        $query->execute([$user, $passEnc]);

    }



    function UpdateUser($id_user){
        $sentencia = $this->getDb()->prepare('UPDATE user SET rol=1 WHERE id_user=?');
        $sentencia->execute(array($id_user));

    }

    public function getUsers(){

        $query = $this->getDb()->prepare('SELECT * FROM user');

        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);

    }
    function deleteUser($id){
        $sentencia = $this->getDb()->prepare("DELETE FROM user WHERE id=?");
        $sentencia->execute([$id]);
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    function updateToUser($id){
        $sentencia = $this->getDb()->prepare('UPDATE user SET admin=0 WHERE id=?');
        $sentencia->execute(array($id));
    }

    function updateToAdmin($id){
        $sentencia = $this->getDb()->prepare('UPDATE user SET admin=1 WHERE id=?');
        $sentencia->execute(array($id));
    }

}