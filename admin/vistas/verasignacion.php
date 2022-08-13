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

        <div class="info-box">
            <span class="info-box-icon bg-blue"><i class="fa fa-file"></i></span>
            <div class="info-box-content">
                <h1 class="box-title">Asignar Estudios</h1>
            </div>

        </div>
        <!-- Default box -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <!-- ENCABEZADOS DE LA TABLA ESTUDIOS  -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllist" class="table table-hover table-fixed" width='100%'>
                            <thead>
                                <th>ID</th>
                                <th>AGENTE</th>
                                <th>ESTUDIO</th>
                                <th>FECHA</th>
                                <th>HORA</th>
                            </thead>
                        </table>
                    </div>
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
<script src="scripts/asignar.js"></script>
<?php 
}

ob_end_flush();
  ?>