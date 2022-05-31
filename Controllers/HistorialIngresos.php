<?php
class HistorialIngresos extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->datos=[];
       
      

    }

    function render(){
        $ingresos=$this->model->Mostrar();
        $this->view->datos=$ingresos;
        $this->view->render('Ingresos/Historial_Ingresos');
    }

    
    
}