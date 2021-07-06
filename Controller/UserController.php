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
        $this->view->showLogin();
    }



    public function registrar()
    {
        $user = $_POST['usernameRegister'];
        $pass = $_POST['passwordRegister'];
        $this->model->add($user, $pass);
            header("Location: " . BASE_URL . 'index');
        }

    public function verify()
    {
        if (!empty($_POST['usernameLogin']) && !empty($_POST['passwordLogin'])) {
            $user = $_POST['usernameLogin'];
            $pass = $_POST['passwordLogin'];
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

    public function logout()
    {
        AuthHelper::logout();
        header("Location: " . BASE_URL . 'login');
    }
}
