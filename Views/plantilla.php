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
                                    <h3 class="card-title">Expandable</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                            </button>
                                        </div>
               
                                </div>
                                <div class="card-body">
                                    The body of the card
                                </div>
              
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
    <script src="<?=BASE_URL?>assets/js/AgregarIngreso.js"></script>

</body>
</html>

