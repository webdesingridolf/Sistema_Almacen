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
                FOREIGN KEY (Producto)      REFERENCES Productos(id),
                FOREIGN KEY (Categoria)     REFERENCES CategoriaIngresos(id),
                FOREIGN KEY (Usuario)       REFERENCES Usuario(id)
         
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
                `Usuario` int NOT NULL,/*Clave foranea tabla usuarios */
                FOREIGN KEY (Usuario)       REFERENCES Usuario(id),
                FOREIGN KEY (Producto)       REFERENCES Productos(id),
                
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
                `Detalle` varchar NOT NULL,
                `Unidad_Medida` int NOT NULL,/*clave foranea tabla unidades de medida */
                `Cantidad` int NOT NULL,
                `Precio` int NOT NULL,
                `Total` int NOT NULL,
                `O/S` varchar NOT NULL,
                `Usuario` int NOT NULL,/*clave foranea tabla usuarios */
                `Categoria` int NOT NULL,/*clave foranea tabla categorias */
                FOREIGN KEY (Unidad_Medida)       REFERENCES Unidad_Medida(id),
                FOREIGN KEY (Usuario)             REFERENCES Usuario(id),
                FOREIGN KEY (Categoria)           REFERENCES CategoriaServicios(id),


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
        $sql = "CREATE TABLE IF NOT EXISTS `Productos` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `Detalle` varchar(300) NOT NULL,
            `Unidad_Medida` int ,/*clave foranea tabla unidad de medida */
            `Cantidad` int NOT NULL,
            `Almacen` int ,/*clave foranea tabla almacenes */
           /* `categoria` varchar(300) NOT NULL,clave foranea tabla categoria producto */
            `Stock` int(30) NOT NULL,  
           /*  FOREIGN KEY fk_categoria_id(Categoria)           REFERENCES categoria(id),*/
            FOREIGN KEY fk_unidad_medida(Unidad_Medida)           REFERENCES Unidad_Medida(id),  
            FOREIGN KEY fk_almacen(Almacen)                       REFERENCES Almacenes(id),          
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
                `id` int(11) NOT NULL DEFAULT 0,
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
                `id` int(11) NOT NULL DEFAULT 0,
                `Nombre` varchar(50) DEFAULT NULL
                ) ENGINE=MyISAM DEFAULT CHARSET=utf8";

        $conexion->Conectar()->exec($sql);
    }

   

}
