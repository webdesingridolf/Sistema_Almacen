<?php
require_once 'Controllers/errores.php';
class App{
     function __construct(){
     
         $url= $_GET['url'];
         $url=rtrim($url,'/');
         $url= explode('/',$url);
         
         $ArchivoController='Controllers/' .$url['0'].'.php';
         if (file_exists($ArchivoController)) {
             require_once $ArchivoController;
             $controller= new $url['0'];
             if (isset($url[1])) {
                 $controller->{$url[1]}();
             }
         }else {
             if ($url[0]=="") {
                 header('location:Dashboard');
             }else {
                $controller= new Errores();
             }
           
           
         }
        
        

        }
       
}