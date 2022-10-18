<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ingresos y Salidas</title>
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
                            <h1>Ingresos y Salidas</h1>
                        </div>
                    </div>
                </div>
            </section>
            <!-- fin  titulo pagina -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row frmFilas">
                        <div style="padding: 10px;">
                            <input type="button" value="Ingresos" id="btningresos" class="btn btn-primary">
                        </div>
                        <div style="padding: 10px;">
                            <input type="button" value="Salidas" id="btnSalidas" class="btn btn-success">
                        </div>
                        
                    </div>
        
                <div class="row">
                        <div class="col-md-12">
                            <table id="Ingresos" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Cantidad</th>
                                        <th>Cantidad en Unidades</th>
                                        <th>Unidad de Medida</th>
                                        <th>Producto</th>
                                        <th>Especifica</th>
                                        <th>Precio</th>
                                        <th>Total</th>
                                        <th>Orden de Compra</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>

                        </div>
                    </div>

                    
      
                </div>
                <div class="row">
                        <div class="col-md-12">
                            <table id="Salidas" class="table table-bordered table-striped">
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
                                        
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>

                        </div>
                    </div>

                    
      
                </div>
            </section>
    

    
        </div>
        <!-- fin contenido -->
        <!-- inicio del footer -->
        <footer class="main-footer">
            
            <p>Av. Micaela Bastidas esquina con Alcides Vigo #301 - Wanchaq, Cusco</p>
            <p>Central Telefónica: 084 - 240744</p>
            <p>Portal Web: www.drtpe.regioncusco.gob.pe</p>
            <p>Página de Facebook: @trabajocusco</p>
        </footer>

  
    </div>
    
    <?php
        include_once("Views/Js.php");
    ?>
    <script src="<?=BASE_URL?>assets/js/Reportes.js"></script>

</body>
</html>