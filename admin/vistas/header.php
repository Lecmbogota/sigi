<?php
if (strlen(session_id()) < 1) {
    session_start();
} ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>- SIGI -- Sistema Integrado de Gestion Interna -</title>

    <script type="text/javascript">
    var titleText = document.title;

    function titleMarquee() {

        titleText = titleText.substring(1, titleText.length) + titleText.substring(0, 1);
        document.title = titleText;
        setTimeout("titleMarquee()", 200);
    }
    </script>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap currently v3.4.1 -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap-theme.min.css"
        integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous">
    </script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../public/css/font-awesome.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../public/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../public/css/_all-skins.min.css">
    <link rel="apple-touch-icon" href="../public/img/apple-touch-icon.png">
    <link rel="shortcut icon" href="http://www.operative.net.co/images/logo.png">

    <!-- DATATABLES -->
    <link rel="stylesheet" type="text/css" href="../public/datatables/jquery.dataTables.min.css">
    <link href="../public/datatables/buttons.dataTables.min.css" rel="stylesheet" />
    <link href="../public/datatables/responsive.dataTables.min.css" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="../public/css/bootstrap-select.min.css">
    <!-- SWEETALERT2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>


    
</head>


<body class="hold-transition skin-blue sidebar-mini" onload="titleMarquee()">

    <div class="wrapper">
        <header class="main-header">

            <nav class="navbar navbar-expand-sm bg-blue navbar-blue ">
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                </a>

            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">

            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu tree" data-widget="tree">



                    <li><a href="escritorio.php"><i class="fa fa-home" aria-hidden="true"></i>
                            <span>INICIO</span></a>
                    </li>


<!--Modulo DIRECTOR ADMINISTRATIVO Y FINANCIERO ----------------------------------------------------------------------------------->
                    <?php if (
                        $_SESSION['tipousuario'] ==
                        'DIRECTOR ADMINISTRATIVO Y FINANCIERO'
                    ) { ?>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-users" aria-hidden="true"></i> <span>ADMINISTRACION</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <!--MODULO DE ASISTNCIA-->
                        <ul class="treeview-menu">
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-clock-o" aria-hidden="true"></i> <span> Asistencias</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="asistencia.php"><i class="fa fa-pie-chart" aria-hidden="true"></i>
                                            Reporte General</a>
                                    </li>
                                    <li><a href="rptasistencia.php"><i class="fa fa-pie-chart" aria-hidden="true"></i>
                                            Reporte
                                            individual</a></li>
                                    <li><a href="http://192.168.0.122/sigi/vistas/liderasis.php"><i class="fa fa-pie-chart"
                                            aria-hidden="true"></i>
                                        SCA INI. GEST.</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <ul class="sidebar-menu tree" data-widget="tree">
                        <li><a href="verestudios.php"><i class="fa fa-laptop" aria-hidden="true"></i>
                                <span>DIR. OPERACIONES</span><span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i></a>
                            </span>

                        </li>
                    </ul>
                </ul> 
                 <li class="treeview">
                <li>
                    <a href="../ajax/usuario.php?op=salir"><i class="fa fa-power-off" aria-hidden="true"></i>
                        <span>CERRAR SESION</a>
                </li>
                <?php } ?>
<!--------------------------------------------------------------------------------------------------------------------------------->

<!--Modulo AUXILIAR ADMINISTRATIVO------------------------------------------------------------------------------------------------->
                <?php if (
                    $_SESSION['tipousuario'] == 'AUXILIAR ADMINISTRATIVO'
                ) { ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-users" aria-hidden="true"></i> <span>ADMINISTRACION</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <!--MODULO DE ASISTNCIA-->
                    <ul class="treeview-menu">
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-clock-o" aria-hidden="true"></i> <span> Asistencias</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="asistencia.php"><i class="fa fa-pie-chart" aria-hidden="true"></i>
                                        Reporte General</a>
                                </li>
                                <li><a href="rptasistencia.php"><i class="fa fa-pie-chart" aria-hidden="true"></i>
                                        Reporte
                                        individual</a></li>
                            </ul>
                        </li>

                    </ul>


                </li>
                 <li class="treeview">
                <li>
                    <a href="../ajax/usuario.php?op=salir"><i class="fa fa-power-off" aria-hidden="true"></i>
                        <span>CERRAR SESION</a>
                </li>


                <?php } ?>
<!--------------------------------------------------------------------------------------------------------------------------------->

<!--Modulo COORDINADOR CATI-------------------------------------------------------------------------------------------------------->
                <?php if ($_SESSION['tipousuario'] == 'COORDINADOR CATI') { ?>
                

                <ul class="sidebar-menu tree" data-widget="tree">
                    <li><a href="verestudios.php"><i class="fa fa-laptop" aria-hidden="true"></i>
                            <span>ESTUDIOS</span><span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i></a>
                        </span>

                    </li>
                </ul>

                <ul class="sidebar-menu tree" data-widget="tree">
                    <li><a href="vercap.php"><i class="fa fa-graduation-cap" aria-hidden="true"></i>
                            <span>CAPACITACION</span><span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i></a>
                        </span>

                    </li>
                </ul>
                <ul class="sidebar-menu tree" data-widget="tree">
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-suitcase" aria-hidden="true"></i> <span>COORDINACION CATI</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                            <ul class="treeview-menu">
                                <li><a href="asignar.php"><i class="fa fa-calendar"></i> Crear/Ver Planeación</a>
                                </li>
                            </ul>
                    </li>
                </un>
                <li>
                    <a href="../ajax/usuario.php?op=salir"><i class="fa fa-power-off" aria-hidden="true"></i>
                        <span>CERRAR SESION</a>
                </li>

                <?php } ?>
<!--------------------------------------------------------------------------------------------------------------------------------->

<!--Modulo LÍDER CATI ESTUDIOS MASIVOS--------------------------------------------------------------------------------------------->
                <?php if (
                    $_SESSION['tipousuario'] == 'LÍDER CATI ESTUDIOS MASIVOS'
                ) { ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-users" aria-hidden="true"></i> <span>ADMINISTRACION</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <!--MODULO DE ASISTNCIA-->
                    <ul class="treeview-menu">
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-clock-o" aria-hidden="true"></i> <span> Asistencias</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="asistencia.php"><i class="fa fa-pie-chart" aria-hidden="true"></i>
                                        Reporte General</a>
                                </li>


                                <li><a href="rptasistencia.php"><i class="fa fa-pie-chart" aria-hidden="true"></i>
                                        Reporte
                                        individual</a></li>
                                <li><a href="http://192.168.0.122/sigi/vistas/liderasis.php"><i class="fa fa-pie-chart"
                                            aria-hidden="true"></i>
                                        Control de Asistencia</a></li>
                            </ul>
                        </li>

                    </ul>
                </ul>
                <ul class="sidebar-menu tree" data-widget="tree">
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-suitcase" aria-hidden="true"></i> <span>CATI</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                            <ul class="treeview-menu">
                                <li><a href="verasignacion.php"><i class="fa fa-calendar"></i> Ver Planeación</a>
                                </li>
                            </ul>
                    </li>
                </un>
                <li>
                    <a href="../ajax/usuario.php?op=salir"><i class="fa fa-power-off" aria-hidden="true"></i>
                        <span>CERRAR SESION</a>
                </li>

                <?php } ?>
<!--------------------------------------------------------------------------------------------------------------------------------->

<!--Modulo LIDER DE GESTION-------------------------------------------------------------------------------------------------------->
                <?php if ($_SESSION['tipousuario'] == 'LIDER DE GESTION') { ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-users" aria-hidden="true"></i> <span>ADMINISTRACION</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <!--MODULO DE ASISTNCIA-->
                    <ul class="treeview-menu">
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-clock-o" aria-hidden="true"></i> <span> Asistencias</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="asistencia.php"><i class="fa fa-pie-chart" aria-hidden="true"></i>
                                        Reporte General</a>
                                </li>


                                <li><a href="rptasistencia.php"><i class="fa fa-pie-chart" aria-hidden="true"></i>
                                        Reporte
                                        individual</a></li>
                                <li><a href="http://192.168.0.122/sigi/vistas/liderasis.php"><i class="fa fa-pie-chart"
                                            aria-hidden="true"></i>
                                        Control de Asistencia</a></li>
                            </ul>
                        </li>

                    </ul>
                    <ul class="sidebar-menu tree" data-widget="tree">
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-suitcase" aria-hidden="true"></i> <span> CATI</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                            <ul class="treeview-menu">
                                <li><a href="verasignacion.php"><i class="fa fa-calendar"></i> Ver Planeación</a>
                                </li>
                            </ul>
                    </li>
                </un>
                </li>
                </ul>
                <li>
                    <a href="../ajax/usuario.php?op=salir"><i class="fa fa-power-off" aria-hidden="true"></i>
                        <span>CERRAR SESION</a>
                </li>

                <?php } ?>
<!--------------------------------------------------------------------------------------------------------------------------------->

<!--Modulo DIRECTOR DE OPERACIONES------------------------------------------------------------------------------------------------->
                <?php if (
                    $_SESSION['tipousuario'] == 'DIRECTOR DE OPERACIONES'
                ) { ?>
                <ul class="sidebar-menu tree" data-widget="tree">
                    <li><a href="estudios.php"><i class="fa fa-laptop" aria-hidden="true"></i>
                            <span>DIR. OPERACIONES</span><span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i></a>
                        </span>

                    </li>
                </ul>
                <ul class="sidebar-menu tree" data-widget="tree">
                    <li><a href="vercap.php"><i class="fa fa-graduation-cap" aria-hidden="true"></i>
                            <span>CAPACITACION</span><span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i></a>
                        </span>

                    </li>
                </ul>
                </ul>
                <li>
                    <a href="../ajax/usuario.php?op=salir"><i class="fa fa-power-off" aria-hidden="true"></i>
                        <span>CERRAR SESION</a>
                </li>

                <?php } ?>
<!--------------------------------------------------------------------------------------------------------------------------------->

<!--Modulo AUXILIAR DE CAPACITACIÓN Y FORMACIÓN------------------------------------------------------------------------------------>
                <?php if (
                    $_SESSION['tipousuario'] ==
                    'AUXILIAR DE CAPACITACIÓN Y FORMACIÓN'
                ) { ?>
                <ul class="sidebar-menu tree" data-widget="tree">
                    <li><a href="capacitacion.php"><i class="fa fa-graduation-cap" aria-hidden="true"></i>
                            <span>CAPACITACION</span><span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i></a>
                        </span>

                    </li>
                </ul>
                <li>
                    <a href="../ajax/usuario.php?op=salir"><i class="fa fa-power-off" aria-hidden="true"></i>
                        <span>CERRAR SESION</a>
                </li>

                <?php } ?> 
<!--------------------------------------------------------------------------------------------------------------------------------->

<!--Modulo SuperUsuario del Sistema------------------------------------------------------------------------------------------------>
                <?php if ($_SESSION['tipousuario'] == 'Administrador') { ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-cogs" aria-hidden="true"></i> <span>IT</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-user"></i> <span> Usuarios</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="usuario.php"><i class="fa fa-users" aria-hidden="true"></i>
                                        Usuarios</a></li>
                                <li><a href="tipousuario.php"><i class="fa fa-id-card" aria-hidden="true"></i> Tipo
                                        Usuario</a></li>
                                <li><a href="departamento.php"><i class="fa fa-university"
                                            aria-hidden="true"></i>Departamento</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="http://192.168.20.44/phpmyadmin/index.php">
                                <i class="fa fa-database" aria-hidden="true"></i> <span> Bases de
                                    Datos</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>

                        </li>

                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-users" aria-hidden="true"></i> <span>ADMINISTRACION</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-clock-o" aria-hidden="true"></i> <span> Asistencias</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="asistencia.php"><i class="fa fa-pie-chart" aria-hidden="true"></i>
                                        Reporte General</a>
                                </li>
                                <li><a href="rptasistencia.php"><i class="fa fa-pie-chart" aria-hidden="true"></i>
                                        Reporte
                                        individual</a></li>
                                <li><a href="http://192.168.0.122/sigi/vistas/homeWorkAsistencia.php"><i class="fa fa-pie-chart"
                                            aria-hidden="true"></i>
                                        Control de Asistencia</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                </ul>


                <ul class="sidebar-menu tree" data-widget="tree">
                    <li><a href="estudios.php"><i class="fa fa-laptop" aria-hidden="true"></i>
                            <span>DIR. OPERACIONES</span><span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i></a>
                        </span>

                    </li>
                </ul>

                <ul class="sidebar-menu tree" data-widget="tree">
                    <li><a href="capacitacion.php"><i class="fa fa-graduation-cap" aria-hidden="true"></i>
                            <span>CAPACITACION</span><span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i></a>
                        </span>

                    </li>
                </ul>
                <ul class="sidebar-menu tree" data-widget="tree">
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-suitcase" aria-hidden="true"></i> <span>COORDINACIÓN CATI</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                            <ul class="treeview-menu">
                                <li><a href="asignar.php"><i class="fa fa-calendar"></i> Crear Planeación</a>
                                </li>
                                <li><a href="editarasig.php"><i class="fa fa-circle-o"></i> 
                                        Editar Asignación</a></li>
                                <li><a href="productividad.php"><i class="fa fa-line-chart" aria-hidden="true"></i>
                                        Reportes de
                                        Productividad</a></li>
                                <li><a href="e_carga.php"><i class="fa fa-upload" aria-hidden="true"></i> Cargar
                                        Encuestas
                                        Exitosas</a></li>

                            </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-user"></i> <span>LIDERES</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>

                            <ul class="treeview-menu">
                                <li><a href="e_carga.php"><i class="fa fa-upload" aria-hidden="true"></i> Cargar
                                        Cargar Encuestas
                                        E.</a></li>
                                <li><a href="editarasig.php"><i class="fa fa-circle-o"></i> 
                                        Editar Asignación</a></li>
                                <li><a href="productividad.php"><i class="fa fa-circle-o"></i>
                                        Productividad Diaria</a></li>
                            </ul>
                    </li>


                    <li class="treeview">
                        <a href="calidad.php">
                            <i class="fa fa-user"></i> <span>CALIDAD</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>

                    </li>
                </ul>
                <li>
                    <a href="../ajax/usuario.php?op=salir"><i class="fa fa-power-off" aria-hidden="true"></i>
                        <span>CERRAR SESION</a>
                </li>


                <?php } ?>
<!--------------------------------------------------------------------------------------------------------------------------------->


            </section>
        </aside>