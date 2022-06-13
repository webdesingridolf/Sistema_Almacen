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

    function SessionConetion(){
        //realizar conexion de sesion
        /*$user =$datos["Username"];
        $pass =$datos["Password"];*/
        if($this->model->Session(["admin"=>"admin","admin1"=>"admin1"])){
            echo "logion correcto";
        }else{
            echo "login incoreccto";
        }
        $this->view->render('Session/index');
        
    }
    function SessionDestroy(){
        echo 'secion destruida';
        sesssion_destroy();
    }
}