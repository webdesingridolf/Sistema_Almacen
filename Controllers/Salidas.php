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
/*--------------------------funcion cargar vista de Lista-----------------*/
    function ListaSalidas(){
        $MProductos=$this->model->MostrarProductos();
        $this->view->mp=$MProductos;
        $MEspecifica=$this->model->MostrarEspecifica();
        $this->view->me=$MEspecifica;
        $this->view->render('Salidas/ListaSalidas');

    }
/*--------------------------fin funcion cargar vista de Lista-----------------*/

/*------------------------------ funcion cargar tabla en la vista---------------*/
    function MostrarSalidas(){
        $fecha = date('Y-m-d h:i:s',time());
        $fechaAnterior = date("Y-m-d", strtotime($fecha. "-1 day"));
        $fechaSiguiente=date("Y-m-d", strtotime($fecha. "+1 day"));
        $Salidas=$this->model->Mostrar($fechaAnterior,$fechaSiguiente);
        print json_encode($Salidas, JSON_UNESCAPED_UNICODE); 

    }
/*------------------------------fin funcion cargar tabla en la vista---------------*/
/*------------------------------ funcion cargar tabla en la vista lista---------------*/

    function MostrarListaSalidas(){
        $salidas=$this->model->ListaSalidas();
        print json_encode($salidas, JSON_UNESCAPED_UNICODE);

    }
/*------------------------------fin funcion cargar tabla en la vista lista---------------*/

/*------------------------------ funcion Registrar salidas ---------------*/
    function RegistrarSalida(){
           
        $fecha=date('Y-m-d h:i:s',time());
        //$devolucion="no devuelto";
        $producto=$_POST["producto"];
        $area=$_POST["area"];
        $CRegistro=$_POST["cantidad"];
        $CU=$_POST["CUnidades"];
        $especifica=$_POST["especifica"];
        $oc= $_POST["oc"];
        $nPecosa=$_POST["nPecosa"];
        $usuario=$_POST["usuario"];
        $equivalencia=$_POST["equivalencia"];
       
        if (!empty($CU)) {
            if ($CU>$equivalencia) {
                $cantidadCajas=0;
                for($i=1;$i<=$CU;$i++){
                    if($i%$equivalencia==0){
                        $cantidadCajas++;
                        $ultimoMultiplo=$i;
                    }
        
                }
                $cantidad=$cantidadCajas+1;
                
                    
            }
            
        }else{
            $cantidad=$_POST["cantidad"];
            

        }
       
        
   
        
        if (
        $this->model->insertar([
            'fecha'=>$fecha,
            'cantidad'=>$CRegistro,
            'CUnidad'=>$CU,
            'producto'=>$producto,
            'area'=>$area,
            'nPecosa'=>$nPecosa,
            'oc'=>$oc,
            'especifica'=>$especifica,
            'usuario'=>$usuario,
        ])) {
            
            $arrResponse=array('status'=>true, 'msg'=>'Registro ingresado correctamente');
            $this->model->DisminuirStockS([
                
                'cantidad'=>$cantidad,
                'CUnidad'=>$CU,
                'producto'=>$producto,
                
            ]);
            
        }else {
            $arrResponse=array('status'=>false, 'msg'=>'Registro no ingresado ');
            
        }
        echo json_encode($arrResponse);
       /* $this->view->mensaje=$mensaje;*/
    
    }




/*------------------------------fin funcion Registrar salidas ---------------*/
/*------------------------------ funcion eliminar salidas ---------------*/


    function EliminarSalida(){
        $id=$_POST['id'];
        if ($this->model->Eliminar($id)) {
                $arrResponse=array('status'=>true, 'msg'=>'Registro Eliminado correctamente');
            }else {
                $arrResponse=array('status'=>false, 'msg'=>'Registro no Eliminado ');
            }
            echo json_encode($arrResponse);
        
    }


/*------------------------------fin funcion eliminar salidas ---------------*/

/*------------------------------ funcion actualizar salidas ---------------*/

    function ActualizarSalida(){
        $upProducto=$_POST["upProductoid"];
        $upCantidad=$_POST["upCantidad"];
        $upCUnidad=$_POST["upCUnidad"];
        $upArea= $_POST["upArea"];
        $upOC=$_POST["upOC"];
        $upNPecosa=$_POST["upNPecosa"];
        $upEspecifica=$_POST["upEspecifica"];
        $upID=$_POST["upId"];
        $CUnidadA=$_POST["CUnidadA"];
        $CantidadA=$_POST["CantidadA"];
        
        
        if (
            $this->model->actualizar([
               
                'cantidad'=>$upCantidad,
                'CUnidad'=>$upCUnidad,
                'producto'=>$upProducto,
                'area'=>$upArea,
                'oc'=>$upOC,
                'pecosa'=>$upNPecosa,
                'especifica'=>$upEspecifica,
                'id'=>$upID,
                
            ])) {
                $arrResponse=array('status'=>true, 'msg'=>'Registro Actualizado correctamente');
               
                if ($upCantidad>$CantidadA) {
                    $stock=$upCantidad-$CantidadA;
                    
                    $this->model->DisminuirStock([
                
                        'cantidad'=>$stock,
                        'producto'=>$upProducto,
                        
                    ]);
                }
                if ($upCUnidad>$CUnidadA){
                    $stockUnidad=$upCUnidad-$CUnidadA;
                    $this->model->DisminuirStockUnidad([
                
                        'StockUnidad'=>$stockUnidad,
                        'producto'=>$upProducto,
                        
                    ]);
                   

                }
                if ($CantidadA>$upCantidad) {
                    $stock=$CantidadA-$upCantidad;
                    $this->model->AumentarStock([
                
                        'cantidad'=>$stock,
                        'producto'=>$upProducto,
                        
                    ]);
                }
                if($CUnidadA>$upCUnidad){
                    $stockUnidad=$CUnidadA-$upCUnidad;
                    $this->model->AumentarStockUnidad([
                
                        'StockUnidad'=>$stockUnidad,
                        'producto'=>$upProducto,
                        
                    ]);

                }
                
                
            }else {
                $arrResponse=array('status'=>false, 'msg'=>'Registro no Actualizado ');
                
            }
            echo json_encode($arrResponse);

    }



/*------------------------------fin funcion actualizar salidas ---------------*/






function ObteneridUM(){
    
    $id=$_POST['id'];   
    $UM=$this->model->ObteneridUM($id);
    print json_encode($UM, JSON_UNESCAPED_UNICODE);
   

}
function ObtenerUMdata(){

    $id=$_POST['idUM'];   
    $UM=$this->model->ObtenerUMdata($id);
    print json_encode($UM, JSON_UNESCAPED_UNICODE);
   

}

}

?>