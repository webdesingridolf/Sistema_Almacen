<?php
class Ingresos extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->render('Ingresos/ingresos');
      

    }
    function saludo(){
        echo 'hola este es un saludo controlador main';
    }
}