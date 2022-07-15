<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Unidades de Medida</title>
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
                            <h1>Unidades de Medida</h1>
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
                                    <h3 class="card-title">Nueva Unidad de medida</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                            </button>
                                        </div>
               
                                </div>
                                <div class="card-body">
                                     <form class="container" id="frmUnidadMedida">

                                        <div class="row frmFilas">
                                            <label for=" " class="col-md">Unidad De Medida</label>                      
                                            <input type="text" class="col-md form-control" required name="UnidadMedida" id="UnidadMedida" placeholder="Unidad de Medida">
                                            <label for=" " class="col-md">Simbolo</label>                      
                                            <input type="text" class="col-md form-control" required name="Simbolo" id="Simbolo" placeholder="Simbolo">
                                        </div>
                                        
                                        <div class="row">
                                                <button  class="btn btn-primary toastrDefaultSuccess">
                                                    Registrar Unidad de Medida
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
                                
                                <th>#</th>
                                <th>Unidad de Medida</th>
                                <th>Simbolo</th>
                                <th>Fecha de Registro</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody id="example2">
                            
                            

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
                                <p>Esta seguro de eliminar la Unidad de Medida?&hellip;</p>
                                <form id="frmEliminar">
                                    <input type="hidden" name="id" id="id">
                                </form>
                                
                                <p ></p>
                                </div>
                                <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
                                <button type="button" id="eliminarUnidadMedida"  class="btn btn-outline-light">Eliminar Unidad Medida </button>
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
                                            <label for=" " class="col-md">Unidad De Medida</label>                      
                                            <input type="text" class="col-md form-control" required name="upUnidadMedida" id="upUnidadMedida" placeholder="Unidad de Medida">
                                            <label for=" " class="col-md">Simbolo</label>                      
                                            <input type="text" class="col-md form-control" required name="upSimbolo" id="upSimbolo" placeholder="Simbolo">
                                        </div>
                                          
                                        <input type="hidden" name="upId" id="upId">
                                    </form>
                                
                                
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
                                    <button type="button" id="ActualizarUnidadMedida"  class="btn btn-outline-light">Actualizar Unidad Medida </button>
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
    <script src="<?=BASE_URL?>assets/js/UnidadMedida.js"></script>

</body>
</html>