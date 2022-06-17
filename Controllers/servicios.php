<?php
class Servicios extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->me=[];
        
      

    }
    function render(){
        $MEspecifica=$this->model->MostrarEspecifica();
        $this->view->me=$MEspecifica;
        $this->view->render('Servicios/index');
    }

    function RegistrarServicio(){
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



    function MostrarServicios(){
        $servicios=$this->model->Mostrar();
        print json_encode($servicios, JSON_UNESCAPED_UNICODE);
    }
}

?>