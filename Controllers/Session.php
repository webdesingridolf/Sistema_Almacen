<?php
class Session extends Controller{
    function __construct(){
        parent::__construct();
        
        session_start();

    }
    function render(){
        if (isset($_SESSION["log_User"]) and isset($_SESSION["log_Pass"])) {
            
            $_SESSION["log_User"]=$_GET["User"]; 
            $_SESSION["log_Pass"]=$_GET["Pass"];
            $this->view->render('Dashboard/index');
        }
        else {

            $this->view->render('Session/index');
        //$this->view->render("Dashboard/index");
        echo "ingreso sesion conection";
        }
        
    }
    function SessionDestroy(){
        echo 'secion destruida';
        session_destroy();

        $this->view->render('Session/index');
    }
}