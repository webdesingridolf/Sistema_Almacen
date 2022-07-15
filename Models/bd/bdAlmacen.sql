

CREATE TABLE Ingreso(
    id_Ingreso int(11) not null AUTO_INCREMENT  primary key,  
    fecha datetime not null default curtime(),
    cantidad int(11) not null,
    id_Producto int(11) not null,  
    precio float (8,2)not null,
    total float (8,2)not null,
    orden_de_compra varchar(30),
    id_Especifica int (11) not null,
    id_usuario int (11) not null 
);

CREATE TABLE Salida(
    id_Salida int(11) not null AUTO_INCREMENT primary key, 
    fecha datetime not null ,
    cantidad int(11)not null,
    id_Producto int(11) not null , 
    id_Usuario int (11) not null,
    id_Especifica int(11)not null,
    area varchar(30)not null,
    devolucion varchar(30)not null,
    n_pecosa int(30)not null,
    o_c varchar(30)not null
    
    
);

/*servicios que se presta de una empresa*/
CREATE Table Servicio(
    id_Servicio int(11) not null AUTO_INCREMENT primary key,
    fecha datetime not null default curtime(),
    detalle varchar(100)not null,
    id_Usuario int (11) not null ,
    cantidad int(11) not null,
    id_Especifica int(11)not null, 
    precio float(8,2) not null,
    total float(8,2) not null
);

CREATE TABLE Almacen(
    id_Almacen int AUTO_INCREMENT primary key,
    nombre varchar(30),
    fecha_Registro datetime not null default curtime()
);

CREATE TABLE Producto (
    id_Producto int(11) not null AUTO_INCREMENT primary key,
    detalle varchar(30) not null,
    id_Unidad_Medida int(11) not null ,
    cantidad_Stock int(11)not null,
    id_Almacen int(11) not null,
    id_Especifica int(11) not null,
    fecha_Registro datetime not null default curtime()
);

CREATE TABLE Unidad_Medida (
    id_Unidad_Medida int(11) not null AUTO_INCREMENT primary key,
    NombreUM varchar (30),
    simbolo varchar(10),
    fecha_Registro datetime not null default curtime()
);


CREATE TABLE Especifica( /*especifica tipo de gasto*/
    id_Especifica int(11) not null AUTO_INCREMENT primary key, 
    detalle_Especifica varchar(30)not null,
    codigo varchar(13)not null,
    fecha_Registro datetime not null default curtime()
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
    fecha_Registro datetime not null default curtime(),
    Tipo_Usuario varchar(50) not null
);