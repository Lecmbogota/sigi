<?php
//activamos almacenamiento en el buffer
ob_start();
session_start();
if (!isset($_SESSION['nombre'])) {
  header("Location: login.php");
}else{

 
require 'header.php';
require_once('../modelos/Usuario.php');
  $usuario = new Usuario();
  $rsptan = $usuario->cantidad_usuario();
  $reg=$rsptan->fetch_object();
  $reg->nombre;
?>
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="panel-body">

                        <?php if ($_SESSION['tipousuario'] == 'AUXILIAR ADMINISTRATIVA') {
?>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="small-box bg-green">

                                <a href="asistencia.php" class="small-box-footer">
                                    <div class="inner">
                                        <h5 style="font-size: 20px;">
                                            <strong>Lista de Asistencia General</strong>

                                        </h5>
                                        <p>Módulo</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-list" aria-hidden="true"></i>
                                    </div>&nbsp;
                                    <div class="small-box-footer">
                                        <i class="fa"></i>
                                    </div>

                                </a>
                            </div>
                        </div>
                        <?php } ?>



                        <?php if ($_SESSION['tipousuario'] == 'DIRECTOR DE OPERACIONES') {
?>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="small-box bg-blue">

                                <a href="estudios.php" class="small-box-footer">
                                    <div class="inner">
                                        <h5 style="font-size: 20px;">
                                            <strong>Estudios</strong>
                                        </h5>
                                        <p>Creacion, Visualizacion, Edicion, Desgarga </p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa-handshake-o" aria-hidden="true"></i>
                                    </div>&nbsp;
                                    <div class="small-box-footer">
                                        <i class="fa"></i>
                                    </div>

                                </a>
                            </div>
                        </div>
                        <?php } ?>

                        <?php if ($_SESSION['tipousuario'] == 'DIRECTORA ADMINISTRATIVA Y FINANCIERA') {
?>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="small-box bg-blue">

                                <a href="asistencia.php" class="small-box-footer">
                                    <div class="inner">
                                        <h5 style="font-size: 20px;">
                                            <strong>Lista de Asistencia General</strong>

                                        </h5>
                                        <p>Visualización y Descarga</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-list" aria-hidden="true"></i>
                                    </div>&nbsp;
                                    <div class="small-box-footer">
                                        <i class="fa"></i>
                                    </div>

                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="small-box bg-blue">

                                <a href="rptasistencia.php" class="small-box-footer">
                                    <div class="inner">
                                        <h5 style="font-size: 20px;">
                                            <strong>Lista de Asistencia Detallada</strong>
                                        </h5>
                                        <p>Visualización y Descarga</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-list" aria-hidden="true"></i>
                                    </div>&nbsp;
                                    <div class="small-box-footer">
                                        <i class="fa"></i>
                                    </div>

                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="small-box bg-blue">

                                <a href="estudios.php" class="small-box-footer">
                                    <div class="inner">
                                        <h5 style="font-size: 20px;">
                                            <strong>Estudios</strong>
                                        </h5>
                                        <p>Creacion, Visualizacion, Edicion, Descarga </p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-book" aria-hidden="true"></i>
                                    </div>&nbsp;
                                    <div class="small-box-footer">
                                        <i class="fa"></i>
                                    </div>

                                </a>
                            </div>
                        </div>
                        <?php } ?>


                        <?php if ($_SESSION['tipousuario']=='Administrador') {
?>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="small-box bg-orange">
                                <div class="inner">
                                    <h4 style="font-size: 20px;">
                                        <strong>Empleados: </strong>
                                    </h4>
                                    <p>Total <?php echo $reg->nombre; ?></p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-users" aria-hidden="true"></i>
                                </div>
                                <a href="usuario.php" class="small-box-footer">Agregar <i
                                        class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <?php } ?>


                        <?php if ($_SESSION['tipousuario'] == 'AUXILIAR ADMINISTRATIVA' || $_SESSION['tipousuario'] == 'DIRECTORA ADMINISTRATIVA Y FINANCIERA') {
?>
                       
                        <?php } ?>

                        <!--fin centro-->
                    </div>
                </div>
            </div>
            <!-- /.box -->

    </section>
    <!-- /.content -->
</div>

<?php
require 'footer.php'; 
}
ob_end_flush();