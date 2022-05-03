<?php
include_once "Conectar.php";
include_once "CreateTabla.php";
include_once "CrearTablaProducto.php";
include_once "CRUDUsuario.php";
//$Conexion = new Conexiondb();
//$Conexion->Conectar();

//$creartabla = new CreateTabla(); 
//$creartabla->CrearTablaUsuario();


//$creartabla->InsertUsuario("dni","123","ejemplo@gmail.com");
//$creartabla->InsertUsuario("A","123","ejemplo@gmail.com");
//$creartabla->InsertUsuario("D","123","ejemplo@gmail.com");
//$creartabla->InsertUsuario("O","123","ejemplo@gmail.com");
//$creartabla->InsertUsuario("L","123","ejemplo@gmail.com");
//$creartabla->InsertUsuario("F","123","ejemplo@gmail.com");
//$creartabla->InsertUsuario("O","123","ejemplo@gmail.com");

$creartablaproducto = new CrearTablaProduto();
//$creartablaproducto->CrearTablaDetalleVenta();
//$creartablaproducto->CrearTablaProducto();
//$creartablaproducto->CrearTablaCliente();
//$creartablaproducto->CrearTablaDetalleVenta();
//$creartablaproducto->CrearTablaVenta();

//$creartablaproducto->CrearTablaVenta();
//$creartablaproducto->CrearTablaDepartamento();
//$creartablaproducto->CrearTablaProvincia();
//$creartablaproducto->CrearTablaDistrito();
//$creartablaproducto->CrearTablaCategoria();

$CRUD = NEW CRUDUsuario();
//$CRUD->SelectUsuario();

//$CRUD->UpdateUsuario("gatito",2);
//$CRUD->InsertUsuario("l", "123", "rx@gmail.com");
//$CRUD->DeleteUsuario(10);
//$CRUD->SelectUnUsuario("l","123");
