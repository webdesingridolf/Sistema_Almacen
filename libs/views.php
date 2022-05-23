<?php 
class View{
    function __construct(){
        
    }
    function render($nombre){
        require 'Views/'.$nombre.'.php';
    }


}
?>