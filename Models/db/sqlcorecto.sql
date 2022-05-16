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
