<?php
class Almacenes extends Controller{
    function __construct(){
        parent::__construct();
        
    }
//---------------------------Cargar Vista---------------------------------------------------------------------------
    function render(){
        $this->view->render('almacenes/index');
    }
//------------------------------------Fin cargar Vista-----------------------------------------------------------------
//-------------------------------cargar vista lista Almacen--------------------------------------------------------------

function ListaAlmacen(){
    
    $this->view->render('Almacenes/ListaAlmacen');

}
//-------------------------------fin cargar vista Lista Almacen--------------------------------------------------------------

//-----------------------------------Insertar Almacen---------------------------------------------------------------
    function insertarAlmacen(){

        $nombre=$_POST['nombre'];
        $fecha=date('Y-m-d h:i:s',time());
        if (
            $this->model->insertar([
                'nombre'=>$nombre,
                'fecha'=>$fecha,
                
            ])) {
                $arrResponse=array('status'=>true, 'msg'=>'Registro ingresado correctamente');
                
            }else {
                $arrResponse=array('status'=>false, 'msg'=>'Registro no ingresado ');
                
            }
            echo json_encode($arrResponse);

    }
//------------------------Fin Insertar Almacen---------------------------------------------------------------------




//--------------------Cargar Datos a la tabla-----------------------------------------------------------------------

    function MostrarAlmacen(){
        $fecha = date('Y-m-d h:i:s',time());
        $fechaAnterior = date("Y-m-d", strtotime($fecha. "-1 day"));
        $fechaSiguiente=date("Y-m-d", strtotime($fecha. "+1 day"));
        
        $almacen=$this->model->Mostrar($fechaAnterior,$fechaSiguiente);
        print json_encode($almacen, JSON_UNESCAPED_UNICODE);
    }
//--------------------------------------Fin cargar datos a  la tabla-------------------------------------------------
//--------------------Cargar Datos a la tabla-----------------------------------------------------------------------

function MostrarListaAlmacen(){
    $almacen=$this->model->MostrarLista();
    print json_encode($almacen, JSON_UNESCAPED_UNICODE);
}
//--------------------------------------Fin cargar datos a  la tabla-------------------------------------------------



//------------------------Eliminar Almacen-------------------------------------------------------------------
    function EliminarAlmacen(){
        $id=$_POST['id'];
        if ($this->model->Eliminar($id)) {
                $arrResponse=array('status'=>true, 'msg'=>'Registro Eliminado correctamente');
            }else {
                $arrResponse=array('status'=>false, 'msg'=>'El Almacen esta en uso, No se puede eliminar ');
            }
            echo json_encode($arrResponse);
           

    }
//-------------------------------Fin Eliminar Almacen-------------------------------------------------------------
//---------------------------------Actualizar Almacen------------------------------------------------------------
function ActualizarAlmacen(){
    
    $upNombre=$_POST["upNombre"];
    $upID=$_POST["upId"];
    
    
    if (
        $this->model->actualizar([
        
            'Nombre'=>$upNombre,
            'id'=>$upID,
        ])) {
            $arrResponse=array('status'=>true, 'msg'=>'Registro Actualizado correctamente');
             
        }else {
            $arrResponse=array('status'=>false, 'msg'=>'Registro no Actualizado ');
            
        }
        echo json_encode($arrResponse);

}
//-------------------------------Fin Actualizar Almacen---------------------------------------------------------------



    
}

?>