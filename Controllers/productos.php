<?php
class Productos extends Controller{
    function __construct(){
        parent::__construct();
        /*$this->view->mensaje="";
        $this->view->mp=[];
        $this->view->me=[];
       */
      

    }

    function render(){
        /*$MProductos=$this->model->MostrarProductos();
        $this->view->mp=$MProductos;
        $MEspecifica=$this->model->MostrarEspecifica();
        $this->view->me=$MEspecifica;*/
        $this->view->render('Productos/index');
    }

    function RegistrarIngreso(){
        $fecha=date('Y-m-d h:i:s',time());
        $cantidad=$_POST["cantidad"];
        $producto=$_POST["producto"];
        $precio= $_POST["precio"];
        $total=$_POST["total"];
        $ordenCompra=$_POST["ordenCompra"];
        $especifica=$_POST["especifica"];
        $usuario=1;
        
        $mensaje="";
      
        
        if (
        $this->model->insertar([
            'fecha'=>$fecha,
            'cantidad'=>$cantidad,
            'producto'=>$producto,
            'precio'=>$precio,
            'total'=>$total,
            'ordenCompra'=>$ordenCompra,
            'especifica'=>$especifica,
            'usuario'=>$usuario,
        ])) {
            $mensaje="Ingreso Registrado";
        }else {
            $mensaje="Ingreso no Registrado";
        }
        $this->view->mensaje=$mensaje;
        $this->render();
    }
    
}