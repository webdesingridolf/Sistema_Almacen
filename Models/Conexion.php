<?php
class Conexion{
    public $host= "127.0.0.1";
    public $usuario="root";
    public $db="grtpe_almacen";
    public $pasword="";
    public $puerto ="3306";

    //comienza la funciones
    public function conexionBD(){
        try {
            $conexionPDO = new PDO("mysql:host=$this->host; dbname=$this->db", $this->usuario, $this->pasword);
            //print_r($conexionPDO);
            $conexionPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //Echo "conexion realizada";
            return $conexionPDO;
        } catch (PDOexception $e) {
            ECHO "LA CONEXION FALLO" . $e->getMessage();
        }
    }
    public function CreateDB(){
        $conexionPDO = new PDO("mysql:host:$this->host ; port=$this->puerto", $this->usuario, $this->pasword);
        print_r($conexionPDO);
        
        $sql = "CREATE DATABASE $this->db";
        $crear = $conexionPDO->query($sql);
        $crear->exec();

        //ceacionde talavas
        
    }
    public function CreateTabla(){
        $sql= "CREATE DATABASE grtpe_almacen;

        CREATE TABLE Ingreso(
            id_Ingreso int(11) not null AUTO_INCREMENT  primary key,  
            fecha datetime not null default curtime(),
            cantidad int(11) not null,
            id_Producto int(11) not null, 
            precio float (8,2)not null,
            total float (8,2)not null,
            orden_de_compra varchar(30),
            id_Categoria int (11) not null,
            id_usuario int (11) not null 
        );
        
        CREATE TABLE Salida(
            id_Salida int(11) not null AUTO_INCREMENT primary key, 
            fecha datetime not null default curtime(),
            cantidada int(11)not null,
            id_Producto int(11) not null , 
            id_Usuario int (11) not null 
        );
        
        /*servicios que se presta de una empresa*/
        CREATE Table Servicio(
            id_Servicio int(11) not null AUTO_INCREMENT primary key,
            fecha datetime not null default curtime(),
            detalle varchar(100)not null,
            id_Usuario int (11) not null ,
            cantidad int(11) not null,
            especifica varchar(30)not null, 
            precio float(8,2) not null,
            total float(8,2) not null
        );
        
        CREATE TABLE Almacen(
            id_Almacen int AUTO_INCREMENT primary key,
            nombre varchar(30)
        );
        
        CREATE TABLE Producto (
            id_Producto int(11) not null AUTO_INCREMENT primary key,
            detalle varchar(30) not null,
            id_Unidad_Medida int(11) not null ,
            cantidad_Stock int(11)not null,
            id_Almacen int(11) not null,
            id_Categoria int(11) not null
        );
        
        CREATE TABLE Unidad_Medida (
            id_Unidad_Medida int(11) not null AUTO_INCREMENT primary key,
            nombre varchar (30),
            simbolo varchar(10)
        );
        
        
        CREATE TABLE Categoria(
            id_Categoria int(11) not null AUTO_INCREMENT primary key, 
            nombre varchar (30),
            total_Categoria float(8,2)
        );
        
        CREATE TABLE Usuario(
            id_Usuario int(11)not null AUTO_INCREMENT primary key,
            tipo_Documento varchar(20)not null,
            numero_Documento int(11)not null,
            nombre varchar(50)not null,
            apellido varchar(50)not null,
            fecha_Nacimiento date,
            log_User varchar(50) not null,/*usuario de loguin*/ 
            log_Pass varchar(50) not null,/*pasword de login*/
            fecha_Registro datetime not null default curtime() 
        );
        /*clave foranea de igreso*/ 
        ALTER TABLE Ingreso ADD CONSTRAINT FK_IngresoProducto foreign key(id_Producto) REFERENCES Producto(id_Producto);
        ALTER TABLE Ingreso ADD CONSTRAINT FK_IngresoCategoria foreign key (id_Categoria)REFERENCES Categoria(id_Categoria);
        ALTER TABLE Ingreso ADD CONSTRAINT FK_IngresoUsario foreign key(id_Usuario) REFERENCES Usuario(id_Usuario);
        /*clave foranea de salida*/
        ALTER TABLE Salida ADD  CONSTRAINT FK_SalidaProducto foreign key(id_Producto) REFERENCES Producto(id_Producto);
        ALTER Table Salida ADD  CONSTRAINT FK_SalidaUsario foreign key(id_Usuario) REFERENCES Usuario(id_Usuario);
        /*clave foranea Servico*/
        ALTER Table Servicio ADD CONSTRAINT FK_ServicioUsuario foreign key(id_Usuario) REFERENCES Usuario(id_Usuario);
        /*clave foranea Producto*/
        ALTER Table Producto ADD CONSTRAINT FK_ProductoUnidadMedida foreign key(id_Unidad_Medida) REFERENCES Unidad_Medida (id_Unidad_Medida);
        ALTER Table Producto ADD CONSTRAINT FK_ProductoAlmacen foreign key (id_Almacen) REFERENCES Almacen(id_Almacen);
        ALTER Table Producto ADD CONSTRAINT FK_ProductoCategoria foreign key(id_Categoria) REFERENCES Categoria (id_Categoria);
        ";
    }
}
//$conexionexe = new Conexion();
//$conexionexe->conexionBD();
//$conexionexe->CreateDB();
//print_r($conexionexe->conexionBD());

?>