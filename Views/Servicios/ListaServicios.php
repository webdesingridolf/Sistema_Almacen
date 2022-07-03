<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista Servicios</title>
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
                            <h1>Lista de Servicios</h1>
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
                                        <th>Fecha</th>
                                        <th>Cantidad</th>
                                        <th>Detalle</th>
                                        <th>Especifica </th>
                                        <th>Precio </th>
                                        <th>Total </th>
                                        <th>O/S </th>
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
                                <p>Esta seguro de eliminar el servicio?&hellip;</p>
                                <form id="frmEliminar">
                                    <input type="hidden" name="id" id="id">
                                </form>
                                
                                <p ></p>
                                </div>
                                <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
                                <button type="button" id="eliminarServicio"  class="btn btn-outline-light">Eliminar Servicio </button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                            </div>
                        </div>
                        <!-- /.modal -->
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
                                            <input type="text" class="col-md form-control" name="upDetalle" id="upDetalle" required>

                                        </div>
                                        <div class="row frmFilas">
                                            <label for="" class="col-md ">Cantidad</label>
                                            <input type="number" name="upCantidad" id="upCantidad"  oninput="ATotal()" class="col-md form-control" required>
                                            <label for="" class="col-md ">Precio</label>
                                            <input type="text" name="upPrecio" id="upPrecio"  oninput="ATotal()" class="col-md form-control" required>
                                            <label for="" class="col-md ">Total</label>
                                            <input type="text" name="upTotal" id="upTotal"  class="col-md form-control" required>
                                            

                                        </div>
                                      

                                        <div class="row frmFilas">
                                        <label for="" class="col-md-2 ">O/S</label>
                                            <input type="text" name="upOS" id="upOS" class="col-md form-control" >
                                            <label for="" class="col-md ">Especifica</label>
                                            <select class="selectP col-md form-control " id="upEspecifica" name="upEspecifica" required>
                                                <option value="Default" >Seleccione</option>
                                                    <?php foreach($this->me as $row){
                                                    $especifica=new especifica();
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
                                    <button type="button" id="ActualizarServicio"  class="btn btn-outline-light">Actualizar Salida </button>
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
        
        $("#Especifica").select2({
            placeholder: 'Seleccione una opcion'
        });
        $("#upEspecifica").select2({
            placeholder: 'Seleccione una opcion'
        });
        
        function Total() {
            try {
                var precio=parseFloat(document.querySelector("#precio").value);
                var cantidad=parseFloat(document.querySelector("#cantidad").value);
                document.querySelector("#total").value=precio*cantidad;
            } catch (e) {
        
            }
    
        }  
        function ATotal() {
            try {
                var precio=parseFloat(document.querySelector("#upPrecio").value);
                var cantidad=parseFloat(document.querySelector("#upCantidad").value);
                document.querySelector("#upTotal").value=precio*cantidad;
            } catch (e) {
        
            }
    
        }  
    </script>
    
    <?php
        include_once("Views/Js.php");
    ?>
    <script src="<?=BASE_URL?>assets/js/ListaServicios.js"></script>

</body>
</html>