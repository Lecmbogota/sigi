<?php 
//activamos almacenamiento en el buffer
ob_start();
session_start();
if (!isset($_SESSION['nombre'])) {
  header("Location: login.html");
}else{

require 'header.php';
 ?>
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <ol class="breadcrumb">
            <li><a href="escritorio.php">VOLVER</a></li>
            <li class="active"> Reporte General de Asistencia</li>
        </ol>
        <!-- Default box -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <!--box-header-->
                    <!--centro-->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                            <thead>
                                <th>Opciones</th>
                                <th>Código</th>
                                <th>Nombres</th>
                                <th>apellidos</th>
                                <th>Cargo</th>
                                <th>Fecha Hora</th>
                                <th>Asistencia</th>
                                <th>Fecha</th>
                            </thead>

                        </table>
                    </div>


                </div>
            </div>
            <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<?php 

require 'footer.php';
 ?>
<script src="scripts/asistencia.js"></script>
<?php 
}

ob_end_flush();
  ?>