<?php
class Dashboard extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->ingresos=[];
        $this->view->salidas=[];
        $this->view->servicios=[];
        $this->view->productos=[];
        
      

    }
    function render(){
        $ingresos=$this->model->Ingresos();
        $this->view->ingresos=$ingresos;
        $salidas=$this->model->Salidas();
        $this->view->salidas=$salidas;
        $servicios=$this->model->Servicios();
        $this->view->servicios=$servicios;
        $productos=$this->model->Productos();
        $this->view->productos=$productos;
       
        $this->view->render('Dashboard/index');
    }
    function saludo(){
        echo 'hola este es un saludo controlador main';
    }
}