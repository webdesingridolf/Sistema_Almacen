<?php 
    include_once("Views/Header.php")
?>

<!DOCTYPE html>
<html lang="en">
<title>Ingresos</title>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?=BASE_URL?>assets/img/Logo_GRTPE.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <?php 
            include_once("Views/NavUsuario.php")
        ?>

        <div class="content-wrapper">
            <!-- pagina de  contenido -->
    
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Ingresos</h1>
                        </div>
       
                    </div>
                </div>
            </div>

            <section class="content">

                <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"></h3>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-primary">
                                    Nuevo Ingreso
                                </button>
                        </div>

                <div class="card-body">
                <!--Contenido de la pagina -->

                <div class="container-fluid">
                    <form class="container" action="<?php echo constant('BASE_URL'); ?>ingresos/RegistrarIngreso">
                        
                        <div class="row">
                        <label class="col-md-1" for="">Producto</label>
                        <select class="form-control col-md" id="producto" >
                            <option value="">Seleccione un producto</option>
                            <?php foreach($this->mp as $row){
                            $producto=new productos();
                            $producto=$row;?>
                            <option value="<?php echo $producto->idProducto ;?>"><?php echo $producto->detalle; ?></option>
                          

                          <?php  } ?>
                        </select>
                        <label class="col-md-1" for="">Cantidad</label>
                        <input type="number" name="" id="" class="col-md-1">
                        <label class="col-md-1" for="">Precio</label>
                        <input type="number" name="" id="" class="col-md-1">
                        <label class="col-md-1" for="">Total</label>
                        <input type="number" name="" id="" class="col-md-1">
                        </div>
                        <br>
                        <div class="row">
                            <label for=""  class="col-md-2">Orden de compra</label>
                            <input type="text"  class="col-md-3">
                            <label for=""  class="col-md-2">Especifica</label>
                            <select class="form-control col-md" id="buscador2" >
                            <option selected="selected">orange</option>
                            <option>white</option>
                            <option>purple</option>
                        </select>
                      
                        


                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Agregar ingreso</button>

                    </form>
                </div>

                


                
                
                
                
                </div>
            </div>
       

            </section>
    
   
        </div>






  <!-- footer  -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
                All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0-rc
            </div>
        </footer>

  
    </div>




</body>
</html>
<script>
$("#producto").select2();
$("#buscador2").select2();

</script>


    <?php
        include_once("Views/Js.php");
    ?>