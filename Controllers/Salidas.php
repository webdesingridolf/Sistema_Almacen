<?php
class Salidas extends Controller{
    function __construct(){
        parent::__construct();
        
      

    }
    function render(){
        $this->view->render('Salidas/index');
    }
}

?>