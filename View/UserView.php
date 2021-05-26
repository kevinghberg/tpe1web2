<?php

require_once('View.php');

class UserView extends View {

    public function __construct() {
        parent::__construct();
    }

    public function showLogin($error=null) {
        $this->getSmarty()->assign('title', "Login");
        $this->getSmarty()->assign('mensaje', $error);        
        $this->getSmarty()->assign('index', BASE_URL.'login');
        $this->getSmarty()->display('templates/login.tpl');
    }
}
