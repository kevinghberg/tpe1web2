<?php

require_once('View.php');


class ProductosView extends View{


    function RenderBotines($botines){
        $this->getSmarty()->assign('botines',$botines);
        $this->getSmarty()->display("templates/ventas.tpl");
    }

    function RenderVentas($botines,$marcas,$logged){
        $this->getSmarty()->assign('botines', $botines);
        $this->getSmarty()->assign('marcas', $marcas);
        $this->getSmarty()->assign('logged', $logged);
        $this->getSmarty()->display("templates/ventas.tpl");
        
    }

    function RenderDetalle($botin,$marcas,$logged){
        $this->getSmarty()->assign('botin', $botin);
        $this->getSmarty()->assign('marcas', $marcas);
        $this->getSmarty()->assign('logged', $logged);
        $this->getSmarty()->display("templates/detalles.tpl");
        
    }

    function RenderModificar($botin,$marcas){

        $this->getSmarty()->assign('botin', $botin);
        $this->getSmarty()->assign('marcas', $marcas);
        $this->getSmarty()->display("templates/modificar.tpl");
    }

    
}