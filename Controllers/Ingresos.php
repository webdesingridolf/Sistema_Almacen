<?php
class Ingresos extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->mensaje="";
       
      

    }

    function render(){
        $this->view->render('Ingresos/example');
    }

    function RegistrarIngreso(){
        $fecha=date('Y-m-d h:i:s',time());
        $cantidad=12;
        $producto=1;
        $precio= 19;
        $total=254;
        $ordenCompra=2121;
        $especifica=2;
        $usuario=1;
        $mensaje="";
       /* $producto=$_POST['Producto'];
        $cantidad=$_POST['Cantidad'];
        $precio=$_POST['precio'];
        $total=$_POST['Total'];
        $ordenCompra=$_POST['OrdenCompra'];
        $especifica=$_POST['especifica'];*/
        
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