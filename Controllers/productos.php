<?php
class Productos extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->ma=[];
        $this->view->me=[];
        $this->view->mum=[];

       
      

    }

    function render(){
        
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
        $detalle=$_POST["detalle"];      
        $unidadmedida=$_POST["unidadMedida"];
        $stock=$_POST["stock"];
        $almacen= $_POST["almacen"];
        $Especifica=$_POST["especifica"];
        $fecha=date('Y-m-d h:i:s',time()); 
        $mensaje="";
      
        
        if (
        $this->model->insertar([
            'fecha'=>$fecha,
            'detalle'=>$detalle,
            'unidadmedida'=>$unidadmedida,
            'stock'=>$stock,
            'almacen'=>$almacen,
            'especifica'=>$Especifica,
            
        ])) {
            $arrResponse=array('status'=>true, 'msg'=>'Registro ingresado correctamente');
        }else {
            $arrResponse=array('status'=>false, 'msg'=>'Registro no ingresado ');
        }
        echo json_encode($arrResponse);
        
    }
    function MostrarProductos(){
        $ingresos=$this->model->Mostrar();
        print json_encode($ingresos, JSON_UNESCAPED_UNICODE);
       

    }
    
}