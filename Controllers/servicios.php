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



    function MostrarServicios(){
        $servicios=$this->model->Mostrar();
        print json_encode($servicios, JSON_UNESCAPED_UNICODE);
    }
}

?>