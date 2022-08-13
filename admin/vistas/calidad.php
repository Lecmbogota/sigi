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
                <h1 class="box-title">Encuestas</h1>
            </div>

        </div>
        <!-- Default box -->
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <!--box-header-->
                    <!--centro-->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-hover table-fixed" width='100%'>
                            <thead>
                                <th>CAMBIAR ESTADO</th>
                                <th>ID ROTATOR </th>
                                <th>ESTUDIO</th>
                                <th>AGENTE</th>
                                <th>FECHA</th>         
                                <th>ESTATUS</th>
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
<script src="scripts/calidad.js"></script>
<?php 
}

ob_end_flush();
  ?>