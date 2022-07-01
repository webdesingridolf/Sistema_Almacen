<?php
include_once 'Models/salidas.php';
class SalidasModel extends Model{
    public function __construct(){
        parent::__construct();
    }
/*------------------------------------------funcion insertar salidas---------------------------------------------- */    
    public function insertar($datos){
        try {
            $query=$this->prepare('INSERT INTO salida(fecha,cantidad,id_Producto,id_Usuario,id_Especifica,area,devolucion,n_pecosa,o_c) 
                 VALUES(:fecha, :cantidad, :producto,:usuario,:especifica,:area,:devolucion,:pecosa,:oc)');
            $query->execute([
                'fecha'=>$datos['fecha'],
                'cantidad'=>$datos['cantidad'],
                'producto'=>$datos['producto'],
                'usuario'=>$datos['usuario'],
                'especifica'=>$datos['especifica'],
                'area'=>$datos['area'],
                'devolucion'=>$datos['devolucion'],
                'pecosa'=>$datos['nPecosa'],
                'oc'=>$datos['oc']
    
            ]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            //echo "ingreso existente ";
            return false;
        }
        
       
        

    }
/*------------------------------------------fin funcion insertar salidas---------------------------------------------- */
    
/*------------------------------------------funcion Disminuir stock ---------------------------------------------- */
    public function AumentarStock($AS){
        try {
            $query=$this->prepare('UPDATE producto SET cantidad_Stock=cantidad_Stock+:cantidad
            WHERE id_Producto=:id');
            $query->execute([
                
                'cantidad'=>$AS['cantidad'],     
                'id'=>$AS['producto'],
                

            ]);
            return true;
        
        } catch (PDOException $e) {
        echo $e->getMessage();
        
        return false;
         }
    }


    public function DisminuirStock($DS){
        try {
            $query=$this->prepare('UPDATE producto SET cantidad_Stock=cantidad_Stock-:cantidad
            WHERE id_Producto=:id');
            $query->execute([
                
                'cantidad'=>$DS['cantidad'],     
                'id'=>$DS['producto'],
                

            ]);
            return true;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
            
            return false;
        }
    }


/*------------------------------------------fin funcion Diminuir stock ---------------------------------------------- */


/*------------------------------------------funcion actualizar salidas---------------------------------------------- */


    public function actualizar($datos){
        try {
            $query=$this->prepare('UPDATE salida SET cantidad=:cantidad,id_Producto=:producto,area=:area,n_pecosa=:pecosa,o_c=:oc,devolucion=:devolucion,id_Especifica=:especifica
            WHERE id_Salida=:id');
            $query->execute([
                
                'cantidad'=>$datos['cantidad'],
                'producto'=>$datos['producto'],
                'area'=>$datos['area'],
                'oc'=>$datos['oc'],
                'pecosa'=>$datos['pecosa'],
                'especifica'=>$datos['especifica'],
                'id'=>$datos['id'],
                'devolucion'=>$datos['devolucion'],
                

            ]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            //echo "ingreso existente ";
            return false;
        }
    }




/*------------------------------------------fin funcion actualizar salidas---------------------------------------------- */

/*------------------------------------------funcion eliminar salidas---------------------------------------------- */

    public function Eliminar($id){
        try {
            $query=$this->prepare('DELETE FROM salida WHERE id_Salida='.$id.'');
            $query->execute();
            return true;
            
        } catch (PDOException $e) {
            
            echo $e->getMessage();
            
            return false;
        }

    }




/*------------------------------------------fin funcion eliminar salidas---------------------------------------------- */


/*------------------------------------------funcion Mostrar Por dia salidas---------------------------------------------- */
    public function Mostrar($fechaA,$fechaS){
        
        $items=[];
        try {
            $ingresos=[];
            $query=$this->query("SELECT salida.id_Producto,salida.id_Especifica , salida.id_Salida,salida.fecha,salida.cantidad,producto.detalle,salida.area,salida.devolucion,salida.n_pecosa,salida.o_c,especifica.detalle_Especifica 
            FROM salida,producto,especifica 
            WHERE producto.id_Producto=salida.id_Producto AND especifica.id_Especifica=salida.id_Especifica AND salida.fecha BETWEEN "."'".$fechaA."'"."AND "."'".$fechaS."'"."");
            $query->execute();
            $ingresos=$query->fetchAll(PDO::FETCH_ASSOC);
            
            foreach ($ingresos as $ingreso) {
                $item=new ListaSalidas();
                $item->idSalida=$ingreso['id_Salida'];
                $item->fecha=$ingreso['fecha'];
                $item->cantidad=$ingreso['cantidad'];
                $item->detalle=$ingreso['detalle'];

                $item->area=$ingreso['area'];
                $item->devolucion=$ingreso['devolucion'];
                $item->nPecosa=$ingreso['n_pecosa'];
                $item->oc=$ingreso['o_c'];
                $item->especifica=$ingreso['detalle_Especifica'];
                $item->ProductoID=$ingreso['id_Producto'];
                $item->EspecificaID=$ingreso['id_Especifica'];

                
                //$item->usuario=$row['id_usuario'];
                array_push($items,$item);



            }
            
            return $items;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return [];
        }
        
        
        

    }


/*------------------------------------------fin funcion Mostrar Por dia salidas---------------------------------------------- */


/*------------------------------------------funcion Lista de  salidas---------------------------------------------- */

    public function ListaSalidas(){
        $items=[];
        try {
            $ingresos=[];
            $query=$this->query("SELECT salida.id_Producto,salida.id_Especifica , salida.id_Salida,salida.fecha,salida.cantidad,producto.detalle,salida.area,salida.devolucion,salida.n_pecosa,salida.o_c,especifica.detalle_Especifica 
            FROM salida,producto,especifica 
            WHERE producto.id_Producto=salida.id_Producto AND especifica.id_Especifica=salida.id_Especifica ");
            $query->execute();
            $ingresos=$query->fetchAll(PDO::FETCH_ASSOC);
            
            foreach ($ingresos as $ingreso) {
                $item=new ListaSalidas();
                $item->idSalida=$ingreso['id_Salida'];
                $item->fecha=$ingreso['fecha'];
                $item->cantidad=$ingreso['cantidad'];
                $item->detalle=$ingreso['detalle'];

                $item->area=$ingreso['area'];
                $item->devolucion=$ingreso['devolucion'];
                $item->nPecosa=$ingreso['n_pecosa'];
                $item->oc=$ingreso['o_c'];
                $item->especifica=$ingreso['detalle_Especifica'];
                $item->ProductoID=$ingreso['id_Producto'];
                $item->EspecificaID=$ingreso['id_Especifica'];

                
                //$item->usuario=$row['id_usuario'];
                array_push($items,$item);



            }
            
            return $items;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return [];
        }
        

    }

/*------------------------------------------fin funcion Lista de  salidas---------------------------------------------- */

/*------------------------------------------funcion Mostrar en los select de  salidas---------------------------------------------- */
    public function MostrarProductos(){
        $items=[];
        try {
            $mProductos=[];
            $query=$this->prepare("SELECT*FROM producto");
            $query->execute();
            $mProductos=$query->fetchAll(PDO::FETCH_ASSOC);
            foreach ($mProductos as $mProducto) {
                $item=new productos();
                $item->idProducto=$mProducto['id_Producto'];
                $item->detalle=$mProducto['detalle'];
                array_push($items,$item);
            }
    
            return $items;
        } catch (PDOException $e) {
            return [];
        }

    }
    /*-----------------------------------------------------------------------------------------*/
    public function MostrarEspecifica(){
        $items=[];
        try {
            $mEspecificas=[];
            $query=$this->prepare("SELECT*FROM especifica");
            $query->execute();
            $mEspecificas=$query->fetchAll(PDO::FETCH_ASSOC);
            foreach ($mEspecificas as $mEspecifica) {
                $item=new especifica();
                $item->idEspecifica=$mEspecifica['id_Especifica'];
                $item->codigo=$mEspecifica['codigo'];
            
                array_push($items,$item);
            }
            
            
            return $items;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return [];
        }
        
    }


/*------------------------------------------fin funcion eliminar salidas---------------------------------------------- */








    
    
    
    

}





?>