<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perfil de Usuario</title>
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
                            <h1>Perfil de Usuario</h1>
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
                            <!-- Widget: user widget style 1 -->
                            <div class="card card-widget widget-user">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header bg-info">
                                <h3 class="widget-user-username">Alexander Pierce</h3>
                                <h5 class="widget-user-desc">Founder & CEO</h5>
                            </div>
                            <div class="widget-user-image">
                                <img class="img-circle elevation-2" src="<?=BASE_URL?>assets/dist/img/user1-128x128.jpg" alt="User Avatar">
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                <div class="col-sm-4 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header">Tipo de Documento</h5>
                                        <span class="description-text">DNI</span>
                                    </div>
                                    <div class="description-block">
                                        <h5 class="description-header">Nº de Documento</h5>
                                        <span class="description-text">xxxxxxxxxxxxxxx</span>
                                    </div>
                                 
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header">Nombre</h5>
                                        <span class="description-text">xxxx</span>
                                    </div>
                                    <div class="description-block">
                                        <h5 class="description-header">Apellido</h5>
                                        <span class="description-text">xxxx</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4">
                                    <div class="description-block">
                                        <span class="description-text">Fecha de Nacimiento</span>
                                        <h5 class="description-header">03/02/2001</h5>
                                    
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                            </div>
                            <!-- /.widget-user -->
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
    <script src="<?=BASE_URL?>assets/js/AgregarIngreso.js"></script>

</body>
</html>

