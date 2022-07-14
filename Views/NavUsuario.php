<?php
         
    include_once("Js.php");
    include_once("Header.php");

?>
   


<!-- -----nav vertical----------------------------------------------------------------------------------------------------- -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light "> 
      <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
              <i class="fas fa-bars"></i>
            </a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="<?php echo constant('BASE_URL');?>Dashboard" class="nav-link">Home</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
          </li>
        </ul>

    
        <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-comments"></i>
              <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <img src="<?php echo constant('BASE_URL');?>assets/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      Brad Diesel
                      <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="text-sm">Call me whenever you can...</p>
                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                  </div>
                </div>
                <!-- Message End -->
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <img src="<?php echo constant('BASE_URL');?>assets/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      John Pierce
                      <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="text-sm">I got your message bro</p>
                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                  </div>
                </div>
                <!-- Message End -->
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <img src="<?php echo constant('BASE_URL');?>assets/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      Nora Silvester
                      <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="text-sm">The subject goes here</p>
                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                  </div>
                </div>
                <!-- Message End -->
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
          </li>
        <!-- Notifications Dropdown Menu -->
          <li class="nav-item dropdown">
              <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">15</span>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                  <i class="fas fa-envelope mr-2"></i> 4 new messages
                  <span class="float-right text-muted text-sm">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                  <i class="fas fa-users mr-2"></i> 8 friend requests
                  <span class="float-right text-muted text-sm">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                  <i class="fas fa-file mr-2"></i> 3 new reports
                  <span class="float-right text-muted text-sm">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
              </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
              <i class="fas fa-expand-arrows-alt"></i>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fa-solid fa-gear"></i>
              
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <a href="#" class="dropdown-item">
                
                Perfil de usuario
                
              </a>
              
            
            
            </div>
          </li>
        
          <li class="nav-item">
            <a class="nav-link"  href="<?=BASE_URL?>Session/SessionDestroy" role="button" id="CerrarSession">
            <i class="fa-solid fa-right-from-bracket"></i>
            </a>
          </li>
      
      </ul>
    </nav>
    <aside class="main-sidebar sidebar-dark-primary elevation-4 nav-vertical ">
    <!-- Brand Logo -->
    <a href="<?php echo constant('BASE_URL');?>Dashboard" class="brand-link">
      <img src="<?php echo constant('BASE_URL');?>assets/img/Logo_GRTPE.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">GRTPE-Almacen</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar nav-vertical">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo constant('BASE_URL');?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION["log_User"];?></a>
        </div>
      </div>
      <nav class="mt-2 ">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
            <li class="nav-item ">
              <a href="<?php echo constant('BASE_URL');?>Dashboard" class="nav-link ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
              
            </li>
         <!---ingresos----------------------------------------------------------------------------------------->
            <li class="nav-item">
              <a href="<?php echo constant('BASE_URL');?>ingresos" class="nav-link">
                <i class="nav-icon fas fa-solid fa-building-circle-check"></i>
                <p>
                  Ingresos 
                  <i class="fas fa-angle-left right"></i>
                  <!--<span class="badge badge-info right">6</span>-->
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo constant('BASE_URL');?>Ingresos" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Ingresos</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo constant('BASE_URL');?>ingresos/ListaIngresos" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Lista de Ingresos</p>
                  </a>
                </li>
              
                
              </ul>
            </li>
         <!--Salidas-->
         
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-solid fa-building-circle-arrow-right"></i>
                <p>
                  Salidas
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo constant('BASE_URL');?>Salidas" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Salidas</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo constant('BASE_URL');?>Salidas/ListaSalidas" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Lista de  de salidas</p>
                  </a>
                </li>
                
              </ul>
            </li>
          <!--Servicios-->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa-solid fa-toolbox"></i>
              <p>
                Servicios
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo constant('BASE_URL');?>Servicios" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Servicios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo constant('BASE_URL');?>Servicios/ListaServicios" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lista de Servicios</p>
                </a>
              </li>
              
             
            </ul>
          </li>
          <!--Productos-->
         
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon  fa-brands fa-product-hunt"></i>
              <p>
                Productos
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo constant('BASE_URL');?>Productos" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Productos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo constant('BASE_URL');?>Productos/ListaProductos" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lista de Productos</p>
                </a>
              </li>
              
            </ul>
          </li>
          
         
          <!--Categorias-->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa-solid fa-bars"></i>
              <p>
                Especifica
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo constant('BASE_URL');?>Especifica" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Especifica</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo constant('BASE_URL');?>Especifica/ListaEspecifica" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lista de Especifica</p>
                </a>
              </li>
              
             
            </ul>
          </li>
           <!--Almacenes-->
           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas  fa-thin fa-warehouse "> </i>
              <p>
                Almacenes
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo constant('BASE_URL');?>Almacenes" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Almacenes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo constant('BASE_URL');?>Almacenes/ListaAlmacen" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lista de almacenes</p>
                </a>
              </li>
            </ul>
          </li>

          <!--usaurios-->
          <li class="nav-item" id="Usuarios">
            <a href="#" class="nav-link">
              <i class=" nav-icon fas fa-thin bi bi-people-fill">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
                <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
                </svg> 
            </i>
                            <p>
                Usuarios
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo constant('BASE_URL');?>Usuario" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Usuarios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/forms/advanced.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lista de Usuarios</p>
                </a>
              </li>
             
            </ul>
          </li>
          <!--Almacenes-->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas  fa-thin fa-warehouse "> </i>
              <p>
              Unidades de medida
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo constant('BASE_URL');?>Almacenes" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Unidades de medida</p>
                </a>
              </li>
              
            </ul>
          </li>
        </ul>
      </nav>

     

      
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
         <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
<script>
  document.getElementById("CerrarSession").addEventListener("click", fntCerrar);
    function fntCerrar() {
        console.log("cerrando session");
        localStorage.clear();
        
    }
</script>
        
         