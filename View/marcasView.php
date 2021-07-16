<?php


class marcasView extends View{

    function RenderMarcas($marcas,$logged){
        $this->getSmarty()->assign('marcas', $marcas);
        $this->getSmarty()->assign('logged', $logged);
        $this->getSmarty()->display("templates/marcas.tpl");
        
    }

   
    
}