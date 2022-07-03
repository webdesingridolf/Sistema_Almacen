<?php
class Servicios extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->me=[];
        
      

    }
/*----------------cargar vista-------------------------------------------------------------------------------- */
    function render(){
        $MEspecifica=$this->model->MostrarEspecifica();
        $this->view->me=$MEspecifica;
        $this->view->render('Servicios/index');
    }
/*---------------- fin cargar vista-------------------------------------------------------------------------------- */
/*----------------cargar vista-------------------------------------------------------------------------------- */
function ListaServicios(){
    $MEspecifica=$this->model->MostrarEspecifica();
    $this->view->me=$MEspecifica;
    $this->view->render('Servicios/ListaServicios');
}
/*---------------- fin cargar vista-------------------------------------------------------------------------------- */


/*----------------Registrar Servicio-------------------------------------------------------------------------------- */
    function RegistrarServicio(){

        $detalle=$_POST["detalle"];
        $Especifica=$_POST["Especifica"];      
        $os=$_POST["os"];
        $cantidad=$_POST["cantidad"];
        $precio= $_POST["precio"];
        $total= $_POST["total"];    
        $fecha=date('Y-m-d h:i:s',time());
        $usuario=1; 
        
      
        
        if (
        $this->model->insertar([
            'fecha'=>$fecha,
            'detalle'=>$detalle,
            'usuario'=>$usuario,
            'cantidad'=>$cantidad,
            'especifica'=>$Especifica,
            'precio'=>$precio,
            'total'=>$total,
            'os'=>$os,
            
        ])) {
            $arrResponse=array('status'=>true, 'msg'=>'Registro ingresado correctamente');
        }else {
            $arrResponse=array('status'=>false, 'msg'=>'Registro no ingresado ');
        }
        echo json_encode($arrResponse);
        
    }
/*----------------fin Registrar Servicio-------------------------------------------------------------------------------- */


/*----------------Motsrar servicios-------------------------------------------------------------------------------- */
    function MostrarServicios(){
        $fecha = date('Y-m-d h:i:s',time());
        $fechaAnterior = date("Y-m-d", strtotime($fecha. "-1 day"));
        $fechaSiguiente=date("Y-m-d", strtotime($fecha. "+1 day"));

        $servicios=$this->model->Mostrar($fechaAnterior,$fechaSiguiente);
        print json_encode($servicios, JSON_UNESCAPED_UNICODE);
    }
/*----------------fin Mostrar servicios-------------------------------------------------------------------------------- */
/*----------------Motsrar Listaservicios-------------------------------------------------------------------------------- */
function MostrarListaServicios(){
    

    $servicios=$this->model->MostrarLista();
    print json_encode($servicios, JSON_UNESCAPED_UNICODE);
}
/*----------------fin Mostrar Lista servicios-------------------------------------------------------------------------------- */






/*----------------Eliminar Servicio-------------------------------------------------------------------------------- */
    function EliminarServicio(){
        $id=$_POST['id'];
        if ($this->model->eliminar($id)) {
                $arrResponse=array('status'=>true, 'msg'=>'Registro Eliminado correctamente');
            }else {
                $arrResponse=array('status'=>false, 'msg'=>'Registro no Eliminado ');
            }
            echo json_encode($arrResponse);
        
       // print json_encode($id, JSON_UNESCAPED_UNICODE);
    }
/*----------------fin Eliminar Servicio-------------------------------------------------------------------------------- */

/*------------------------------ funcion actualizar salidas ---------------*/

function ActualizarServicios(){
    $upDetalle=$_POST["upDetalle"];
    $upCantidad=$_POST["upCantidad"];
    $upPrecio= $_POST["upPrecio"];
    $upTotal=$_POST["upTotal"];
    $upOS=$_POST["upOS"];
    $upEspecifica=$_POST["upEspecifica"];
    $upID=$_POST["upId"];
    
    
    
    if (
        $this->model->actualizar([
            'detalle'=>$upDetalle,
            'cantidad'=>$upCantidad,
            'precio'=>$upPrecio,           
            'total'=>$upTotal,
            'os'=>$upOS,           
            'especifica'=>$upEspecifica,
            'id'=>$upID,
            
        ])) {
            $arrResponse=array('status'=>true, 'msg'=>'Registro Actualizado correctamente');
           
            
        }else {
            $arrResponse=array('status'=>false, 'msg'=>'Registro no Actualizado ');
            
        }
        echo json_encode($arrResponse);

}



/*------------------------------fin funcion actualizar salidas ---------------*/






}



?>