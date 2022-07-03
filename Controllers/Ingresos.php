<?php
class Ingresos extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->mensaje="";
        $this->view->mp=[];
        $this->view->me=[];
        $this->view->datos=[];
       
      

    }

    function render(){
        
        $MProductos=$this->model->MostrarProductos();
        $this->view->mp=$MProductos;
        $MEspecifica=$this->model->MostrarEspecifica();
        $this->view->me=$MEspecifica;
        $this->view->render('Ingresos/index');
    }
    function ListaIngresos(){
        $MProductos=$this->model->MostrarProductos();
        $this->view->mp=$MProductos;
        $MEspecifica=$this->model->MostrarEspecifica();
        $this->view->me=$MEspecifica;
        $this->view->render('Ingresos/ListaIngresos');

    }

    function RegistrarIngreso(){
        
        $fecha=date('Y-m-d h:i:s',time());
        $cantidad=$_POST["cantidad"];
        $producto=$_POST["producto"];
        $precio= $_POST["precio"];
        $total=$_POST["total"];
        $ordenCompra=$_POST["ordenCompra"];
        $especifica=$_POST["especifica"];
        $usuario=$_POST["usuario"];
        
        $mensaje="";
    
        
        
        if (
        $this->model->insertar([
            'fecha'=>$fecha,
            'cantidad'=>$cantidad,
            'producto'=>$producto,
            'precio'=>$precio,
            'total'=>$total,
            'ordenCompra'=>$ordenCompra,
            'especifica'=>$especifica,
            'usuario'=>$usuario,
        ])) {
            $arrResponse=array('status'=>true, 'msg'=>'Registro ingresado correctamente');
            $this->model->AumentarStock([
                
                'cantidad'=>$cantidad,
                'producto'=>$producto,
                
            ]);
            
        }else {
            $arrResponse=array('status'=>false, 'msg'=>'Registro no ingresado ');
            
        }
        echo json_encode($arrResponse);
        $this->view->mensaje=$mensaje;
       /* 
        $this->render();
        */ 
    }
    function MostrarIngresos(){
        $fecha = date('Y-m-d h:i:s',time());
        $fechaAnterior = date("Y-m-d", strtotime($fecha. "-1 day"));
        $fechaSiguiente=date("Y-m-d", strtotime($fecha. "+1 day"));
        $ingresos=$this->model->Mostrar($fechaAnterior,$fechaSiguiente);
        print json_encode($ingresos, JSON_UNESCAPED_UNICODE);
       

    }
    function MostrarListaIngresos(){
        $ingresos=$this->model->ListaIngresos();
        print json_encode($ingresos, JSON_UNESCAPED_UNICODE);

    }

    function EliminarIngreso(){
        $id=$_POST['id'];
        if ($this->model->eliminar($id)) {
                $arrResponse=array('status'=>true, 'msg'=>'Registro Eliminado correctamente');
            }else {
                $arrResponse=array('status'=>false, 'msg'=>'Registro no Eliminado ');
            }
            echo json_encode($arrResponse);
        
       // print json_encode($id, JSON_UNESCAPED_UNICODE);
    }
    function ActualizarIngreso(){
        
        //$fecha=date('Y-m-d h:i:s',time());
        $upProducto=$_POST["upProducto"];
        $upCantidad=$_POST["upCantidad"];
        $upPrecio= $_POST["upPrecio"];
        $upTotal=$_POST["upTotal"];
        $upOrdenCompra=$_POST["upOrden"];
        $upEspecifica=$_POST["upEspecifica"];
        $upID=$_POST["upId"];
        $CantidadA=$_POST["CantidadA"];
        if (
            $this->model->actualizar([
               
                'cantidad'=>$upCantidad,
                'producto'=>$upProducto,
                'precio'=>$upPrecio,
                'total'=>$upTotal,
                'ordenCompra'=>$upOrdenCompra,
                'especifica'=>$upEspecifica,
                'id'=>$upID,
            ])) {
                $arrResponse=array('status'=>true, 'msg'=>'Registro Actualizado correctamente');
                if ($upCantidad>$CantidadA) {
                    $stock=$upCantidad-$CantidadA;
                    
                    $this->model->AumentarStock([
                
                        'cantidad'=>$stock,
                        'producto'=>$upProducto,
                        
                    ]);
                }
                if ($CantidadA>$upCantidad) {
                    $stock=$CantidadA-$upCantidad;
                    $this->model->DisminuirStock([
                
                        'cantidad'=>$stock,
                        'producto'=>$upProducto,
                        
                    ]);
                }
                
            }else {
                $arrResponse=array('status'=>false, 'msg'=>'Registro no Actualizado ');
                
            }
            echo json_encode($arrResponse);



        
    }
    
    
}