<?php

class almacen{
    public $idAlmacen;
    public $nombre;
    
}
class especifica{
    public $idEspecifica;
    public $detalle;

}
class unidadMedida{
    public $idUnidadMedida;
    public $nombreUM;
    public $Extra;
    

}
class ListaProductos{
    public $id;
    public $detalle;
    public $unidadmedida;
    public $stock;
    public $stockUnidad;
    public $almacen;
    public $Especifica;
    public $fecha;
    public $idAlmacen;
    public $idEspecifica;
    public $idUnidadMedida;

}
class UM{
    public $Extra;
    public $Equivalencia;
    

}

?>