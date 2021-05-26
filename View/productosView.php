<?php

require_once('View.php');


class ProductosView extends View{



    function RenderMarcas($marcas){
        $this->getSmarty()->assign('marcas', $marcas);
        $this->getSmarty()->display("templates/marcas.tpl");
        
    }

    function RenderBotines($botines){
        $this->getSmarty()->assign('botines',$botines);
        $this->getSmarty()->display("templates/ventas.tpl");
    }

    function RenderVentas($botines,$marcas){
        $this->getSmarty()->assign('botines', $botines);
        $this->getSmarty()->assign('marcas', $marcas);
        $this->getSmarty()->display("templates/ventas.tpl");
        
    }

    function RenderDetalle($botin,$marcas){
        $this->getSmarty()->assign('botin', $botin);
        $this->getSmarty()->assign('marcas', $marcas);
        $this->getSmarty()->display("templates/detalles.tpl");
        
    }

    
}