<?php
class Especifica extends Controller{
    function __construct(){
        parent::__construct();
        
      

    }
    function render(){
        $this->view->render('Especifica/index');
    }
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

    function MostrarEspecifica(){
        $especifica=$this->model->Mostrar();
        print json_encode($especifica, JSON_UNESCAPED_UNICODE);

    }
}

?>