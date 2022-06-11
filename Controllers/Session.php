<?php
class Session extends Controller{
    function __construct(){
        parent::__construct();
        
      

    }
    function render(){
        $this->view->render('Session/index');
    }
    function saludo(){
        echo 'hola este es un saludo controlador main';
    }
}