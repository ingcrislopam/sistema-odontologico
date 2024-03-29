<?php
if (strlen(session_id()) < 1)
  session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SYSOdontologico | Sistema Odontologico</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../public/css/font-awesome.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../public/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../public/css/_all-skins.min.css">
    <link rel="apple-touch-icon" href="../public/img/apple-touch-icon.png">
    <link rel="shortcut icon" href="../public/img/favicon2.ico">

    <!-- DATATABLES -->
    <link rel="stylesheet" type="text/css" href="../public/datatables/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../public/datatables/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="../public/datatables/responsive.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="../public/css/bootstrap-select.min.css">

  </head>
  <body class="hold-transition skin-blue-light sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>SYS</b>Odontologico</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>SYSOdontologico</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="../public/dist/img/perfilusuario.png" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $_SESSION['nombres']." ".$_SESSION['apellidos']?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="../public/dist/img/perfilusuario.png" class="img-circle" alt="User Image">
                    <p>
                      <?php echo $_SESSION['cargo'].' - '.$_SESSION['email']?>
                      <small><?php echo $_SESSION['telefono']?></small>
                    </p>
                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    
                    <div class="pull-right">
                      <a href="../ajax/usuario.php?op=salir" class="btn btn-default btn-flat">Cerrar</a>
                    </div>
                  </li>
                </ul>
              </li>
              
            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">       
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>
            <?php
            if ($_SESSION['escritorio']==1)
            {
              echo '<li>
              <a href="#">
                <i class="fa fa-tasks"></i> <span>Escritorio</span>
              </a>
            </li>';
            }
            ?>
            
            <?php
            if ($_SESSION['consultorio']==1)
            {
              echo '<li class="treeview">
              <a href="#">
              <i class="fa-solid fa-hospital"></i>
                <span>Consultorio</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="paciente.php"><i class="fa fa-circle-o"></i> Pacientes</a></li>
              </ul>
            </li>';
            }
            ?>

            <?php
            if ($_SESSION['historial']==1)
            {
              echo '<li class="treeview">
              <a href="#">
                <i class="fa-solid fa-laptop"></i>
                <span>Historial medico</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="ficha_medica.php"><i class="fa fa-circle-o"></i> Fichas medicas</a></li>
                <li><a href="tratamiento.php"><i class="fa fa-circle-o"></i> Tratamientos</a></li>
              </ul>
            </li>';
            }
            ?>

            <?php
            if ($_SESSION['mantenimiento']==1)
            {
              echo '<li class="treeview">
              <a href="#">
                <i class="fa-solid fa-screwdriver-wrench"></i>
                <span>Mantenimiento</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="simbologia.php"><i class="fa fa-circle-o"></i> Simbologia</a></li>
              </ul>
            </li>';
            }
            ?>
            
            <?php
            if ($_SESSION['acceso']==1)
            {
              echo '<li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Acceso</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="usuario.php"><i class="fa fa-circle-o"></i> Usuarios</a></li>
                <li><a href="permiso.php"><i class="fa fa-circle-o"></i> Permisos</a></li>
              </ul>
            </li>';
            }
            ?>

            

            
            
            
            
            
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>