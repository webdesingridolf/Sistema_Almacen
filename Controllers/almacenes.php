<?php
class Almacenes extends Controller{
    function __construct(){
        parent::__construct();
        
      

    }
    function render(){
        $this->view->render('almacenes/index');
    }
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





    function MostrarAlmacen(){
        $almacen=$this->model->Mostrar();
        print json_encode($almacen, JSON_UNESCAPED_UNICODE);
    }
}

?>