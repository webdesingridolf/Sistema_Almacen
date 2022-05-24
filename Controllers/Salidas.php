<?php
class Salidas extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->render('ingresos/ingresos');
      

    }
    function saludo(){
        echo 'hola este es un saludo controlador main';
    }
}

?>