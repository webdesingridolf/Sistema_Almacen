<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Productos</title>
    <!--header aca-->
    <?php 
        include_once("Views/Header.php")
    ?>
  
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- inicio Navbar -->
        <!--carga inicial de la pagina -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?=BASE_URL?>assets/img/Logo_GRTPE.png" alt="AdminLTELogo" height="60" width="60">
        </div>
        <!-- Navbar -->
        <?php 
            include_once("Views/NavUsuario.php")
        ?>
        <!-- fin navbar -->

 

        <!-- inicio contenido -->
        <div class="content-wrapper">
            <!-- titulo pagina -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Productos</h1>
                        </div>
                    </div>
                </div>
            </section>
            <!-- fin  titulo pagina -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
        
                    
                    <div class="row">
                        <div class="col-md-12">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                    
                                        <th>Detalle</th>
                                        <th>Unidad de Medida</th>
                                        <th>Stock</th>
                                        <th>Stock en Unidades</th>
                                        <th>Almacen</th>
                                        <th>Especifica</th>
                                        <th>Fecha de Registro </th>
                                        <th>Acciones </th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>

                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="modal fade" id="modalEliminar">
                            <div class="modal-dialog">
                            <div class="modal-content bg-danger">
                                <div class="modal-header">
                                <h4 class="modal-title"> Eliminar</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                <p>Esta seguro de eliminar el Producto?&hellip;</p>
                                <form id="frmEliminar">
                                    <input type="hidden" name="id" id="id">
                                </form>
                                
                                <p ></p>
                                </div>
                                <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
                                <button type="button" id="eliminarProducto"  class="btn btn-outline-light">Eliminar Servicio </button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="modal fade" id="modalActualizar">
                            <div class="modal-dialog">
                            <div class="modal-content bg-primary">
                                <div class="modal-header">
                                <h4 class="modal-title"> Actualizar</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                
                                    <form id="frmActualizar">
                                        <div class="row frmFilas">
                                            <label for="" class="col-md-3 ">Detalle</label>
                                            <input type="text" id="upDetalle" name="upDetalle" class="col-md form-control" required>
                                               

                                        </div>
                                        <div class="row frmFilas">
                                            <label for="" class="col-md ">Unidad De Medida</label>
                                            <select class=" col-md form-control" id="upUnidadMedida" name="upUnidadMedida" >
                                                <option value="">Seleccione </option>
                                                    <?php foreach($this->mum as $row){
                                                    $unidadMedida=new unidadMedida();
                                                    $unidadMedida=$row;?>
                                                <option value="<?php echo $unidadMedida->idUnidadMedida ;?>"><?php echo $unidadMedida->nombreUM; ?></option>
                          

                                                    <?php  } ?>
                                            </select>
                                            <label for="" class="col-md ">Almacen</label>
                                            <select class=" col-md form-control" id="upAlmacen" name="upAlmacen" >
                                                <option value="Default" >Seleccione</option>
                                                    <?php foreach($this->ma as $row){
                                                    $almacen=new  almacen();
                                                    $almacen=$row;?>
                                                <option value="<?php echo $almacen->idAlmacen ;?>"><?php echo $almacen->nombre; ?></option>
                          

                                                <?php  } ?>
                                            </select>

                                        </div>
                                        <div class="row frmFilas">
                                            <label for="" class="col-md ">Stock</label>
                                            <input type="number" name="upStock" id="upStock" class="col-md form-control" required>
                                            <label for="" class="col-md " id="upStockUnidadLabel">Stock en Unidades</label>
                                            <input type="number" name="upStockUnidad" id="upStockUnidad" class="col-md form-control" required>
                                            <label for="" class="col-md ">Especifica</label>
                                            <select class=" col-md form-control" id="upEspecifica" name="upEspecifica" >
                                                <option value="Default" >Seleccione</option>
                                                    <?php foreach($this->me as $row){
                                                    $especifica=new especifica ();
                                                    $especifica=$row;?>
                                                <option value="<?php echo $especifica->idEspecifica ;?>"><?php echo $especifica->detalle; ?></option>
                          

                                                    <?php  } ?>
                                            </select>
                                        </div>
                                        
                                        
                                        <input type="hidden" name="upId" id="upId">
                                    </form>
                                
                                
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
                                    <button type="button" id="ActualizarProducto"  class="btn btn-outline-light">Actualizar Producto </button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                            </div>
                        </div>

                    </div>
                   
                   

      
                </div>
            </section>
    

    
        </div>
        <!-- fin contenido -->
        <!-- inicio del footer -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.2.0-rc
            </div>
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        </footer>

  
    </div>
    <script>
        $("#upUnidadMedida").select2({
            placeholder: 'Seleccione una opcion'
        });
        $("#upEspecifica").select2({
            placeholder: 'Seleccione una opcion'
        });
        $("#upAlmacen").select2({
            placeholder: 'Seleccione una opcion'
        });
    </script>
    <?php
        include_once("Views/Js.php");
    ?>
    <script src="<?=BASE_URL?>assets/js/ListaProducto.js"></script>
</body>
</html>