<?php
class Servicios extends Controller{
    function __construct(){
        parent::__construct();
        
      

    }
    function render(){
        $this->view->render('Servicios/index');
    }
}

?>