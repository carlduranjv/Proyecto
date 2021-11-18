<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistema Standard Iron</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="../Public/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Public/css/font-awesome.css">
    <link rel="stylesheet" href="../Public/font/css/all.css">
    <link rel="stylesheet" href="../Public/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../Public/css/_all-skins.min.css">
    <link rel="apple-touch-icon" href="../Public/img/apple-touch-icon.png">
    <link rel="shortcut icon" href="../Public/img/favicon2.ico">
   <link rel="stylesheet" href="../Public/datatables/buttons.dataTables.min.css">
   <link rel="stylesheet" href="../Public/datatables/dataTables.min.css">
   
  </head>
  <body class="hold-transition skin-blue-light sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

     
        <a href="index2.html" class="logo">
      
          <span class="logo-mini">Standard Iron</span>
 
          <span class="logo-lg"><b>Standard Iron</b></span>
        </a>

  
        <nav class="navbar navbar-static-top" role="navigation">
   
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>

          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="../Public/img/user2-160x160.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs">Carl Duran</span>
                </a>
                <ul class="dropdown-menu">

                  <li class="user-header">
                    <img src="../Public/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    <p>
                      www.incanatoit.com - Desarrollando Software
                      <small>www.youtube.com/jcarlosad7</small>
                    </p>
                  </li>
                  

                  <li class="user-footer">
                    
                    <div class="pull-right">
                      <a href="#" class="btn btn-default btn-flat">Cerrar</a>
                    </div>
                  </li>
                </ul>
              </li>
              
            </ul>
          </div>

        </nav>
      </header>

      <aside class="main-sidebar">

        <section class="sidebar">       

          <ul class="sidebar-menu">
            <li class="header"></li>          
            <li class="treeview" id="Almacen">
              <a href="#">
                <i class="fas fa-warehouse fa-fw"></i>
                <span>&nbsp;Almacén</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="articulo.php"><i class="fa fa-circle-o"></i> Artículos</a></li>
                <li><a href="categoria.php"><i class="fa fa-circle-o"></i> Categorías</a></li>
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fas fa-briefcase"></i>
                <span>&nbsp;&nbsp;Producción</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="ingreso.php"><i class="fa fa-circle-o"></i> Ingresos</a></li>
                <li><a href="proveedor.php"><i class="fa fa-circle-o"></i> Proveedores</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fas fa-cart-arrow-down"></i>
                <span>&nbsp; Ventas</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="venta.php"><i class="fa fa-circle-o"></i> Ventas</a></li>
                <li><a href="cliente.php"><i class="fa fa-circle-o"></i> Clientes</a></li>
              </ul>
            </li>                       
            <li class="treeview">
              <a href="#">
                <i class="fas fa-tasks"></i>
                <span>&nbsp;&nbsp;Administración</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="usuario.php"><i class="fa fa-circle-o"></i> Usuarios</a></li>
                <li><a href="permiso.php"><i class="fa fa-circle-o"></i> Permisos</a></li>
                
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fas fa-users"></i>
                <span>&nbsp;Recursos Humanos</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="usuario.php"><i class="fa fa-circle-o"></i> Usuarios</a></li>
                <li><a href="permiso.php"><i class="fa fa-circle-o"></i> Permisos</a></li>
                
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fas fa-laptop"></i>
                <span>&nbsp;Informatica</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="usuario.php"><i class="fa fa-circle-o"></i> Usuarios</a></li>
                <li><a href="permiso.php"><i class="fa fa-circle-o"></i> Permisos</a></li>
                
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fas fa-tools"></i>
                <span>&nbsp;&nbsp;Calidad</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="usuario.php"><i class="fa fa-circle-o"></i> Usuarios</a></li>
                <li><a href="permiso.php"><i class="fa fa-circle-o"></i> Permisos</a></li>
                
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fas fa-user-secret"></i>
                <span>&nbsp;&nbsp;Seguridad Industrial</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="consultacompras.php"><i class="fa fa-circle-o"></i> Consulta Compras</a></li>                
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fas fa-paint-roller"></i>
                <span>&nbsp;&nbsp;Mantenimiento</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="consultaventas.php"><i class="fa fa-circle-o"></i> Consulta Ventas</a></li>                
              </ul>
            </li>
            <li>
              <a href="#">
                <i class="fas fa-question-circle"></i>
                <span>&nbsp;&nbsp;Ayuda</span>
                <small class="label pull-right bg-red">PDF</small>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-info-circle"></i>
                <span>Acerca De...</span>
                <small class="label pull-right bg-yellow">IT</small>
              </a>
            </li>
                        
          </ul>
        </section>

      </aside>
