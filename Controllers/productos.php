<?php
class Productos extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->ma=[];
        $this->view->me=[];
        $this->view->mum=[];

       
      

    }

    function render(){
        /*$MProductos=$this->model->MostrarProductos();
        $this->view->mp=$MProductos;
        $MEspecifica=$this->model->MostrarEspecifica();
        $this->view->me=$MEspecifica;*/
        $ingresos=$this->model->Mostrar();
        $this->view->datos=$ingresos;
        $MAlmacen=$this->model->MostrarAlmacen();
        $this->view->ma=$MAlmacen;
        $MEspecifica=$this->model->MostrarEspecifica();
        $this->view->me=$MEspecifica;
        $MUnidad=$this->model->MostrarUnidadMedida();
        $this->view->mum=$MUnidad;
        $this->view->render('Productos/index');
    }

    function RegistrarProducto(){
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
    function MostrarProductos(){
        $ingresos=$this->model->Mostrar();
        print json_encode($ingresos, JSON_UNESCAPED_UNICODE);
       

    }
    
}