<?php
class Session extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->datos=[];
        $this->view->ingresos=[];
        $this->view->salidas=[];
        $this->view->servicios=[];
        $this->view->productos=[];
        
        //session_start();

    }
    function render(){
        if (isset($_SESSION["log_User"]) and isset($_SESSION["log_Pass"])) {
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
        else {
            $this->view->render('Session/index');
            //$this->view->render("Dashboard/index");
        }
        
    }
    function SessionConetion(){
        $login=$this->model->login(["log_User" => $_POST["User"],"log_Pass" => $_POST["Pass"]]);
        if ($login) {
            $ingresos=$this->model->Ingresos();
            $this->view->ingresos=$ingresos;
            $salidas=$this->model->Salidas();
            $this->view->salidas=$salidas;
            $servicios=$this->model->Servicios();
            $this->view->servicios=$servicios;
            $productos=$this->model->Productos();
            $this->view->productos=$productos;
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