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
                                                <input type="text" class="col-md form-control ">
                                            <label for="" class=" col-md ">Especifica</label>
                                                <select name="" id="" class="col-md form-control">
                                                    <option value="Default" >Seleccione</option>
                                                        <?php foreach($this->me as $row){
                                                        $especifica=new especifica ();
                                                        $especifica=$row;?>
                                                    <option value="<?php echo $especifica->idEspecifica ;?>"><?php echo $especifica->detalle; ?></option>
                          

                                                    <?php  } ?>

                                                </select>
                                            <label for="" class="col-md">O/S</label>
                                                <input type="text" class="col-md form-control">
                                        </div>
                                        <div class="row frmFilas">
                                            <label for="" class=" col-md ">Cantidad</label>
                                                <input type="number" name="" id="" class="col-md form-control">
                                            <label for="" class=" col-md ">Precio</label>
                                                <input type="number" name="" id="" class="col-md form-control">
                                            <label for="" class=" col-md ">Total</label>
                                                <input type="number" name="" id="" class="col-md form-control">
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

