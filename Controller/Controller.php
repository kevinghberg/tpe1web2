<?php


require_once "./View/View.php";
require_once "./Model/modelDB.php";


class Controller
{   

    private $view;


    function __construct()
    {
        $this->view = new View();
    
    }
    /**
     *
     * Visualiza index
     */

    function Home()
    {
        $this->view->RenderHome();
        
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
