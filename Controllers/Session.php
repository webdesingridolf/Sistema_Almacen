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
<<<<<<< HEAD
            //$this->model->login(['user'=>'usuario','pasword'=> '1234']);
=======
            $this->model->login([
                'user'=>'usuario',
                'pasword'=> '1234',
                
            ]);
>>>>>>> 255602f2c53c3ebfdabb7e4ae4300b7f9bd42040
           

        }
        
    }

    function SessionConetion(){
        //realizar conexion de sesion
<<<<<<< HEAD
        //$this->view->render("Dashboard/index");
        echo "ingreso sesion conection";

        if($this->model->login(["log_Use"=>$_GET["User"],"log_Pass"=>$_GET["Pass"]])){

            $_SESSION["log_User"]=$_GET["User"]; 
            $_SESSION["log_Pass"]=$_GET["Pass"];
            $this->view->render('Dashboard/index');
=======
<<<<<<< HEAD
        /*$user =$datos["Username"];
        $pass =$datos["Password"];
        if($this->model->Session(["admin"=>"admin","admin1"=>"admin1"])){
=======
        $user =$datos["Username"];
        $pass =$datos["Password"];
        if($this->model->Session($user,$pass)){
>>>>>>> 57cb4eb292ce01271382822382c39a378f3d9fcc
>>>>>>> 255602f2c53c3ebfdabb7e4ae4300b7f9bd42040
            echo "logion correcto";
        }else{
            $this->view->render('Session/index');
            echo "login incoreccto";
        }
<<<<<<< HEAD
        //$this->view->render("Session/index");
=======
<<<<<<< HEAD
        $this->view->render('Session/index');
        */
        echo "funcccion iniciar session";
        if(){
            
        }
=======
        $this->view->render(Session/index");
>>>>>>> 57cb4eb292ce01271382822382c39a378f3d9fcc
>>>>>>> 255602f2c53c3ebfdabb7e4ae4300b7f9bd42040
        
    }
    function SessionDestroy(){
        echo 'secion destruida';
        session_destroy();

        $this->view->render('Session/index');
    }
}