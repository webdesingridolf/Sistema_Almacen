<?php
class Session extends Controller{
    function __construct(){
        parent::__construct();
        
        session_start();

    }
    function render(){
        if (isset($_SESSION["log_User"]) and isset($_SESSION["log_Pass"])) {
            $this->view->render('Dashboard/index');
            echo $_Session["log_User"]; 
            echo $_Session["log_Pass"];
        }
        else {

            $this->view->render('Session/index');
            //$this->model->login(['user'=>'usuario','pasword'=> '1234']);
           

        }
        
    }

    function SessionConetion(){
        //realizar conexion de sesion
        //$this->view->render("Dashboard/index");
        echo "ingreso sesion conection";

        if($this->model->login(["log_Use"=>$_GET["User"],"log_Pass"=>$_GET["Pass"]])){

            $_SESSION["log_User"]=$_GET["User"]; 
            $_SESSION["log_Pass"]=$_GET["Pass"];
            $this->view->render('Dashboard/index');
            echo "logion correcto";
        }else{
            $this->view->render('Session/index');
            echo "login incoreccto";
        }
        //$this->view->render("Session/index");
        
    }
    function SessionDestroy(){
        echo 'secion destruida';
        session_destroy();

        $this->view->render('Session/index');
    }
}