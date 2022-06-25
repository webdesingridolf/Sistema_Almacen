<?php
class Salidas extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->mp=[];
        $this->view->me=[];
      

    }
/*--------------------------funcion cargar vista-----------------*/
    function render(){
        $MProductos=$this->model->MostrarProductos();
        $this->view->mp=$MProductos;
        $MEspecifica=$this->model->MostrarEspecifica();
        $this->view->me=$MEspecifica;
        $this->view->render('Salidas/index');
    }
/*------------------------------fin funcion cargar vista---------------*/

/*------------------------------ funcion cargar tabla en la vista---------------*/
    function MostrarSalidas(){
        $fecha = date('Y-m-d h:i:s',time());
        $fechaAnterior = date("Y-m-d", strtotime($fecha. "-1 day"));
        $fechaSiguiente=date("Y-m-d", strtotime($fecha. "+1 day"));
        $Salidas=$this->model->Mostrar($fechaAnterior,$fechaSiguiente);
        print json_encode($Salidas, JSON_UNESCAPED_UNICODE); 

    }
/*------------------------------fin funcion cargar tabla en la vista---------------*/

/*------------------------------ funcion Registrar salidas ---------------*/
    function RegistrarSalida(){
           
        $fecha=date('Y-m-d h:i:s',time());
        $devolucion="no devuelto";
        $producto=$_POST["producto"];
        $area=$_POST["area"];
        $cantidad=$_POST["cantidad"];
        $especifica=$_POST["especifica"];
        $oc= $_POST["oc"];
        $nPecosa=$_POST["nPecosa"];
        $usuario=$_POST["usuario"];
        
        

        
        
        if (
        $this->model->insertar([
            'fecha'=>$fecha,
            'cantidad'=>$cantidad,
            'producto'=>$producto,
            'area'=>$area,
            'devolucion'=>$devolucion,
            'nPecosa'=>$nPecosa,
            'oc'=>$oc,
            'especifica'=>$especifica,
            'usuario'=>$usuario,
        ])) {
            $arrResponse=array('status'=>true, 'msg'=>'Registro ingresado correctamente');
            
        }else {
            $arrResponse=array('status'=>false, 'msg'=>'Registro no ingresado ');
            
        }
        echo json_encode($arrResponse);
       /* $this->view->mensaje=$mensaje;*/
    
    }




/*------------------------------fin funcion Registrar salidas ---------------*/
/*------------------------------ funcion Registrar salidas ---------------*/


    function EliminarSalida(){
        $id=$_POST['id'];
        if ($this->model->Eliminar($id)) {
                $arrResponse=array('status'=>true, 'msg'=>'Registro Eliminado correctamente');
            }else {
                $arrResponse=array('status'=>false, 'msg'=>'Registro no Eliminado ');
            }
            echo json_encode($arrResponse);
        
    }


/*------------------------------fin funcion Registrar salidas ---------------*/

/*------------------------------ funcion Registrar salidas ---------------*/





/*------------------------------fin funcion Registrar salidas ---------------*/

/*------------------------------ funcion Registrar salidas ---------------*/





/*------------------------------fin funcion Registrar salidas ---------------*/

/*------------------------------ funcion Registrar salidas ---------------*/





/*------------------------------fin funcion Registrar salidas ---------------*/



}

?>