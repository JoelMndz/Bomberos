<?php
  if(session_status() != PHP_SESSION_ACTIVE){
    session_start();
  }
  
  $nombre = null;
  if(isset($_SESSION["user"])){
    $nombre = $_SESSION['user']->nombre." ".$_SESSION['user']->apellidos;
  }else{
    header("Location: ../index.php");
  }
?>
<script src="https://kit.fontawesome.com/934a7d2bb6.js" crossorigin="anonymous"></script>

<!-- Font Awesome -->
<link rel="stylesheet" href="../css/css/all.min.css">

<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<!-- Theme style -->
<link rel="stylesheet" href="../css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="principal.php" class="nav-link">Inicio</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="quienes_somos.php" class="nav-link">Quienes Somos</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <div class="image">
              <img src="../img/user1.jpg" alt="Profile" class="brand-image img-circle elevation-4" width="40px">
            </div>
            <div class="info">
              <span class="d-none d-md-block dropdown-toggle ps-2"><?= $nombre ?? 'Marco Vinicio Pérez'?></span>
            </div>
          </a><!-- End Profile Iamge Icon -->
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-danger profile">
            <!-- 
            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>Mi Perfil</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider ">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Cambio de Clave</span>
              </a>
            </li>
            
            <li>
              <hr class="dropdown-divider">
            </li>
            --> 
            <li>
              <a class="dropdown-item d-flex align-items-center" href="salir.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Cerrar Sesion</span>
              </a>
            </li>
          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->
      </ul>
    </nav>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="principal.php" class="brand-link">
        <img src="../img/escudo_sin.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text text-danger">Bomberos Azogues</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fa-solid fa-screwdriver-wrench nav-icon text-danger"></i>
                <p class="text-danger">
                  Configuración
                  <i class="fas fa-angle-left right text-danger"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../vistas/configuracion.php" class="nav-link">
                    <i class="fa-solid fa-gears nav-icon text-info"></i>
                    <p class="text-info">Empresa</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../vistas/inspeccion_tipo.php" class="nav-link">
                    <i class="fa-solid fa-fire-burner nav-icon text-info"></i>
                    <p class="text-info">Tipo de Inspección</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../vistas/rango.php" class="nav-link">
                    <i class="fa-solid fa-user-graduate nav-icon text-info"></i>
                    <p class="text-info">Rangos</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../vistas/privilegio.php" class="nav-link">
                    <i class="fa-brands fa-pied-piper-alt nav-icon text-info"></i>
                    <p class="text-info">Privilegios</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fa-regular fa-folder-open nav-icon text-danger"></i>
                <p class="text-danger">
                  Archivo
                  <i class="fas fa-angle-left right text-danger"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../vistas/usuario.php" class="nav-link">
                    <i class="fa-regular fa-user nav-icon text-info"></i>
                    <p class="text-info">Usuarios</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fa-solid fa-person nav-icon text-danger"></i>
                <p class="text-danger">
                  Cliente
                  <i class="fas fa-angle-left right text-danger"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../vistas/contribuyente.php" class="nav-link">
                    <i class="fa-solid fa-cart-shopping nav-icon text-info"></i>
                    <p class="text-info">Contribuyentes</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../vistas/local.php" class="nav-link">
                    <i class="fa-sharp fa-solid fa-shop nav-icon text-info"></i>
                    <p class="text-info">Local</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fa-solid fa-bed-pulse nav-icon text-danger"></i>
                <p class="text-danger">
                  Tramite
                  <i class="fas fa-angle-left right text-danger"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../vistas/solicitud.php" class="nav-link">
                    <i class="fa-solid fa-code-pull-request nav-icon text-info"></i>
                    <p class="text-info">Solicitud</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../vistas/inspeccion.php" class="nav-link">
                    <i class="fa-sharp fa-solid fa-magnifying-glass nav-icon text-info"></i>
                    <p class="text-info">Inspección</p>
                  </a>
                </li>
              </ul>


            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fa-sharp fa-solid fa-money-check-dollar nav-icon text-danger"></i>
                <p class="text-danger">
                  Recaudación
                  <i class="fas fa-angle-left right text-danger"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../vistas/cobro.php" class="nav-link">
                    <i class="fa-solid fa-money-bill nav-icon text-info"></i>
                    <p class="text-info">Cobro</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fa-solid fa-book nav-icon text-danger"></i>
                <p class="text-danger">
                  Reportes
                  <i class="fas fa-angle-left right text-danger"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../layout/collapsed-sidebar.html" class="nav-link">
                    <i class="fa-solid fa-file-lines nav-icon text-info"></i>
                    <p class="text-info">Inspecciones Pendientes</p>
                  </a>
                </li>
              </ul>
               <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../layout/collapsed-sidebar.html" class="nav-link">
                    <i class="fa-solid fa-file-lines nav-icon text-info"></i>
                    <p class="text-info">Inspecciones Realizadas</p>
                  </a>
                </li>
              </ul>
               <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../layout/collapsed-sidebar.html" class="nav-link">
                    <i class="fa-solid fa-file-lines nav-icon text-info"></i>
                    <p class="text-info">Inspecciones Asignadas</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../layout/collapsed-sidebar.html" class="nav-link">
                    <i class="fa-solid fa-file-lines nav-icon text-info"></i>
                    <p class="text-info">Solicitudes Asignadas</p>
                  </a>
                </li>
              </ul>
               <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../layout/collapsed-sidebar.html" class="nav-link">
                    <i class="fa-solid fa-file-lines nav-icon text-info"></i>
                    <p class="text-info">Solicitudes Realizadas</p>
                  </a>
                </li>
              </ul>
               <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../layout/collapsed-sidebar.html" class="nav-link">
                    <i class="fa-solid fa-file-lines nav-icon text-info"></i>
                    <p class="text-info">Solicitudes Pendientes</p>
                  </a>
                </li>
              </ul>
               <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../layout/collapsed-sidebar.html" class="nav-link">
                    <i class="fa-solid fa-file-lines nav-icon text-info"></i>
                    <p class="text-info">Permisos Cobrados</p>
                  </a>
                </li>
              </ul>
               <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../layout/collapsed-sidebar.html" class="nav-link">
                    <i class="fa-solid fa-file-lines nav-icon text-info"></i>
                    <p class="text-info">Permisos Pendientes</p>
                  </a>
                </li>
              </ul>
               <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../layout/collapsed-sidebar.html" class="nav-link">
                    <i class="fa-solid fa-file-lines nav-icon text-info"></i>
                    <p class="text-info">Clients</p>
                  </a>
                </li>
              </ul>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../layout/collapsed-sidebar.html" class="nav-link">
                    <i class="fa-solid fa-file-lines nav-icon text-info"></i>
                    <p class="text-info">Usuarios</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="salir.php" class="nav-link">
                <i class="fa-sharp fa-solid fa-door-closed nav-icon text-danger"></i>
                <p class="text-danger">
                  Cerrar Sesion
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>