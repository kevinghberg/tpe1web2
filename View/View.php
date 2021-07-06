<?php

require_once "./libs/Smarty.class.php";

require_once('Helpers/AuthHelper.php');


class View
{

    private $authHelper;

    private $smarty;

    public function __construct()
    {
        $this->smarty = new Smarty();
        $this->smarty->assign('base_url', BASE_URL);
        $this->authHelper = new AuthHelper();
        $username = $this->authHelper->getLoggedUserName();
        $this->smarty->assign('username', $username);
    }

    public function getSmarty()
    {
        return $this->smarty;
    }

    public function getUsername()
    {
        $username = $this->authHelper->getLoggedUserName();

        return $username;   
    }

    function RenderHome()
    {
        $this->smarty->display("templates/index.tpl");
    }


    function ShowHomeLocation()
    {
        header("Location: " . BASE_URL . "index");
    }
}
