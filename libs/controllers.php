<?php 
class Controller{
    public function __construct(){
        
        $this->view= new View();
    }
    function loadModel($model){
        $url='Models/'.$model.'model.php';
        if (file_exists($url)) {
            require $url;
            
            $modelName=$model.'Model';
            $this->model=new $modelName();
        }
    }
    function getGet($name){
        return $_GET[$name];
    }
    function getPost($name){
        return $_POST[$name];
        
    }
    /*function redirect($route,$mensajes){
        $data=[];
        $params='';

        foreach ($mesajes as key =>$mensaje){
            array_push($data,$key.'='.$mensaje);
        }
        $params=join('&',$data);
        if ($params≠'') {
            $params='?'.$params;
        }
        header('location: '.constant('BASE_URL').$route.$params);
    }*/

}
?>