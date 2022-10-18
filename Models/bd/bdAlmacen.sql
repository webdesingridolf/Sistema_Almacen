

CREATE TABLE Ingreso(
    id_Ingreso int(11) not null AUTO_INCREMENT  primary key,  
    fecha datetime not null,
    cantidad int(11) not null,
    CantidadUnidad int(11),
    id_Producto int(11) not null,  
    precio float (8,2)not null,
    total float (8,2)not null,
    orden_de_compra varchar(100),
    id_Especifica int (11) not null,
    id_usuario int (11) not null 
);

CREATE TABLE Salida(
    id_Salida int(11) not null AUTO_INCREMENT primary key, 
    fecha datetime not null ,
    cantidad int(11)not null,  
    CantidadUnidad int(30),
    id_Producto int(11) not null , 
    id_Usuario int (11) not null,
    id_Especifica int(11)not null,
    area varchar(30)not null,
    n_pecosa int(30)not null,
    o_c varchar(30)not null
    
    
);

/*servicios que se presta de una empresa*/


CREATE TABLE Almacen(
    id_Almacen int AUTO_INCREMENT primary key,
    nombre varchar(30),
    fecha_Registro datetime not null default curtime()
);

CREATE TABLE Producto (
    id_Producto int(11) not null AUTO_INCREMENT primary key,
    detalle varchar(30) not null,
    id_Unidad_Medida int(11) not null ,
    Stock int(11)not null,
    Stock_Unidad int(30),
    id_Almacen int(11) not null,
    id_Especifica int(11) not null,
    fecha_Registro datetime not null 
);

CREATE TABLE Unidad_Medida (
    id_Unidad_Medida int(11) not null AUTO_INCREMENT primary key,
    NombreUM varchar (300),
    simbolo varchar(10),
    Extra int(30),
    Equivalencia int(30),
    fecha_Registro datetime not null 
);


CREATE TABLE Especifica( /*especifica tipo de gasto*/
    id_Especifica int(11) not null AUTO_INCREMENT primary key, 
    detalle_Especifica varchar(300)not null,
    codigo varchar(13)not null,
    fecha_Registro datetime not null 
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
    fecha_Registro datetime not null ,
    Tipo_Usuario varchar(50) not null
);