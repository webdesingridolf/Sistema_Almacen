<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ingresos</title>
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
                            <h1>Ingresos</h1>
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

                                    <form class="container" id="frmIngresos">
                                        <div class="row">
                                            <label class="col-md-1" for="">Producto</label>
                                                <select class=" col-md" id="producto" name="producto" >
                                                    <option value="">Seleccione un producto</option>
                                                        <?php foreach($this->mp as $row){
                                                            $producto=new productos();
                                                            $producto=$row;?>
                                                        <option value="<?php echo $producto->idProducto ;?>"><?php echo $producto->detalle; ?></option>
                          

                                                        <?php  } ?>
                                                </select>
                                            <label class="col-md-1" for="">Cantidad</label>
                                                <input type="number" name="cantidad" id="cantidad"   class="col-md-1" min="1">
                                            <label class="col-md-1" for="">Precio</label>
                                                <input type="number" name="precio" id="precio" oninput="Total()" class="col-md-1" min="1"> 
                                            <label class="col-md-1" for="">Total</label>
                                                <input type="number" name="total" id="total" class="col-md-1" min="1" readonly >

                                        </div>
                                        <br>
                                        <div class="row">
                                            <label for=""  class="col-md-2">Orden de compra</label>
                                                <input type="number"  class="col-md-3" id="ordenCompra" name="ordenCompra" min="1">
                                            <label for=""  class="col-md-2">Especifica</label>
                                            <select class=" col-md-3" id="especifica" name="especifica" >
                                                <option value="Default" >Seleccione</option>
                                                    <?php foreach($this->me as $row){
                                                    $especifica=new especifica();
                                                    $especifica=$row;?>
                                                <option value="<?php echo $especifica->idEspecifica ;?>"><?php echo $especifica->codigo; ?></option>
                          

                                                    <?php  } ?>
                                            </select>

                                        </div>
                                        <div class="row">
                                            <button type="" class="btn btn-primary toastrDefaultSuccess">
                                                Registrar ingreso
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
                                    <th>Fecha</th>
                                    <th>Cantidad</th>
                                    <th>Unidad de Medida</th>
                                    <th>Producto</th>
                                    <th>Especifica</th>
                                    <th>Precio</th>
                                    <th>Total</th>
                                    <th>Orden de Compra</th>
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
        $("#producto").select2({
            placeholder: 'Seleccione un producto'
        });
        $("#especifica").select2({
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
    </script>
    <?php
        include_once("Views/Js.php");
    ?>
    <script src="<?=BASE_URL?>assets/js/AgregarIngreso.js"></script>
</body>
</html>