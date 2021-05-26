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
     * @param $id
     * Visualiza index
     */

    function Home()
    {
        $this->view->RenderHome();
    }

 
}
