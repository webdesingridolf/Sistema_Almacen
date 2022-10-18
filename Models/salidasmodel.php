<?php
include_once 'Models/salidas.php';
class SalidasModel extends Model{
    public function __construct(){
        parent::__construct();
    }
/*------------------------------------------funcion insertar salidas---------------------------------------------- */    
    public function insertar($datos){
        try {
            $query=$this->prepare('INSERT INTO salida(fecha,cantidad,CantidadUnidad,id_Producto,id_Usuario,id_Especifica,area,n_pecosa,o_c) 
                 VALUES(:fecha, :cantidad,:CUnidad, :producto,:usuario,:especifica,:area,:pecosa,:oc)');
            $query->execute([
                'fecha'=>$datos['fecha'],
                'cantidad'=>$datos['cantidad'],
                'CUnidad'=>$datos['CUnidad'],
                'producto'=>$datos['producto'],
                'usuario'=>$datos['usuario'],
                'especifica'=>$datos['especifica'],
                'area'=>$datos['area'],
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
    
/*------------------------------------------funcion aumentar y disminuir  stock ---------------------------------------------- */
    

 //----------------------------aumentar stock----------------------------------------------------
 public function AumentarStock($AS){
    try {
        $query=$this->prepare('UPDATE producto SET Stock=Stock+:cantidad
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
//------------------------------------------aumentar stock-------------------------------------------------
//----------------------------aumentar stock por unidad----------------------------------------------------
public function AumentarStockUnidad($AS){
    try {
        $query=$this->prepare('UPDATE producto SET Stock_Unidad=Stock_Unidad+:CantidadUnidad
        WHERE id_Producto=:id');
        $query->execute([
            
            
            'CantidadUnidad'=>$AS['StockUnidad'],       
            'id'=>$AS['producto'],
            

        ]);
        return true;
        
    } catch (PDOException $e) {
        echo $e->getMessage();
        
        return false;
    }
}
//------------------------------------------aumentar stockpor unidad-------------------------------------------------
//------------------------------disminuir stock---------------------------------------------------------------
public function DisminuirStock($DS){
    try {
        $query=$this->prepare('UPDATE producto SET Stock=Stock-:cantidad
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
//.------------------------------------fin disminuir stock-----------------------------------------------------
//------------------------------disminuir stock por unidad---------------------------------------------------------------
public function DisminuirStockUnidad($DS){
    try {
        $query=$this->prepare('UPDATE producto SET Stock_Unidad=Stock_Unidad-:SU
        WHERE id_Producto=:id');
        $query->execute([
            
            'SU'=>$DS['StockUnidad'],     
            'id'=>$DS['producto'],
            

        ]);
        return true;
        
    } catch (PDOException $e) {
        echo $e->getMessage();
        
        return false;
    }
}
//.------------------------------------fin disminuir stock-----------------------------------------------------    


    public function DisminuirStockS($DS){
        try {
            $query=$this->prepare('UPDATE producto SET Stock=Stock-:cantidad,Stock_Unidad=Stock_Unidad-:CantidadUnidad
            WHERE id_Producto=:id');
            $query->execute([
                
                'cantidad'=>$DS['cantidad'],
                'CantidadUnidad'=>$DS['CUnidad'],        
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
            $query=$this->prepare('UPDATE salida SET cantidad=:cantidad,CantidadUnidad=:CUnidad, id_Producto=:producto,area=:area,n_pecosa=:pecosa,o_c=:oc,id_Especifica=:especifica
            WHERE id_Salida=:id');
            $query->execute([
                
                'cantidad'=>$datos['cantidad'],
                'CUnidad'=>$datos['CUnidad'],
                'producto'=>$datos['producto'],
                'area'=>$datos['area'],
                'oc'=>$datos['oc'],
                'pecosa'=>$datos['pecosa'],
                'especifica'=>$datos['especifica'],
                'id'=>$datos['id'],
                
                

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
            $query=$this->query("SELECT salida.id_Producto,salida.id_Especifica , salida.id_Salida,salida.fecha,salida.cantidad,producto.detalle,salida.area,salida.CantidadUnidad,salida.n_pecosa,salida.o_c,especifica.detalle_Especifica 
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
                $item->cUnidad=$ingreso['CantidadUnidad'];
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
            $query=$this->query("SELECT salida.id_Producto,salida.id_Especifica , salida.id_Salida,salida.fecha,salida.cantidad,producto.detalle,salida.area,salida.CantidadUnidad,salida.n_pecosa,salida.o_c,especifica.detalle_Especifica 
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
                $item->cUnidad=$ingreso['CantidadUnidad'];
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




 //--------------------------------------------Obtener idUM-------------------------------------------------------------
 public function ObteneridUM($id){
    $items=[];
    try {
        $productData=[];
        $query=$this->query("SELECT * FROM producto WHERE id_Producto=$id");
        $query->execute();
        $productData=$query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($productData as $product) {
            $item=new UM();
            $item->UMid=$product['id_Unidad_Medida']; 
            array_push($items,$item);

        }

        
        return $items;
    } catch (PDOException $e) {
        return $e;
    }

}
//--------------------------------------------Fin Obtener idUM-----------------------------------------------------------
   //--------------------------------------------Obtener idUM-------------------------------------------------------------
   public function ObtenerUMdata($id){
    $items=[];
    try {
        $UMdatas=[];
        $query=$this->query("SELECT * FROM unidad_medida WHERE id_Unidad_Medida=$id");
        $query->execute();
        $UMdatas=$query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($UMdatas as $UMdata) {
            $item=new UMdata();
            $item->Extra=$UMdata['Extra'];
            $item->Equivalencia=$UMdata['Equivalencia'];
            
            array_push($items,$item);

        }

        
        return $items;
    } catch (PDOException $e) {
        return $e;
    }

}
//--------------------------------------------Fin Obtener UM-----------------------------------------------------------





    
    
    
    

}





?>