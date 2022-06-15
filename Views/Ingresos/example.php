<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><!--Nombre de la pagina--></title>
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
                            <h1>Widgets</h1>
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
                                    <h3 class="card-title">Nuevo ingreso</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                            </button>
                                        </div>
               
                                </div>
                                <div class="card-body">
                                    <!--inicio contenido de la ventana desplegable-->

                                    <form class="container" id="frmProductos">
                                        <div class="row">
                                            <label class="col-md-1" for="">Detalle</label>
                                                <input type="text" name="detalle" id="detalle"  class="col-md form-control" >
                                            <label class="col-md-1" for="">Unidad de Medida</label>
                                            <select class=" col-md form-control" id="unidadMedida" name="unidadMedida" >
                                                <option value="">Seleccione </option>
                                                    <?php foreach($this->mum as $row){
                                                    $unidadMedida=new unidadMedida();
                                                    $unidadMedida=$row;?>
                                                <option value="<?php echo $unidadMedida->idUnidadMedida ;?>"><?php echo $unidadMedida->nombreUM; ?></option>
                          

                                                    <?php  } ?>
                                            </select>
                            
                                            <label class="col-md-1" for="">Stock</label>
                                                <input type="number" name="stock" id="stock" class="col-md form-control" min="1">

                                        </div>
                                        <br>
                                        <div class="row">
                                            <label for=""  class="col-md-2 col-form-label">Especifica</label>
                                            <select class=" col-md form-control" id="especifica" name="especifica" >
                                                <option value="Default" >Seleccione</option>
                                                    <?php foreach($this->me as $row){
                                                    $especifica=new especifica ();
                                                    $especifica=$row;?>
                                                <option value="<?php echo $especifica->idEspecifica ;?>"><?php echo $especifica->detalle; ?></option>
                          

                                                    <?php  } ?>
                                            </select>
                                            <label for=""  class="col-md-2 col-form-label">Almacen</label>
                                            <select class=" col-md form-control" id="almacen" name="almacen" >
                                                <option value="Default" >Seleccione</option>
                                                    <?php foreach($this->ma as $row){
                                                    $almacen=new  almacen();
                                                    $almacen=$row;?>
                                                <option value="<?php echo $almacen->idAlmacen ;?>"><?php echo $almacen->nombre; ?></option>
                          

                                                <?php  } ?>
                                            </select>

                                        </div>
                                        <div class="row">
                                            <button type="" class="btn btn-primary toastrDefaultSuccess">
                                                Registrar Producto
                                            </button>                

                                        </div>

                                    </form>




                                    <!--fin  contenido de la ventana desplegable-->
                                </div>
              
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Detalle</th>
                                    <th>Unidad de Medida</th>
                                    <th>Stock</th>
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
        $("#unidadMedida").select2({
            placeholder: 'Seleccione una opcion'
        });
        $("#especifica").select2({
            placeholder: 'Seleccione una opcion'
        });
        $("#almacen").select2({
            placeholder: 'Seleccione una opcion'
        });
    </script>
    <?php
        include_once("Views/Js.php");
    ?>
    <script src="<?=BASE_URL?>assets/js/AgregarProducto.js"></script>
</body>
</html>