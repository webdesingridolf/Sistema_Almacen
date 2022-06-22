<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Servicios</title>
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
                            <h1>Servicios</h1>
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
                                    <h3 class="card-title">Nuevo servicio</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                            </button>
                                        </div>
               
                                </div>
                                <div class="card-body">
                                    <form class="container" id="frmServicios" >
                                        <div class="row frmFilas">
                                            <label for="" class=" col-md" >Detalle</label>
                                                <input type="text" class="col-md form-control " name="detalle" id="detalle">
                                            <label for="" class=" col-md ">Especifica</label>
                                                <select name="Especifica" id="Especifica" class="col-md form-control">
                                                    <option value="Default" >Seleccione</option>
                                                        <?php foreach($this->me as $row){
                                                        $especifica=new especifica ();
                                                        $especifica=$row;?>
                                                    <option value="<?php echo $especifica->idEspecifica ;?>"><?php echo $especifica->detalle; ?></option>
                          

                                                    <?php  } ?>

                                                </select>
                                            <label for="" class="col-md">O/S</label>
                                                <input type="text" class="col-md form-control" name="os" id="os">
                                        </div>
                                        <div class="row frmFilas">
                                            <label for="" class=" col-md ">Cantidad</label>
                                                <input type="number" name="cantidad" id="cantidad" class="col-md form-control">
                                            <label for="" class=" col-md ">Precio</label>
                                                <input type="number" name="precio" id="precio" class="col-md form-control">
                                            <label for="" class=" col-md ">Total</label>
                                                <input type="number" name="total" id="total" class="col-md form-control">
                                        </div>
                                        <div class="row frmFilas">
                                            <button type="" class="btn btn-primary toastrDefaultSuccess">
                                                Registrar Servicio
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
    <script src="<?=BASE_URL?>assets/js/Servicios.js"></script>

</body>
</html>

