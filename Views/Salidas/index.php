<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Salidas</title>
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
                            <h1>Salidas</h1>
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
                            <div class="card card-primary collapsed-card">
                                <div class="card-header">
                                    <h3 class="card-title">Nueva Salida</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                            </button>
                                        </div>
               
                                </div>
                                <div class="card-body">
                                    <form  class="container" id="frmSalidas">

                                        <div class="row frmFilas">
                                            <label for="" class="col-md-1">Producto</label>
                                            <select name="producto" id="producto" class="col-md form-control">
                                                    <option value="">Seleccione un producto</option>
                                                        <?php foreach($this->mp as $row){
                                                            $producto=new productos();
                                                            $producto=$row;?>
                                                    <option value="<?php echo $producto->idProducto ;?>"><?php echo $producto->detalle; ?></option>
                          

                                                        <?php  } ?>

                                            </select>
                                            <label for="" class="col-md-1">Area</label>
                                            <input type="text" name="area" id="area"  class="col-md form-control">
                                            
                                        </div>
                                        <div class="row frmFilas">
                                            
                                           
                                            <label for="" class="col-md-1">Cantidad</label>
                                            <input type="number"  name="cantidad" id="cantidad" class="col-md form-control">
                                            <label for="" class="col-md-2" id="CUnidadesLabel">Cantidad en Unidades</label>
                                            <input type="number" name="CUnidades" id="CUnidades"  class="col-md form-control">
                                        </div>

                                        <div class="row frmFilas">
                                            <label for="" class="col-md-1">Especifica</label>
                                            <select name="especifica" id="especifica" class="col-md form-control">
                                                <option value="Default" >Seleccione</option>
                                                    <?php foreach($this->me as $row){
                                                    $especifica=new especifica();
                                                    $especifica=$row;?>
                                                <option value="<?php echo $especifica->idEspecifica ;?>"><?php echo $especifica->codigo; ?></option>
                          

                                                    <?php  } ?>

                                            </select>
                                             <label for="" class="col-md-1">O/C</label> 
                                             <input type="text" name="oc" id="oc" class="col-md form-control">
                                             <label for="" class="col-md-2">Nº de PECOSA</label> 
                                             <input type="text"  name="nPecosa" id="nPecosa" class="col-md form-control">
                                             
                                             <!--<label for="">/*</label>-->
                                             
                                        </div>
                                        <div class="row frmFilas">
                                            <input type="hidden" name="usuario" id="usuario" value="<?php echo $_SESSION['id_User']; ?>">
                                            <input type="hidden" name="equivalencia" id="equivalencia" >
                                            <button type="" class="btn btn-primary toastrDefaultSuccess">
                                                Registrar Salida
                                            </button> 

                                        </div>

                                    </form>
                                    
                                </div>
              
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Descripcion</th>
                                        <th>Area</th>
                                        <th>Fecha de Salida</th>
                                        <th>Cantidad </th>
                                        <th>Cantidad en Unidades </th>
                                        <th>O/C </th>
                                        <th>Nº de Pecosa </th>
                                        <th>Especifica </th>
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
                                <p>Esta seguro de eliminar la salida?&hellip;</p>
                                <form id="frmEliminar">
                                    <input type="hidden" name="id" id="id">
                                </form>
                                
                                <p ></p>
                                </div>
                                <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
                                <button type="button" id="eliminarIngreso"  class="btn btn-outline-light">Eliminar Salida </button>
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
                                            <label for="" class="col-md-3 ">Producto</label>
                                            <input type="text" id="upProducto" name="upProducto" class="col-md form-control" readonly>
                                            <input type="hidden" id="upProductoid" name="upProductoid">
                                             

                                        </div>
                                        <div class="row frmFilas">
                                            <label for="" class="col-md ">Cantidad</label>
                                            <input type="number" name="upCantidad" id="upCantidad"  class="col-md form-control" required>
                                            <label for="" class="col-md " id="upCUnidadLabel">Cantidad en unidades</label>
                                            <input type="number" name="upCUnidad" id="upCUnidad"  class="col-md form-control" required>
                                           

                                        </div>
                                        <div class="row frmFilas">
                                            <label for="" class="col-md ">O/C</label>
                                            <input type="text" name="upOC" id="upOC" class="col-md form-control" >
                                            <label for="" class="col-md ">Nro de Pecosa</label>
                                            <input type="number" name="upNPecosa" id="upNPecosa" class="col-md form-control">               


                                        </div>

                                        <div class="row frmFilas">
                                            
                                            <label for="" class="col-md ">Especifica</label>
                                            <select class=" col-md form-control" id="upEspecifica" name="upEspecifica" required>
                                                <option value="Default" >Seleccione</option>
                                                    <?php foreach($this->me as $row){
                                                    $especifica=new especifica();
                                                    $especifica=$row;?>
                                                <option value="<?php echo $especifica->idEspecifica ;?>"><?php echo $especifica->codigo; ?></option>
                          

                                                    <?php  } ?>
                                            </select>
                                            <label for="" class="col-md ">Area</label>
                                            <input type="text" name="upArea" id="upArea"  class="col-md form-control" required>
                                            
                                            
                                        </div>
                                        <input type="hidden" name="CUnidadA" id="CUnidadA">
                                        <input type="hidden" name="CantidadA" id="CantidadA">
                                        <input type="hidden" name="upId" id="upId">
                                    </form>
                                
                                
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
                                    <button type="button" id="ActualizarSalida"  class="btn btn-outline-light">Actualizar Salida </button>
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
    
    <?php
        include_once("Views/Js.php");
    ?>
    <script>
        $("#producto").select2({
            placeholder: 'Seleccione un producto'
        });
        $("#especifica").select2({
            placeholder: 'Seleccione una opcion'
        });
    </script>
    <script src="<?=BASE_URL?>assets/js/Salidas.js"></script>

</body>
</html>
