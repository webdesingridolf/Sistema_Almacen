<?php
class Ingresos extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->render('Ingresos/ingresos');
      

    }
    function RegistrarIngreso(){
        $fecha=date('Y-m-d h:i:s',time());
        $cantidad=12;
        $producto='dsbvds';
        $precio= 19;
        $total=254;
        $ordenCompra=2121;
        $especifica='especifica';
        $usuario=1;
       /* $producto=$_POST['Producto'];
        $cantidad=$_POST['Cantidad'];
        $precio=$_POST['precio'];
        $total=$_POST['Total'];
        $ordenCompra=$_POST['OrdenCompra'];
        $especifica=$_POST['especifica'];*/
        
        echo "ingreos registreado ";
        $this->model->insertar([
            'fecha'=>$fecha,
            'cantidad'=>$cantidad,
            'producto'=>$producto,
            'precio'=>$precio,
            'total'=>$total,
            'ordenCompra'=>$ordenCompra,
            'especifica'=>$especifica,
            'usuario'=>$usuario,
        ]);
    }
}