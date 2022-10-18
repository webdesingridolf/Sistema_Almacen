<?php
class Reportes extends Controller{
    function __construct(){
        parent::__construct();
        

       
      

    }
//--------------------Cargar vista-------------------------------------------------------------------------------
    function render(){
        
        
        $this->view->render('Reportes/index');
    }
//-------------------------------fin cargar vista--------------------------------------------------------------


}
?>