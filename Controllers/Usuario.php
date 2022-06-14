<?php
class Usuario extends Controller{
    function __construct(){
        parent::__construct();
        
      

    }
    function render(){
        $this->view->render('Usuario/index');
      
    }



    function Guardar(){
        $this->model->insertarUsuario($_POST);
        $this->view->render('Usuario/index');
    }

    function mostrar(){
        $usuario=$this->model->mostrarUsuario();
        //var_dump($usuario);
        print json_encode($usuario, JSON_UNESCAPED_UNICODE);
       

    }
}

?>