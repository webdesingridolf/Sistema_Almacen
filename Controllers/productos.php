<?php
class Productos extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->ma=[];
        $this->view->me=[];
        $this->view->mum=[];

       
      

    }
//--------------------Cargar vista-------------------------------------------------------------------------------
    function render(){
        
       
       
        $MAlmacen=$this->model->MostrarAlmacen();
        $this->view->ma=$MAlmacen;
        $MEspecifica=$this->model->MostrarEspecifica();
        $this->view->me=$MEspecifica;
        $MUnidad=$this->model->MostrarUnidadMedida();
        $this->view->mum=$MUnidad;
        $this->view->render('Productos/index');
    }
//-------------------------------fin cargar vista--------------------------------------------------------------
//-------------------------------cargar vista lista productos--------------------------------------------------------------

    function ListaProductos(){
        $MAlmacen=$this->model->MostrarAlmacen();
        $this->view->ma=$MAlmacen;
        $MEspecifica=$this->model->MostrarEspecifica();
        $this->view->me=$MEspecifica;
        $MUnidad=$this->model->MostrarUnidadMedida();
        $this->view->mum=$MUnidad;
        $this->view->render('Productos/ListaProductos');

    }
//-------------------------------fin cargar vista Lista Productos--------------------------------------------------------------






//-----------------------Registrar Producto-----------------------------------------------------------------------
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
//-------------------------------------------fin Registrar Producto---------------------------------------------------
    
//----------------------------------Mostrar  productos--------------------------------------------------------------   
    function MostrarProductos(){
        $fecha = date('Y-m-d h:i:s',time());
        $fechaAnterior = date("Y-m-d", strtotime($fecha. "-1 day"));
        $fechaSiguiente=date("Y-m-d", strtotime($fecha. "+1 day"));
        $Productos=$this->model->Mostrar($fechaAnterior,$fechaSiguiente);
        print json_encode($Productos, JSON_UNESCAPED_UNICODE);
       

    }
//---------------------------------fin Mostrar Productos----------------------------------------------------------
//----------------------------------Mostrar  Lista de productos--------------------------------------------------------------   
function MostrarListaProductos(){
    $Productos=$this->model->ListaProductos();
    print json_encode($Productos, JSON_UNESCAPED_UNICODE);
   

}
//---------------------------------fin Mostrar   Lista de  Productos----------------------------------------------------------




//-------------------------------eliminar productos----------------------------------------------------------------

    function EliminarProducto(){
        $id=$_POST['id'];
        if ($this->model->eliminar($id)) {
                $arrResponse=array('status'=>true, 'msg'=>'Registro Eliminado correctamente');
            }else {
                $arrResponse=array('status'=>false, 'msg'=>'El Producto esta en uso, No se puede eliminar ');
            }
            echo json_encode($arrResponse);
      
    }
//-------------------------------------------fin eliminar productos-----------------------------------------------

//--------------------------------------------Actualizar Producto--------------------------------------------------
    function ActualizarProducto(){
            
        
        $upDetalle=$_POST["upDetalle"];
        $upUM=$_POST["upUnidadMedida"];
        $upAlamacen= $_POST["upAlmacen"];
        $upStock=$_POST["upStock"];
        $upEspecifica=$_POST["upEspecifica"];
        $upID=$_POST["upId"];
        
        if (
            $this->model->actualizar([
            
                'Detalle'=>$upDetalle,
                'UM'=>$upUM,
                'Almacen'=>$upAlamacen,
                'Stock'=>$upStock,
                'Especifica'=>$upEspecifica,
                'id'=>$upID,
            ])) {
                $arrResponse=array('status'=>true, 'msg'=>'Registro Actualizado correctamente');
                 
            }else {
                $arrResponse=array('status'=>false, 'msg'=>'Registro no Actualizado ');
                
            }
            echo json_encode($arrResponse);



        
    }
//-------------------------------------------Fin Actualizar producto--------------------------------------------
    
    
}