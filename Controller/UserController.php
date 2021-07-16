<?php

include_once('view/UserView.php');
include_once('model/UserModel.php');


class userController
{

    private $model;
    private $view;




    public function __construct()
    {
        $this->model = new UserModel();
        $this->view = new UserView();
    }



    public function showLogin()
    {
        $logged = $this->CheckLoggedIn();
        $this->view->showLogin($logged);
    }



    public function registrar()
    {
        $user = $_POST['usernameRegister'];
        $pass = $_POST['passwordRegister'];

        $this->model->add($user, $pass);


        if (!empty($_POST['usernameRegister']) && !empty($_POST['passwordRegister'])) {

            $userDb = $this->model->getUserByUsername($user);

            if (!empty($userDb) && password_verify($pass, $userDb->password)) {
                AuthHelper::login($userDb);
                header('Location: ' . BASE_URL . "index");
            } else
                $this->view->showLogin("Login incorrecto, password o usuario incorrecto");
        } else {
            $this->view->showLogin("Login incompleto");
        }
    }



    public function verify()
    {

        
        if (!empty($_POST['usernameLogin']) && !empty($_POST['passwordLogin'])) {
            $user = $_POST['usernameLogin'];
            $pass = $_POST['passwordLogin'];
            $userDb = $this->model->getUserByUsername($user);

            if (!empty($userDb) && password_verify($pass, $userDb->password)) {
                AuthHelper::login($userDb);
                $_SESSION["admin"] = $userDb->admin;
                header('Location: ' . BASE_URL . "index");
            } else
                $this->view->showLogin("Login incorrecto, password o usuario incorrecto");
        } else {
            $this->view->showLogin("Login incompleto");
        }
    }

    public function logout()
    {
        AuthHelper::logout();
        header("Location: " . BASE_URL . 'login');
    }



    public function listarUsuarios()
    {

        $users = $this->model->getUsers();

        $logged = $this->CheckLoggedIn();

        $this->view->showListaUsuarios($users,$logged);
    }

    function deleteUser($id)
    {

        AuthHelper::checkLoggedIn();

        $this->model->deleteUser($id);

        $this->view->renderListaUsuarios();
    }




    function setUserToAdmin($id)
    {


        AuthHelper::checkLoggedIn();
        
        $this->model->updateToAdmin($id);

        $this->view->renderListaUsuarios();
    }

    function setAdminToUser($id)
    {


        AuthHelper::checkLoggedIn();

        $this->model->updateToUser($id);

        $this->view->renderListaUsuarios();
    }

    
    private function CheckLoggedIn(){
        
        if(!isset($_SESSION["admin"])){
            $logged = "false";
        } elseif ($_SESSION["admin"] == 1){
            $logged = "admin";
        } else {
            $logged = "user";
        }
        return $logged;
    }
}
