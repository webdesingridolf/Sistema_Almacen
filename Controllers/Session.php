<?php
class Session extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->datos=[];
        
        //session_start();

    }
    function render(){
        if (isset($_SESSION["log_User"]) and isset($_SESSION["log_Pass"])) {
           
            $this->view->render('Dashboard/index');
        }
        else {
            $this->view->render('Session/index');
            //$this->view->render("Dashboard/index");
        }
        
    }
    function SessionConetion(){
        $login=$this->model->login(["log_User" => $_POST["User"],"log_Pass" => $_POST["Pass"]]);
        if ($login) {
            $id=$login['id_Usuario'];
            $TipoUsuario=$login['Tipo_Usuario'];
            
            
          
            
            $_SESSION["log_User"]=$_POST["User"]; 
            $_SESSION["log_Pass"]=$_POST["Pass"];
            $_SESSION["id_User"]=$id;
            $_SESSION["Tipo_Usuario"]=$TipoUsuario;
            $this->view->render('Dashboard/index');
            
        }
        else {

            $this->view->render('Session/index');
        //$this->view->render("Dashboard/index");
        //echo "ingreso sesion conection";
        }
    }


    function SessionDestroy(){
        //echo 'secion destruida';
        session_unset();
        session_destroy();
        $this->view->render('Session/index');
    }
}