<?php
class Usuario extends Controller{
    function __construct(){
        parent::__construct();
        
      

    }
    function render(){
        $this->view->render('Usuario/index');
        var_dump ($this->model->mostrarUsuario());
    }



    function Guardar(){
        $this->model->insertarUsuario($_POST);
        $this->view->render('Usuario/index');
    }

    function mostrarUsuario(){
        $usuario=$this->model->mostrarUsuario();

        var_dump($usuario);
        //print json_encode($ingresos, JSON_UNESCAPED_UNICODE);
       

    }
}

?>