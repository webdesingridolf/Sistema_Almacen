<?php
class Session extends Controller{
    function __construct(){
        parent::__construct();
        
        session_start();

    }
    function render(){
        if (isset($_Session["log_User"]) and isset($_Session["log_Pass"])) {
            $this->view->render('Dashboard/index');
            
        }
        else {

            $this->view->render('Session/index');
            $this->model->login([
                'user'=>'usuario',
                'pasword'=> '1234',
                
            ]);
           

        }
        
    }

    function SessionConetion($datos){
        //realizar conexion de sesion
<<<<<<< HEAD
        /*$user =$datos["Username"];
        $pass =$datos["Password"];
        if($this->model->Session(["admin"=>"admin","admin1"=>"admin1"])){
=======
        $user =$datos["Username"];
        $pass =$datos["Password"];
        if($this->model->Session($user,$pass)){
>>>>>>> 57cb4eb292ce01271382822382c39a378f3d9fcc
            echo "logion correcto";
        }else{
            echo "login incoreccto";
        }
<<<<<<< HEAD
        $this->view->render('Session/index');
        */
        echo "funcccion iniciar session";
        if(){
            
        }
=======
        $this->view->render(Session/index");
>>>>>>> 57cb4eb292ce01271382822382c39a378f3d9fcc
        
    }
    function SessionDestroy(){
        echo 'secion destruida';
        sesssion_destroy();
    }
}