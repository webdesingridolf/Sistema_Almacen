
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Usuarios</title>
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
                            <h1>Usuarios</h1>
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
                                    <h3 class="card-title">Nuevo Usuario</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                            </button>
                                        </div>
               
                                </div>
                                <div class="card-body">
                                    <form class="container" id="frmUsuarios">

                                        <div class="row frmFilas">
                                            <label for="Seleccione " class="col-md">Tipo de Documento</label>                      
                                                <select class="col-md form-control" id="TipoDocumento" name="TipoDocumento">
                                                    <option value="">Seleccione el Tipo de Documento</option>
                                                    <option>DNI</option>
                                                    <option>CARNET EXT.</option>
                                                    <option>PASAPORTE</option>
                                                    <option>OTROS</option>
                                                   
                                                </select>
                                                <label for="NumeroDocumento" class="col-md">Numero de Documento</label>
                                                    <input type="number" class="col-md form-control" required name="NumeroDocumento" id="NumeroDocumento" placeholder="Numero de Documento">
                                        </div>
                                        <div class="row frmFilas">
                                            <label for="Nombre" class="col-md col-form-label">Nombre</label>
                                                <input type="text" class="col-md form-control" required name="Nombre" id="Nombre" placeholder="Nombre">
                                            <label for="Apellido" class="col-md col-form-label">Apellido</label>
                        
                                                <input type="text" class="col-md form-control" required name="Apellido" id="Apellido" placeholder="Apellido">
                                            <label for="FechaNacimiento" class="col-md col-form-label">Fecha de Nacimiento</label>
                            
                                                <input type="date" class="col-md form-control" required name="FechaNacimiento" id="FechaNacimiento" placeholder=>
                            

                                        </div>
                                        <div class="row frmFilas">
                                            <label for="Usuario" class="col-md col-form-label">Usuario</label>       
                                                <input type="text" class="col-md form-control" required name="Usuario" id="Usuario" placeholder="Usuario" >
                                            <label for="Contraseña" class="col-md col-form-label">Contraseña</label>
                                                <input type="password" class="col-md form-control" required name="Contraseña" id="Contraseña" placeholder="Contraseña" >
                                            <label for="" class="col-md">Tipo de Usuario</label>
                                                <select name="TipoUsuario" id="TipoUsuario" class="col-md form-control">
                                                    <option value="Administrador">Administrador</option>
                                                    <option value="Usuario">Usuario Comun</option>
                                                </select>


                                        </div>
                                        <div class="row">
                                                <button  class="btn btn-primary toastrDefaultSuccess">
                                                    Registrar Usuario
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
                                
                                <th>Tipo de Documento</th>
                                <th>Numero Documento</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Tipo de Usuario</th>
                                <th>Usuario</th>
                                <th>contraseña</th>
                                <th>Fecha de Nacimiento</th>
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
                                <p>Esta seguro de eliminar el Usuario?&hellip;</p>
                                <form id="frmEliminar">
                                    <input type="hidden" name="id" id="id">
                                </form>
                                
                                <p ></p>
                                </div>
                                <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
                                <button type="button" id="eliminarUsuario"  class="btn btn-outline-light">Eliminar Usuario </button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="modal fade" id="modalActualizar">
                            <div class="modal-dialog modal-lg">
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
                                            <label for="" class="col-md-3 ">Tipo de Documento</label>
                                                <select class=" col-md form-control" id="upTipoDocumento" name="upTipoDocumento" required >
                                                    <option value="">Seleccione el Tipo de Documento</option>
                                                    <option>DNI</option>
                                                    <option>CARNET EXT.</option>
                                                    <option>PASAPORTE</option>
                                                    <option>OTROS</option>
                                                       
                                                </select>
                                            <label for="" class="col-md-3">Numero Documento</label>
                                                <input type="number" class="col-md form-control" name="upNDocumento" id="upNDocumento">

                                        </div>
                                        <div class="row frmFilas">
                                            <label for="" class="col-md ">Nombre</label>
                                            <input type="text" name="upNombre" id="upNombre"  class="col-md form-control" required>
                                            <label for="" class="col-md ">Apellido</label>
                                            <input type="text" name="upApellido" id="upApellido"  class="col-md form-control" required>
                                            

                                        </div>
                                        <div class="row frmFilas">
                                            <label for="" class="col-md ">Fecha de Nacimiento</label>
                                            <input type="date" name="upFechaNacimiento" id="upFechaNacimiento"  class="col-md form-control" required>
                                            <label for="" class="col-md">Tipo de Usuario</label>
                                                <select name="upTipoUsuario" id="upTipoUsuario" class="col-md form-control">
                                                    <option value="">Seleccione el Tipo de Usuario</option>
                                                    <option value="Administrador">Administrador</option>
                                                    <option value="Usuario">Usuario Comun</option>
                                                </select>  
                                            


                                        </div>
                                        <div class="row frmFilas">
                                            <label for="" class="col-md ">Usuario</label>
                                            <input type="text" name="upUsuario" id="upUsuario" class="col-md form-control" >
                                            <label for="" class="col-md ">Contraseña</label>
                                            <input type="text" name="upContraseña" id="upContraseña" class="col-md form-control">
                                                         


                                        </div>

                                       
                                        
                                        <input type="hidden" name="upId" id="upId">
                                    </form>
                                
                                
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
                                    <button type="button" id="ActualizarUsuario"  class="btn btn-outline-light">Actualizar Usuario </button>
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
    <script src="<?=BASE_URL?>assets/js/Usuario.js"></script>

</body>
</html>

