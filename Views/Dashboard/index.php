
 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
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
                            <h1>Dashboard</h1>
                        </div>
                    </div>
                </div>
            </section>
            <!-- fin  titulo pagina -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
        
                    <div class="row">
                      <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                          <div class="inner">
                            <h3><?php echo($this->ingresos); ?></h3>

                            <p>Ingresos </p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-bag"></i>
                          </div>
                          <a href="<?php echo constant('BASE_URL');?>ingresos/ListaIngresos" class="small-box-footer">Ver ingresos <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                      <div class="col-lg-3 col-6">
                        <div class="small-box bg-success">
                          <div class="inner">
                            <h3><?php echo($this->salidas); ?></h3>

                            <p>Salidas</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                          </div>
                          <a href="<?php echo constant('BASE_URL');?>Salidas/ListaSalidas" class="small-box-footer">Ver Salidas <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
          
                      <div class="col-lg-3 col-6">
                       
                        <div class="small-box bg-warning">
                          <div class="inner">
                            <h3><?php echo($this->servicios); ?></h3>

                            <p>Usuarios</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-person-add"></i>
                          </div>
                          <a href="<?php echo constant('BASE_URL');?>Servicios/ListaServicios" class="small-box-footer">Ver Servicios <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
          
                      <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                          <div class="inner">
                            <h3><?php echo($this->productos); ?></h3>

                            <p>Productos</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                          </div>
                          <a href="<?php echo constant('BASE_URL');?>Productos/ListaProductos" class="small-box-footer">Ver Productos <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                        
                    </div>
                    <div class="row">
                   
                      <input type="hidden" name="tipoUsuario" id="tipoUsuario" value="<?php  echo $_SESSION['Tipo_Usuario'];  ?>" >
 
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
    <script src="<?=BASE_URL?>assets/js/session2.js"></script>

</body>
</html>



























