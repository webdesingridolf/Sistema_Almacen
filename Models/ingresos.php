<?php

class productos{
    public $idProducto;
    public $detalle;
    public $idUM;
    
}
class especifica{
    public $idEspecifica;
    public $codigo;

}
class H_ingresos{
    public $id;
    public $fecha;
    public $cantidad;
    public $cantidadUnidad;
    public $unidadmedida;
    public $producto;
    public $precio;
    public $total;
    public $ordenCompra;
    public $Especifica;
    public $usuario;
    public $ProductoID;
    public $EspecificaID;

}
class UM{
    public $UMid;
}
class UMdata{
    public $Extra;
    public $Equivalencia;
}

?>