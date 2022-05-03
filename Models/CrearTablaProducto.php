<?php

class CrearTablaProduto{

    public function CrearTablaDetalleVenta(){
        include_once "Conectar.php";
        $conexion = new Conexiondb();
        $conexion->Conectar();
        //var_dump($conexion->Conectar());
        $sql = "CREATE TABLE IF NOT EXISTS `vw_DetalleVenta` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `ProductoId` int NOT NULL,
                `Cantidad` int NOT NULL,
                `Precio` decimal(20,2) NOT NULL,
                `ClienteId` int ,
                PRIMARY KEY (`id`),
                
                FOREIGN KEY (ProductoId)      REFERENCES vw_productos(id),
            FOREIGN KEY (ClienteId)            REFERENCES vw_cliente(id),
         
                )";

        $conexion->Conectar()->exec($sql);
    }
    public function CrearTablaVenta(){
        include_once "Conectar.php";
        $conexion = new Conexiondb();
        $conexion->Conectar();
        //var_dump($conexion->Conectar());
        $sql = "CREATE TABLE IF NOT EXISTS `vw_ventas` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `DetalleVenta` int NOT NULL,
                `EstadoVenta` varchar NOT NULL,
                `Fecha` datetime NOT NULL,
                `Total` int NOT NULL,
                FOREIGN KEY fk_DetalleVenta_id(DetalleVenta)
            REFERENCES vw_DetalleVenta(id),
                PRIMARY KEY (`id`)
                ) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1";

        $conexion->Conectar()->exec($sql);
    }
    public function CrearTablaCliente(){
        include_once "Conectar.php";
        $conexion = new Conexiondb();
        $conexion->Conectar();
        $sql = "CREATE TABLE IF NOT EXISTS `vw_Cliente` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `Nombre` varchar(100) NOT NULL,
                `apPaterno` varchar(100) NOT NULL,
                `apMaterno` varchar(100) NOT NULL,
                `Direccion` varchar(100) NOT NULL,
                `Correo` varchar(100) NOT NULL,
                `Telefono` int(9) NOT NULL,

                PRIMARY KEY (`id`)
                ) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1";

        $conexion->Conectar()->exec($sql);
    }
    public function CrearTablaCategoria(){
        $conexion = new Conexiondb();
        $conexion->Conectar();
        $sql = "CREATE TABLE IF NOT EXISTS `vw_categoria` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `Nombre` varchar(300) NOT NULL,
            PRIMARY KEY (`id`)
            ) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1";

        $conexion->Conectar()->exec($sql);
    }
    
    public function CrearTablaProducto(){
        include_once "Conectar.php";
        $conexion = new Conexiondb();
        $conexion->Conectar();
        //var_dump($conexion->Conectar());
        $sql = "CREATE TABLE IF NOT EXISTS `vw_productos` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `Nombre` varchar(300) NOT NULL,
            `Precio` int(11) NOT NULL,
            `Imagen` mediumblob NOT NULL,
            `Categoria` int NOT NULL,
            `Detalle` varchar(300) NOT NULL,
            `Stock` int(30) NOT NULL,  
            FOREIGN KEY fk_categoria_id(Categoria)
            REFERENCES vw_categoria(id),        
            PRIMARY KEY (`id`)
            ) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1";

        $conexion->Conectar()->exec($sql);

    } 
    

    public function CrearTablaDepartamento(){
        include_once "Conectar.php";
        $conexion = new Conexiondb();
        $conexion->Conectar();
        //var_dump($conexion->Conectar());
        $sql = "CREATE TABLE `vw_departamento` (
                `idDepa` int(5) NOT NULL DEFAULT 0,
                `departamento` varchar(50) DEFAULT NULL
                ) ENGINE=MyISAM DEFAULT CHARSET=utf8";

        $conexion->Conectar()->exec($sql);
    }

    public function CrearTablaProvincia(){
        include_once "Conectar.php";
        $conexion = new Conexiondb();
        $conexion->Conectar();
        //var_dump($conexion->Conectar());
        $sql = "CREATE TABLE `vw_provincia` (
                `idProv` int(5) NOT NULL DEFAULT 0,
                `provincia` varchar(50) DEFAULT NULL,
                `idDepa` int(5) DEFAULT NULL
                ) ENGINE=MyISAM DEFAULT CHARSET=utf8";

        $conexion->Conectar()->exec($sql);
    }
    public function CrearTablaDistrito(){
        include_once "Conectar.php";
        $conexion = new Conexiondb();
        $conexion->Conectar();
        //var_dump($conexion->Conectar());
        $sql = "CREATE TABLE IF NOT EXISTS`vw_distrito` (
            `idDist` int(5) NOT NULL DEFAULT 0,
            `distrito` varchar(50) DEFAULT NULL,
            `idProv` int(5) DEFAULT NULL
          ) ENGINE=MyISAM DEFAULT CHARSET=utf8";

        $conexion->Conectar()->exec($sql);
    }

}
