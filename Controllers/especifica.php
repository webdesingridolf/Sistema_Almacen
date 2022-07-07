<?php
class Especifica extends Controller{
    function __construct(){
        parent::__construct();
        
      

    }
//--------------------------------Cargar Vista-------------------------------------------------------------------------
    function render(){
        $this->view->render('Especifica/index');
    }
//--------------------------------fin Cargar Vista------------------------------------------------------------------
//-------------------------------cargar vista lista Especifica--------------------------------------------------------------

function ListaEspecifica(){
    
    $this->view->render('Especifica/ListaEspecifica');

}
//-------------------------------fin cargar vista Lista Especifica--------------------------------------------------------------

//---------------------------------------Insertar Especifica-----------------------------------------------------------------
    function insertarEspecifica(){

        $detalle=$_POST['detalle'];
        $codigo=$_POST['codigo'];
        $fecha=date('Y-m-d h:i:s',time());
        if (
            $this->model->insertar([
                'detalle'=>$detalle,
                'codigo'=>$codigo,
                'fecha'=>$fecha,
                
            ])) {
                $arrResponse=array('status'=>true, 'msg'=>'Registro ingresado correctamente');
                
            }else {
                $arrResponse=array('status'=>false, 'msg'=>'Registro no ingresado ');
                
            }
            echo json_encode($arrResponse);

    }
//------------------------------------------fin insertar Especifica-----------------------------------------------------

//-----------------------------------------------Mostrar  Especifica por fecha----------------------------------------------

    function MostrarEspecifica(){
        $fecha = date('Y-m-d h:i:s',time());
        $fechaAnterior = date("Y-m-d", strtotime($fecha. "-1 day"));
        $fechaSiguiente=date("Y-m-d", strtotime($fecha. "+1 day"));
        $especifica=$this->model->Mostrar($fechaAnterior,$fechaSiguiente);
        print json_encode($especifica, JSON_UNESCAPED_UNICODE);

    }
//-------------------------------------------------fin Mostrar  Especifica por fecha------------------------------------------
//-----------------------------------------------Mostrar lista Especifica----------------------------------------------

function MostrarListaEspecifica(){
    $especifica=$this->model->ListaEspecifica();
    print json_encode($especifica, JSON_UNESCAPED_UNICODE);

}
//-------------------------------------------------fin Mostrar lista Especifica------------------------------------------







//---------------------------------Eliminar Especifica------------------------------------------------------------
    function EliminarEspecifica(){
        $id=$_POST['id'];
        if ($this->model->eliminar($id)) {
                $arrResponse=array('status'=>true, 'msg'=>'Registro Eliminado correctamente');
            }else {
                $arrResponse=array('status'=>false, 'msg'=>'El Especifica esta en uso, No se puede eliminar ');
            }
            echo json_encode($arrResponse);
      
    }
//-------------------------------Fin Eliminar Especifica---------------------------------------------------------------

//---------------------------------Eliminar Especifica------------------------------------------------------------
function ActualizarEspecifica(){
        $upDetalle=$_POST["upDetalle"];
        $upCodigo=$_POST["upCodigo"];
        $upID=$_POST["upId"];
        
        
        if (
            $this->model->actualizar([
            
                'Detalle'=>$upDetalle,
                'Codigo'=>$upCodigo,
                'id'=>$upID,
            ])) {
                $arrResponse=array('status'=>true, 'msg'=>'Registro Actualizado correctamente');
                 
            }else {
                $arrResponse=array('status'=>false, 'msg'=>'Registro no Actualizado ');
                
            }
            echo json_encode($arrResponse);

}
//-------------------------------Fin Eliminar Especifica---------------------------------------------------------------






}

?>