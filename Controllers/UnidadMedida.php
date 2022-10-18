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
        $extra=$_POST["Extra"];
        if (empty($_POST["Equivalencia"])) {
            $Equivalencia=0;
        }else{
            $Equivalencia=$_POST["Equivalencia"];
        }
        
        if (
        $this->model->insertar([
            'fecha'=>$fecha,
            'unidadMedida'=>$UnidadMedida,
            'simbolo'=>$Simbolo,
            'extra'=>$extra,
            'Equivalencia'=>$Equivalencia,
            
            
        ])) {
            $arrResponse=array('status'=>true, 'msg'=>'Registro ingresado correctamente');
        }else {
            $arrResponse=array('status'=>false, 'msg'=>'Registro no ingresado ');
        }
        echo json_encode($arrResponse);
        
    }
/*----------------fin Registrar Unidad de medida-------------------------------------------------------------------------------- */


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
    if(is_numeric($_POST["upEquivalencia"])  ){
        $upEquivalencia=$_POST["upEquivalencia"];          
    }else{
        $upEquivalencia=0;
    }
    
    $upID=$_POST["upId"];
    

    if (
        $this->model->actualizar([
            'UnidadMedida'=>$upUnidadMedida,
            'Simbolo'=>$upSimbolo,
            'upEquivalencia'=>$upEquivalencia,
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