<?php
class Ingresos extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->mensaje="";
        $this->view->mp=[];
        $this->view->me=[];
        $this->view->datos=[];
       
      

    }

    function render(){
        $ingresos=$this->model->Mostrar();
        $this->view->datos=$ingresos;
        $MProductos=$this->model->MostrarProductos();
        $this->view->mp=$MProductos;
        $MEspecifica=$this->model->MostrarEspecifica();
        $this->view->me=$MEspecifica;
        $this->view->render('Ingresos/index');
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
        /*
       
        echo $cantidad;
        echo "<br>";
        echo $producto;
        echo "<br>";
        echo $precio;
        echo "<br>";
        echo $total;
        echo "<br>";
        echo $ordenCompra;
        echo "<br>";
        echo $especifica;
        echo "<br>";
        echo $usuario;
        */
        
        
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
            $arrResponse=array('status'=>true, 'msg'=>'Registro ingresado correctamente');
            
        }else {
            $arrResponse=array('status'=>false, 'msg'=>'Registro no ingresado ');
            
        }
        echo json_encode($arrResponse);
        $this->view->mensaje=$mensaje;
       /* 
        $this->render();
        */ 
    }
    function MostrarIngresos(){
        $ingresos=$this->model->Mostrar();
        print json_encode($ingresos, JSON_UNESCAPED_UNICODE);
       

    }
    
}