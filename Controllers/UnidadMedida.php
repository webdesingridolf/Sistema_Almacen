<?php
class UnidadMedida extends Controller{
    function __construct(){
        parent::__construct();
        
        
      

    }
/*----------------cargar vista-------------------------------------------------------------------------------- */
    function render(){
        
        $this->view->render('UnidadMedida/index');
    }
/*---------------- fin cargar vista-------------------------------------------------------------------------------- */


/*----------------Registrar Unidad de Medida-------------------------------------------------------------------------------- */
    function Registrar(){

        $UnidadMedida=$_POST["UnidadMedida"];
        $Simbolo=$_POST["Simbolo"];        
        $fecha=date('Y-m-d h:i:s',time());
        if (
        $this->model->insertar([
            'fecha'=>$fecha,
            'unidadMedida'=>$UnidadMedida,
            'simbolo'=>$Simbolo,
            
            
        ])) {
            $arrResponse=array('status'=>true, 'msg'=>'Registro ingresado correctamente');
        }else {
            $arrResponse=array('status'=>false, 'msg'=>'Registro no ingresado ');
        }
        echo json_encode($arrResponse);
        
    }
/*----------------fin Registrar Servicio-------------------------------------------------------------------------------- */


/*----------------Motsrar Unidades de medida-------------------------------------------------------------------------------- */
    function MostrarUnidadMedida(){

        $UnidadMedida=$this->model->Mostrar();
        print json_encode($UnidadMedida, JSON_UNESCAPED_UNICODE);
    }
/*----------------fin Mostrar Unidades de medida-------------------------------------------------------------------------------- */





/*----------------Eliminar Unidad Medida-------------------------------------------------------------------------------- */
function Eliminar(){
    $id=$_POST['id'];
    if ($this->model->eliminar($id)) {
            $arrResponse=array('status'=>true, 'msg'=>'Registro Eliminado correctamente');
        }else {
            $arrResponse=array('status'=>false, 'msg'=>'Registro no Eliminado ');
        }
        echo json_encode($arrResponse);
    
   // print json_encode($id, JSON_UNESCAPED_UNICODE);
}
/*----------------fin Eliminar Unidad Medida-------------------------------------------------------------------------------- */

/*------------------------------ funcion actualizar Unidad Medida ---------------*/

function Actualizar(){
    $upUnidadMedida=$_POST["upUnidadMedida"];
    $upSimbolo=$_POST["upSimbolo"];
    $upID=$_POST["upId"];
    

    if (
        $this->model->actualizar([
            'UnidadMedida'=>$upUnidadMedida,
            'Simbolo'=>$upSimbolo,
            
            'id'=>$upID,
            
        ])) {
            $arrResponse=array('status'=>true, 'msg'=>'Registro Actualizado correctamente');
           
            
        }else {
            $arrResponse=array('status'=>false, 'msg'=>'Registro no Actualizado ');
            
        }
        echo json_encode($arrResponse);

}



/*------------------------------fin funcion actualizar Unidad Medida ---------------*/






}



?>