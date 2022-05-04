<?php

class CrearTablaProduto{

    public function CrearTablaIngresos(){
        /*Tabla ingresos  */
        include_once "Conectar.php";
        $conexion = new Conexiondb();
        $conexion->Conectar();
        //var_dump($conexion->Conectar());
        $sql = "CREATE TABLE IF NOT EXISTS `Ingresos` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `Fecha` datetime NOT NULL,
                `Cantidad` int NOT NULL,
                /*`Especifica` varchar, incluido en la tabla categorias*/
                `Precio` int,
                `Total` int,
                `Orden_Compra` int,
                `Producto` int,/*Clave foranea tabla productos  */
                `Categoria` int,/*clave foranea tabla categorias */
                `Usuario` int ,/*clave foranea tabla usuarios */

                PRIMARY KEY (`id`),
                
                FOREIGN KEY (ProductoId)      REFERENCES vw_productos(id),
                FOREIGN KEY (ClienteId)            REFERENCES vw_cliente(id),
         
                )";

        $conexion->Conectar()->exec($sql);
    }
    public function CrearTablaSalidas(){
        /*Tabla salidas */
        include_once "Conectar.php";
        $conexion = new Conexiondb();
        $conexion->Conectar();
        //var_dump($conexion->Conectar());
        $sql = "CREATE TABLE IF NOT EXISTS `Salidas` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `Fecha` datetime NOT NULL,
                `Cantidad` int NOT NULL,
                `Producto` int NOT NULL,/*Clave foranea tabla usuarios */
                `usuario` int NOT NULL,/*Clave foranea tabla usuarios */
                FOREIGN KEY fk_DetalleVenta_id(DetalleVenta)
                REFERENCES vw_DetalleVenta(id),
                PRIMARY KEY (`id`)
                ) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1";

        $conexion->Conectar()->exec($sql);
    }
    public function CrearTablaServicios(){
        /*tabla servicios */
        include_once "Conectar.php";
        $conexion = new Conexiondb();
        $conexion->Conectar();
        $sql = "CREATE TABLE IF NOT EXISTS `Servicios` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `Fecha` datetime NOT NULL,
                `Detalle` int NOT NULL,
                `Unidad_Medida` varchar(100) NOT NULL,/*clave foranea tabla unidades de medida */
                `Cantidad` int(100) NOT NULL,
                `Precio` int(100) NOT NULL,
                `Total` int(9) NOT NULL,
                `O/S` int(9) NOT NULL,
                `Usuario` int(9) NOT NULL,/*clave foranea tabla usuarios */
                `Categoria` int(9) NOT NULL,/*clave foranea tabla categorias */


                PRIMARY KEY (`id`)
                ) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1";

        $conexion->Conectar()->exec($sql);
    }
    public function CrearTablaCategoriaServicios(){
        /*Tabla categoria servicios */
        $conexion = new Conexiondb();
        $conexion->Conectar();
        $sql = "CREATE TABLE IF NOT EXISTS `CategoriaServicios` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `Nombre` varchar(300) NOT NULL,
            `Especifica` varchar(300) NOT NULL,
            `Total` varchar(300) NOT NULL,
            PRIMARY KEY (`id`)
            ) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1";

        $conexion->Conectar()->exec($sql);
    }
    public function CrearTablaCategoriaProductos(){
        /*Tabla categoria productos */
        $conexion = new Conexiondb();
        $conexion->Conectar();
        $sql = "CREATE TABLE IF NOT EXISTS `CategoriaProductos` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `Nombre` varchar(300) NOT NULL,
            `Especifica` varchar(300) NOT NULL,
            `Total` varchar(300) NOT NULL,
            PRIMARY KEY (`id`)
            ) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1";

        $conexion->Conectar()->exec($sql);
    }
    public function CrearTablaCategoriaIngresos(){
        /*Tabla categoria ingresos */
        $conexion = new Conexiondb();
        $conexion->Conectar();
        $sql = "CREATE TABLE IF NOT EXISTS `CategoriaIngresos` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `Nombre` varchar(300) NOT NULL,
            `Especifica` varchar(300) NOT NULL,
            `Total` varchar(300) NOT NULL,
            PRIMARY KEY (`id`)
            ) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1";

        $conexion->Conectar()->exec($sql);
    }
    public function CrearTablaCategoriaSalidas(){
        /*Tabla categoria salidas */
        $conexion = new Conexiondb();
        $conexion->Conectar();
        $sql = "CREATE TABLE IF NOT EXISTS `CategoriaSalidas` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `Nombre` varchar(300) NOT NULL,
            
            PRIMARY KEY (`id`)
            ) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1";

        $conexion->Conectar()->exec($sql);
    }
    
    public function CrearTablaProducto(){
        /*Tabla Productos */
        include_once "Conectar.php";
        $conexion = new Conexiondb();
        $conexion->Conectar();
        //var_dump($conexion->Conectar());
        $sql = "CREATE TABLE IF NOT EXISTS `vw_productos` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `Detalle` varchar(300) NOT NULL,
            `Unidad_Medida` int(11) NOT NULL,/*clave foranea tabla unidad de medida */
            `Cantidad` int NOT NULL,
            `Almacen` int NOT NULL,/*clave foranea tabla almacenes */
            `categoria` varchar(300) NOT NULL,/*clave foranea tabla categoria producto */
            `Stock` int(30) NOT NULL,  
            FOREIGN KEY fk_categoria_id(Categoria)
            REFERENCES vw_categoria(id),        
            PRIMARY KEY (`id`)
            ) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1";

        $conexion->Conectar()->exec($sql);

    } 
    

    public function CrearTablaAlmacenes(){
        /*tabla almacenes */
        include_once "Conectar.php";
        $conexion = new Conexiondb();
        $conexion->Conectar();
        //var_dump($conexion->Conectar());
        $sql = "CREATE TABLE `Almacenes` (
                `id` int(5) NOT NULL DEFAULT 0,
                `Nombre` varchar(50) DEFAULT NULL
                ) ENGINE=MyISAM DEFAULT CHARSET=utf8";

        $conexion->Conectar()->exec($sql);
    }
    public function CrearTablaUnidadMedida(){
        /*tabla unidad de medida */
        include_once "Conectar.php";
        $conexion = new Conexiondb();
        $conexion->Conectar();
        //var_dump($conexion->Conectar());
        $sql = "CREATE TABLE `Unidad_Medida` (
                `id` int(5) NOT NULL DEFAULT 0,
                `Nombre` varchar(50) DEFAULT NULL
                ) ENGINE=MyISAM DEFAULT CHARSET=utf8";

        $conexion->Conectar()->exec($sql);
    }

   

}
