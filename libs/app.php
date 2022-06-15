<?php
require_once 'Controllers/errores.php';
class App{
     function __construct(){
        session_start();
        if (isset($_GET['url'])) {
            $url= $_GET['url'];
            $url=rtrim($url,'/');
            $url= explode('/',$url);
        }
         
         
         //$ArchivoController='Controllers/' .$url['0'].'.php';
         /*if (file_exists($ArchivoController)) {
             require_once $ArchivoController;
             $controller= new $url['0'];
             $controller->loadModel($url[0]);
             if (isset($url[1])) {
                 $controller->{$url[1]}();
             }
             else{
                 $controller->render();
             }
         }else {
             if ($url[0]=="") {
                 header('location:Session');
                 $controller->loadModel('dashboard');
                 $controller->render();
             }else {
                $controller= new Errores();
             }
           
           
         }*/
         if (isset($_SESSION["log_User"])) {

            $ArchivoController='Controllers/' .$url['0'].'.php';
            if (file_exists($ArchivoController)) {
                require_once $ArchivoController;
                $controller= new $url['0'];
                $controller->loadModel($url[0]);
                if (isset($url[1])) {
                    $controller->{$url[1]}();
                }
                else{
                    $controller->render();
                }
                }else {
                    if ($url[0]=="") {
                        header('location:Session');
                        $controller->loadModel('dashboard');
                        $controller->render();
                    }else {
                    $controller= new Errores();
                    }
                }
         }else {
            $url['0']="Session";
            $ArchivoController='Controllers/' .$url['0'].'.php';

            if (file_exists($ArchivoController)) {
                require_once $ArchivoController;
                $controller= new $url['0'];
                $controller->loadModel($url[0]);
                if (isset($url[1])) {
                    $controller->{$url[1]}();
                }
                else{
                    $controller->render();
                }
            }else {
                if ($url[0]=="") {
                    header('location:Session');
                    $controller->loadModel('dashboard');
                    $controller->render();
                }else {
                    $controller= new Errores();
                }
            }
         }



        }
       
}