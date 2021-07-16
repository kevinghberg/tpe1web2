<?php
include_once('./Model/modelMarcas.php');
include_once('./Model/modelProductos.php');
include_once('./View/productosView.php');

class ProductosController extends Controller
{
    private $modelProductos;
    private $view;

    public function __construct()
    {

        $this->modelProductos = new  modelProductos();
        $this->modelMarcas = new  modelMarcas();
        $this->view = new productosView();
    }



    /**
     * Muestra la lista de Botines.
     **/

    function showBotines()
    {
        $botines = $this->modelProductos->GetBotines();

        $this->view->RenderBotines($botines);
    }

    /**
     * Muestra la lista de Ventas.
     **/

    function showVentas()
    {
        $botines = $this->modelProductos->GetBotines();
        $marcas = $this->modelMarcas->GetMarcas();
        $logged = $this->CheckLoggedIn();

        $this->view->RenderVentas($botines, $marcas, $logged);
    }

    /**
     * Borra 1 botin de la tabla.
     **/

    function borrarBotin($id)
    {
        AuthHelper::checkLoggedIn();
        $this->modelProductos->borrarBotin($id);
        header("Location: " . BASE_URL . 'ventas');
    }

    /**
     * Agrega 1 botin a la tabla.
     **/

    function agregarBotin()
    {
        AuthHelper::checkLoggedIn();

        $modelo = $_POST['inputModelo'];
        $talle = $_POST['inputTalle'];
        $marca = $_POST['inputMarca'];

        if ((isset($_FILES['imagen']) && ($_FILES['imagen']['size'] > 1))) {


            $nombreArchivo = $_FILES['imagen']['name'];

            $temporario = $_FILES['imagen']['tmp_name'];


            $extensionArchivo = pathinfo($nombreArchivo, PATHINFO_EXTENSION);

            $this->modelProductos->newBotinConImagen($modelo, $talle, $marca, $nombreArchivo, $extensionArchivo, $temporario);
        } else

            $this->modelProductos->newBotin($modelo, $marca, $talle);

        header("Location: " . BASE_URL . 'ventas');
    }


    /**
     * Selecciona detalles de un botin($id)
     **/

    function GetDetalles($id)
    {

        $botin = $this->modelProductos->GetBotin($id);
        $marcas = $this->modelMarcas->GetMarcas();
        $logged = $this->CheckLoggedIn();
        $this->view->RenderDetalle($botin, $marcas, $logged);
    }


    /**
     * filtra una categoria (marca)
     **/

    function filtrar()
    {
        $id_marca = $_POST['marcaInput'];


        $botin = $this->modelProductos->GetBotinesPorMarca($id_marca);
        $marcas = $this->modelMarcas->GetMarcas();
        $logged = $this->CheckLoggedIn();

        $this->view->RenderVentas($botin, $marcas, $logged);
    }

    /**
     * cambia el valor boolean de un botin (dice si esta vendido)
     **/

    function RenderModificar($id)
    {

        AuthHelper::checkLoggedIn();


        $botin = $this->modelProductos->GetBotin($id);

        $marca = $this->modelMarcas->GetMarcas();

        $this->view->RenderModificar($botin, $marca);
    }

    function modificarBotin()
    {

        AuthHelper::checkLoggedIn();

        $modelo = $_POST['inputModificarModelo'];
        $talle = $_POST['inputModificarTalle'];
        $marca = $_POST['inputModificarMarca'];
        $id = $_POST['inputId'];


        if (!empty($modelo) && !empty($talle) && !empty($marca)) {

            if ((isset($_FILES['imagen']) && ($_FILES['imagen']['size'] > 1))) {

                $nameImage = $_FILES['imagen']['name'];//nombre 

                $tempImagePath = $_FILES['imagen']['tmp_name'];// path temporario


                $ext = pathinfo($nameImage, PATHINFO_EXTENSION);//obtengo la extension

                $hashed =  uniqid() .'.'. $ext; //la convierto a un hash uniqco
                $path = 'imagenes/';

                $destino = $path . $hashed;

                move_uploaded_file($tempImagePath, $destino);

            } else

                $destino = '';

            $this->modelProductos->modificarBotin($id, $modelo, $talle, $marca,$destino);
        }

        header("Location: " . BASE_URL . 'ventas');
    }


    function CheckLoggedIn()
    {

        if (!isset($_SESSION["admin"])) {
            $logged = "false";
        } elseif ($_SESSION["admin"] == 1) {
            $logged = "admin";
        } else {
            $logged = "user";
        }
        return $logged;
    }
}
