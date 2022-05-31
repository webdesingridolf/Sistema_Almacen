<?php
class Dashboard extends Controller{
    function __construct(){
        parent::__construct();
        
      

    }
    function render(){
        $this->view->render('Dashboard/index');
    }
    function saludo(){
        echo 'hola este es un saludo controlador main';
    }
}